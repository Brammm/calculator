FROM php:8.1.3-bullseye

RUN apt update && apt install --no-install-recommends --no-install-suggests -y unzip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
      php -r "if (hash_file('sha384', 'composer-setup.php') === file_get_contents('https://composer.github.io/installer.sig')) { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
      php composer-setup.php && \
      php -r "unlink('composer-setup.php');" && \
      mv composer.phar /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_HOME=/tmp

COPY src /usr/src/app
WORKDIR /usr/src/app

CMD [ "php", "./bin/calculator.php" ]
