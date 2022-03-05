Pooja Thote3:51 PM
FROM php:7.2-apache

MAINTAINER csi5510

RUN apt update
#setup apache config to use rewrite rules
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

#For Apache to understand rewrite rules, we first need to activate mod_rewrite
RUN a2enmod rewrite

COPY ./code/. .

EXPOSE 80

CMD ["apache2-foreground"]