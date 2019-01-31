FROM php:7.3-fpm

RUN apt-get update && \
  apt-get install -y \
    openssl \
    git \
    curl \
    unzip

RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

RUN apt-get install -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libmcrypt-dev \
		libpng12-dev \
	&& docker-php-ext-install -j$(nproc) iconv mcrypt \
	&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
	&& docker-php-ext-install -j$(nproc) gd

RUN apt-get install -y libz-dev libmemcached-dev
RUN pecl install memcached    
RUN echo extension=memcached.so >> /usr/local/etc/php/conf.d/memcached.ini

# RUN curl -L -o /tmp/memcached.tar.gz "https://github.com/php-memcached-dev/php-memcached/archive/php7.tar.gz" \
#     && mkdir -p memcached \
#     && tar -C memcached -zxvf /tmp/memcached.tar.gz --strip 1 \
#     && ( \
#         cd memcached \
#         && phpize \
#         && ./configure \
#         && make -j$(nproc) \
#         && make install \
#     ) \
#     && rm -r memcached \
#     && rm /tmp/memcached.tar.gz \
# && docker-php-ext-enable memcached \

ADD . /app
WORKDIR /app
