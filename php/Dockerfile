ARG PHP_FPM_VERSION
FROM php:${PHP_FPM_VERSION}-fpm
LABEL maintainer="niudou <89731416@qq.com>"

RUN apt-get update && apt-get install -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
    libicu-dev \
    libmemcached-dev \
    libz-dev \
    libpq-dev \
    libssl-dev \
    libmcrypt-dev \
    libxml2-dev \
    libbz2-dev \
    curl \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd \
  && docker-php-ext-install mysqli \
  && docker-php-ext-install pdo_mysql

# 安装redis扩展
ARG INSTALL_PHPREDIS=false
RUN if [ ${INSTALL_PHPREDIS} = true ]; then \
    # Install Php Redis Extension
    if [ $(php -r "echo PHP_MAJOR_VERSION;") = "5" ]; then \
      pecl install -o -f redis-4.3.0; \
    else \
      pecl install -o -f redis-5.1.1; \
    fi \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis \
;fi

WORKDIR /var/www
CMD ["php-fpm"]

EXPOSE 9000
