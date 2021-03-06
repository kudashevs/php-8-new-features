# Usage

### Prerequisites

- Windows:
  - [Docker Desktop](https://hub.docker.com/editions/community/docker-ce-desktop-windows)
- macOS:
  - [Docker Desktop](https://hub.docker.com/editions/community/docker-ce-desktop-mac)
- Linux:
  - [Docker](https://docs.docker.com/engine/install/#server)


## Build a container

Clone this repo to your local computer then build an image:
```bash
docker build -t php-8-new-features .
```

## Run a container

After the image is ready you can start a container (you are free to choose any name you like after `--name` option):
```bash
docker run -d --rm --name php8 php-8-new-features
```

After the container has started you can use it under the name chosen in the previous step (in our case it is `php8`):
```bash
docker exec -it php8 /usr/local/bin/php -v
```

## Recommended usage

The most convenient way of using the PHP 8 container is with an IDE through an SSH connection. The ssh server
is already set up inside the image and is available for use on port 22/tcp. To make a connection available for
your local computer you should map your computer's port with the port inside the container:
```bash
docker run -d -p 2020:22 --rm --name php8 php-8-new-features
``` 

Then the container has started you can use any ssh client to connect to the container:
```code
SSH host: localhost
SSH port: 2020
SSH user: web
SSH password: docker 
```

We recommend to configure your favorite IDE to use this SSH connection (usually Deployment section). 
