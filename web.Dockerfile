# Utiliser l'image officielle PHP avec Apache
FROM php:7.4-apache

# Installer les extensions pdo_mysql
RUN docker-php-ext-install pdo_mysql

# Copier les fichiers PHP dans le dossier public du serveur web
#COPY ./index.php /var/www/html/
#COPY ./modifier.php /var/www/html/
#COPY ./traitement.php /var/www/html/
#COPY ./static/* /var/www/html/
COPY . /var/www/html/
# Changer les permissions des fichiers pour s'assurer qu'ils sont accessibles
RUN chmod -R 755 /var/www/html/


# Activer le mod_rewrite pour Apache
RUN a2enmod rewrite
