FROM php:8-cli

RUN apt-get update && apt-get install -y zip libzip-dev openssh-server \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo_mysql zip

COPY --chown=www-data:www-data ./ /var/www

#add web user
RUN useradd -rm -d /home/web -s /bin/bash -g www-data web
RUN echo 'web:docker' | chpasswd
#set default login path
RUN echo "\ncd /var/www/\n" >> /home/web/.bashrc

#set web permissions
#comment these two lines if they consume too much time during a build
RUN find /var/www -type d -print0 | xargs -0 chmod 775
RUN find /var/www -type f -print0 | xargs -0 chmod 664

#install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#create run script
RUN echo "#!/usr/bin/env bash\n\nmkdir /run/sshd\nchmod 0755 /run/sshd\n/usr/sbin/sshd -D" > /start.sh
RUN chmod +x /start.sh

EXPOSE 22/tcp

WORKDIR /var/www

CMD ["/start.sh"]
