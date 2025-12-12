FROM debian:bookworm

RUN apt-get update && apt-get install -y \
    php-mysqli \
    php-fpm \
    curl \
    && rm -rf /var/lib/apt/lists/*

COPY ./conf/www.conf /etc/php/8.2/fpm/pool.d/www.conf
COPY ./tools/init-wp.sh /init-wp.sh
RUN chmod +x /init-wp.sh

CMD [ "/init-wp.sh" ]