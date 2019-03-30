FROM wordpress:php7.2-apache

ARG APACHE_DOCUMENT_ROOT 

RUN sed -ri -e "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/*.conf
RUN sed -ri -e "s!/var/www/!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN apt-get update &&\
  apt-get install --no-install-recommends --assume-yes --quiet ca-certificates curl git &&\
  rm -rf /var/lib/apt/lists/*

# install xdebug
RUN pecl install -f xdebug \
  && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini;


# so wordpress image does check for wp in the right directory and does not install
# TODO: maybe use https://github.com/dwnload/wp-docker-bedrock
WORKDIR "${APACHE_DOCUMENT_ROOT}/wp"
