FROM ubuntu:22.04.2
MAINTAINER julia <you-orange@mail.ru>
RUN apt-get update && \
    apt-get install -y apache2 libapache2-mod-php7.4 php7.4 php7.4-pgsql php7.4-gd php7.4-mbstring php7.4-xml composer
RUN composer global require "fxp/composer-asset-plugin:^1.4.1" && \
    composer create-project --prefer-dist yiisoft/yii2-app-basic /var/www/html/crm
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite
RUN docker-php-ext-install pdo pdo_pgsql gd mbstring xml
RUN chown -R www-data:www-data /var/www/html/crm
WORKDIR /var/www/html/crm
CMD ["apache2ctl", "-D", "FOREGROUND"]
