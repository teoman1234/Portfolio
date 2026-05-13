FROM php:8.3-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli \
    && a2enmod rewrite

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html

RUN sed -i 's|<Directory /var/www/>|<Directory /var/www/html/>|' /etc/apache2/apache2.conf \
    && sed -i 's|AllowOverride None|AllowOverride All|' /etc/apache2/apache2.conf

RUN echo "Listen \${PORT:-80}" > /etc/apache2/ports.conf \
    && sed -i 's|:80|:${PORT}|g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80
CMD ["apache2-foreground"]
