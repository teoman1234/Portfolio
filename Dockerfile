FROM php:8.3-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli \
    && a2enmod rewrite \
    && a2dismod mpm_event mpm_worker || true \
    && a2enmod mpm_prefork

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html \
    && sed -i 's|AllowOverride None|AllowOverride All|g' /etc/apache2/apache2.conf

ENV PORT=80
EXPOSE 80

CMD sh -c 'sed -i "s/80/${PORT}/g" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf && apache2-foreground'
