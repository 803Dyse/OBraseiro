FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    libicu-dev \
    libmariadb-dev-compat \
    libmariadb-dev && \
    docker-php-ext-configure intl && \
    docker-php-ext-install intl mysqli pdo pdo_mysql && \
    rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN rm -rf /var/www/html/* && \
    composer create-project codeigniter4/appstarter /var/www/html

RUN echo '<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

RUN mkdir -p /var/www/html/writable/uploads/profile_pics && \
    chown -R www-data:www-data /var/www/html/writable/uploads && \
    chmod -R 755 /var/www/html/writable/uploads

RUN chmod -R 777 /var/www/html/writable

CMD ["apache2-foreground"]
