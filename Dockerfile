FROM php:7-alpine

RUN curl -Ls https://getcomposer.org/composer.phar > /usr/local/bin/composer && \
    curl -Ls https://phar.phpunit.de/phpunit.phar > /usr/local/bin/phpunit && \
    curl -Ls http://apigen.org/apigen.phar > /usr/local/bin/apigen && \
    chmod +x /usr/local/bin/composer /usr/local/bin/phpunit /usr/local/bin/apigen

CMD ["/bin/sh"]
