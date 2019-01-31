FROM wordpress:php7.2-apache

ARG APACHE_DOCUMENT_ROOT 

RUN sed -ri -e "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/*.conf
RUN sed -ri -e "s!/var/www/!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# so wordpress image does check for wp in the right directory and does not install
# TODO: maybe use https://github.com/dwnload/wp-docker-bedrock
WORKDIR "${APACHE_DOCUMENT_ROOT}/wp"
