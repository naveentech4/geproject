FROM php:7.4-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
COPY . /var/www/html
RUN a2enmod rewrite
EXPOSE 80
CMD ["apache2-foreground"]
