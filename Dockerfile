FROM php:7.2-cli
RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git
RUN git clone https://github.com/douma/langtons-ant src

RUN apt-get update -y && apt-get install -y libpng-dev

RUN apt-get update && \
    apt-get install -y --no-install-recommends git zip
WORKDIR src
RUN curl --silent --show-error https://getcomposer.org/installer | php
RUN php composer.phar install 
RUN docker-php-ext-install gd

ENTRYPOINT ["php"]
CMD ["-S", "0.0.0.0:8080","/src/src/examples/image.php"]