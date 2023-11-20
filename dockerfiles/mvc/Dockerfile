FROM php:8.2-apache
# RUN docker-php-ext-install mysqli
# Añadidas extensiones dom xml xmlreader xmlrpc xmlwriter xsl en RAMA MVC06
RUN docker-php-ext-install pdo pdo_mysql dom xml xmlreader xmlrpc xmlwriter xsl
# /usr/local/bin/docker-php-ext-install -j5 gd mbstring mysqli pdo pdo_mysql shmop

RUN a2enmod rewrite headers


ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf


