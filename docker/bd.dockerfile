# Utilisation de l'image de base MySQL
FROM mysql:5.7

# Définition des variables d'environnement
ENV MYSQL_ROOT_PASSWORD=''
ENV MYSQL_DATABASE=aws_p3_g1
ENV MYSQL_USER=root
ENV MYSQL_PASSWORD=''

# Copie des fichiers d'initialisation de la base de données
COPY init.sql /docker-entrypoint-initdb.d/

# Exposition du port MySQL
EXPOSE 3306
