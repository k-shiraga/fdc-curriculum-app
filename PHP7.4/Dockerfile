FROM php:7.4.20-apache

# php の拡張機能に必要なライブラリをインストール
RUN apt-get update && \
    apt-get install -y libicu-dev libzip-dev libpng-dev libpq-dev unzip sqlite3 libonig-dev

# MySQLi と PDO_MySQLをインストール
RUN docker-php-ext-install mysqli pdo pdo_mysql

# PHPの設定
# 必要に応じて php.ini をコピーするか、PHPの設定をここで行う
# COPY php.ini $PHP_INI_DIR/php.ini

# Apache のmod_rewriteを有効にする
RUN a2enmod rewrite

# 000-default.confをコンテナにコピー
COPY ./000-default.conf /etc/apache2/sites-enabled/000-default.conf

# composer version 1 のインストール
RUN curl -sS https://getcomposer.org/composer-1.phar -o composer.phar && \
    mv composer.phar /usr/local/bin/composer && \
    chmod a+x /usr/local/bin/composer
