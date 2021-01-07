FROM php:8-cli

RUN apt-get update && apt-get install -y zip libzip-dev openssh-server \
    && docker-php-ext-install pdo_mysql zip

COPY ./ /var/www

#add web user
RUN useradd -rm -d /home/web -s /bin/bash -g www-data web
RUN echo 'web:docker' | chpasswd
#set default login path
RUN echo "\ncd /var/www/\n" >> /home/web/.bashrc

#install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#create run script
RUN echo "#!/usr/bin/env bash\n\nmkdir /run/sshd\nchmod 0755 /run/sshd\n/usr/sbin/sshd -D" > /start.sh
RUN chmod +x /start.sh

EXPOSE 22/tcp

WORKDIR /var/www

CMD ["/start.sh"]