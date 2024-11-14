FROM php:8.2.3-fpm

# Установите базовые пакеты и зависимости
RUN apt-get update && apt-get install -y \
        git \
        wget \
        libnss3 \
        unzip \
        p7zip-full \
        apt-utils \
        libpng-dev \
        libfreetype6-dev \
        libjpeg-dev \
        libjpeg62-turbo-dev \
        libicu-dev \
        libpq-dev \
        libzip-dev \
    && docker-php-ext-install -j$(nproc) zip \
    && docker-php-ext-install -j$(nproc) pgsql \
    && docker-php-ext-install -j$(nproc) pdo_pgsql \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Установите Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install chrome, required for the symfony/panther library
ENV PANTHER_NO_SANDBOX 1
# Not mandatory, but recommended
ENV PANTHER_CHROME_ARGUMENTS='--headless --no-sandbox --disable-infobars --disable-dev-shm-usage --disable-gpu --disable-extensions --remote-debugging-port=9222'
RUN wget https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb -O /tmp/chrome.deb
RUN dpkg -i /tmp/chrome.deb || apt-get install -yf
RUN rm /tmp/chrome.deb

WORKDIR /var/www
