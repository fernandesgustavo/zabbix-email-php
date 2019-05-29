FROM webdevops/php-apache:7.3

LABEL Gustavo Fernandes

COPY . /app

COPY zabbixemailphp.apache.conf /opt/docker/etc/httpd/vhost.common.d/zabbixemailphp.apache.conf

WORKDIR /app

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/bin/ --filename=composer

RUN composer install

RUN chown -R application:application /app
RUN chmod -R 755 /app