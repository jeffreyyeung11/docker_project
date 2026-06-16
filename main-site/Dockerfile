FROM php:8.2-apache

RUN docker-php-ext-install mysqli

RUN a2enmod rewrite headers

COPY apache/resume-site.conf /etc/apache2/sites-available/resume-site.conf
COPY apache/jefffolio.conf /etc/apache2/sites-available/jefffolio.conf


RUN a2dissite 000-default.conf \
    && a2ensite resume-site.conf \
    && a2ensite jefffolio.conf
