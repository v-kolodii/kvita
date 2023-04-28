FROM php:8.1-fpm-alpine
LABEL MAINTAINER="kolodii.io"
LABEL EMAIL="contactus@kolodii.io"
LABEL DESCRIPTION="container based on latest php:8.1-fpm-alpine with composer, Europe/Kiev timezone and bunch of extentions"
### persistent / runtime deps
ENV TZ=Europe/Kiev
RUN apk update --no-cache && apk upgrade && \
### build deps
apk add --no-cache \
    tzdata \
    shadow && \
### Change uid and fid for www-data user
    usermod -u 83 xfs && \
    groupmod -g 83 xfs && \
### Change uid and fid for www-data user
    usermod -u 33 www-data && \
    groupmod -g 33 www-data && \
    apk del --purge --no-network shadow
RUN ln -sf /usr/share/zoneinfo/${TZ} /etc/localtime && echo ${TZ} > /etc/timezone && \
    printf '[PHP]\ndate.timezone = "%s"\n' ${TZ} > /usr/local/etc/php/conf.d/tzone.ini
### Download Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
### Download script to install PHP extensions and dependencies
ADD https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/master/install-php-extensions /usr/local/bin/
RUN chmod uga+x /usr/local/bin/install-php-extensions && sync
RUN apk update --no-cache \
    && apk add --no-cache \
      curl \
      git \
      zip unzip \
    && install-php-extensions \
      bcmath \
      bz2 \
      exif \
      gd \
      intl \
      ldap \
      memcached \
      mysqli \
      opcache \
      pdo_mysql \
      pgsql \
      redis \
      soap \
      xsl \
      zip \
      sockets \
      gmp \
      mcrypt \
      pspell \
      sysvmsg \
      sysvsem \
      sysvshm \
      apcu \
      mongodb \
      amqp \
      imagick \
      http
### If it isn't present in your install, you will need to enable it yourself.
#RUN mkdir symfony && cd symfony && \
#    wget https://github.com/symfony-cli/symfony-cli/releases/download/v5.2.0/symfony-cli_linux_amd64.tar.gz && \
#    tar -xf symfony-cli_linux_amd64.tar.gz && \
#    cp symfony /usr/local/bin/ && cd - && rm -rf symfony/
RUN mkdir -p /var/www/project && chown -R www-data:www-data /var/www/project
WORKDIR /var/www/project