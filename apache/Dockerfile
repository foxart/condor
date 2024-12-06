FROM httpd:2.4

RUN apt update
RUN apt install apache2 -y
#RUN a2enmod mod_deflate
#RUN a2enmod mod_proxy
RUN a2enmod proxy_fcgi \
    && a2enmod headers
#    && a2enmod http2

COPY ./my-httpd.conf /usr/local/apache2/conf/httpd.conf
COPY ./sites-available/ /usr/local/apache2/conf/vhosts/
