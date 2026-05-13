FROM php:8.3-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli \
    && a2enmod rewrite

RUN rm -f /etc/apache2/mods-enabled/mpm_*.conf /etc/apache2/mods-enabled/mpm_*.load \
    && ln -s /etc/apache2/mods-available/mpm_prefork.conf /etc/apache2/mods-enabled/mpm_prefork.conf \
    && ln -s /etc/apache2/mods-available/mpm_prefork.load /etc/apache2/mods-enabled/mpm_prefork.load \
    && ls -la /etc/apache2/mods-enabled/ | grep mpm

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html \
    && sed -i 's|AllowOverride None|AllowOverride All|g' /etc/apache2/apache2.conf

ENV PORT=80
EXPOSE 80

CMD sh -c 'sed -i "s/Listen 80/Listen ${PORT}/g" /etc/apache2/ports.conf && sed -i "s/:80/:${PORT}/g" /etc/apache2/sites-available/000-default.conf && apache2-foreground'
