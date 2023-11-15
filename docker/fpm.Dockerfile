FROM phpdockerio/php:8.1-fpm

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install bash-completion ssh iproute2 iputils-ping mc wget nano php8.1-curl php8.1-pgsql php8.1-pdo-mysql php8.1-redis php8.1-dom php8.1-simplexml php8.1-xml php8.1-zip php8.1-xdebug php8.1-bcmath php8.1-gd php8.1-imagick php8.1-intl php8.1-soap

WORKDIR "/usr/share/nginx/html"