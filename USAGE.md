# Usage

## Prerequisites

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

## Run the container

After the image is ready start a container:
```bash
docker run --rm --name php8 -d php-8-new-features
```

Then you can use container under the name `php8` (e.g. to get PHP version type):
```bash
docker exec -it php8 /usr/local/bin/php -v
```

## Usage

The recommended usage is through an SSH connection. The ssh server is already set up inside the image and
is available for use on port 22/tcp. To make a connection available you should map the port on your computer
with the port in the container:
```bash
docker run --rm -p 2020:22 --name php8 -d php-8-new-features
``` 

Then the container has started you could use any ssh client to connect to the container:
```code
SSH host: localhost
SSH port: 2020
SSH user: web
SSH password: docker 
```

Fill free to configure your favorite IDE to use this SSH connection (usually Deployment section). 
