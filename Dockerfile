FROM php:8.2-apache

# Installer les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libssl-dev \
    unzip \
    && docker-php-ext-install pgsql pdo_pgsql \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb
	
# Téléchargement et installation de Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Copier le code de l'application
COPY . /var/www/html/

# Expose le port 80 à l'extérieur
EXPOSE 80

# Assurez-vous que les permissions des fichiers sont correctement définies
RUN chown -R www-data:www-data /var/www/html
