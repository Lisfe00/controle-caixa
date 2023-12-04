FROM php:8.2-fpm

ENV DEBIAN_FRONTEND=noninteractive

# Atualize o sistema
RUN apt-get update
RUN apt-get install -y curl
RUN apt-get install -y zip 
RUN apt-get install -y unzip 
RUN apt-get install -y git 
RUN apt-get install -y libzip-dev

# Instale o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Defina o diretório de trabalho
WORKDIR /var/www/html

# Copie os arquivos do projeto para o contêiner
COPY . /var/www/html

RUN apt-get install -y libcurl4-openssl-dev pkg-config libssl-dev
RUN pecl install mongodb -y
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/php.ini
RUN composer require mongodb/laravel-mongodb
# RUN apt-get install -y curl-dev openssl-dev

# Instale as dependências do Composer
RUN composer update

# Exponha a porta 8000 para o servidor web do Laravel
EXPOSE 8000

# Execute o servidor web do Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
