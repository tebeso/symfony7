# Base image
FROM php:8.3-apache

ARG DOCKER_WWWGROUP
ARG DOCKER_WWWUSER

# Set up environment variables
ENV DEBIAN_FRONTEND noninteractive
ENV TZ=Europe/Zurich

# Set the working directory
WORKDIR /var/www/html

# Update and install essential packages
RUN apt-get -y update --fix-missing && \
    apt-get upgrade -y && \
    apt-get install -y --no-install-recommends \
        apt-utils \
        apt-transport-https \
        curl \
        wget \
        nano \
        dialog \
        build-essential \
        git \
        gnupg2 \
        iputils-ping \
        libonig-dev \
        libsqlite3-dev \
        libsqlite3-0 \
        htop \
        libzip-dev \
        libicu-dev \
        libxml2-dev \
        libxslt-dev \
        libssh2-1-dev \
        libssh2-1 \
        libcurl4-openssl-dev \
        pkg-config \
        openssl \
        zip \
        unzip \
        supervisor && \
    rm -rf /var/lib/apt/lists/*

RUN pecl install xdebug

# Install necessary dependencies and extensions
RUN docker-php-ext-install \
    pdo \
	pdo_mysql \
    mysqli \
    xml \
    zip \
    mbstring \
    sockets \
    pcntl \
	intl \
	zip \
	opcache

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-enable xdebug

# Clean up the image
RUN apt-get clean && apt-get autoremove -y

# Enable Apache modules
RUN a2enmod rewrite headers

# Set up user and permissions
RUN groupadd --gid 1000 $DOCKER_WWWUSER && \
    useradd --uid 1000 --gid 1000 -m $DOCKER_WWWUSER && \
    chown 1000:1000 /var/www/html -R

# Switch to non-root user
USER $DOCKER_WWWUSER

# Set the command to run supervisor
CMD ["/usr/bin/supervisord"]
