FROM php:8.1-apache

# Instala extensões necessárias para o PHP (ex.: PDO MySQL)
RUN docker-php-ext-install pdo pdo_mysql

# Copia o código do projeto para o diretório padrão do Apache
COPY . /var/www/html

# Define as permissões para o Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Habilita o módulo de reescrita do Apache
RUN a2enmod rewrite

# Copia o arquivo de configuração do Apache
COPY ./apache-config.conf /etc/apache2/sites-available/000-default.conf

# Copia o arquivo .htaccess para o diretório raiz do Apache
COPY ./.htaccess /var/www/html/.htaccess

# Exponha a porta padrão do Apache
EXPOSE 80

# Reinicia o serviço Apache
CMD ["apache2-foreground"]

