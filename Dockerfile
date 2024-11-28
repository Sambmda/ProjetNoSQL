FROM php:8.2-apache

# Installer les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libssl-dev \
    unzip \
    && docker-php-ext-install pgsql pdo_pgsql \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# Copier le code de l'application
COPY . /var/www/html/

# Assurez-vous que les permissions sont correctement définies
RUN chown -R www-data:www-data /var/www/html
