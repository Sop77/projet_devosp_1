

# Utilisez l'image Jenkins existante comme image de base
FROM jenkins/jenkins:lts

# Installez Node.js et npm
USER root
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm

# Revenez à l'utilisateur Jenkins pour les commandes suivantes
USER jenkins

# Définissez le répertoire de travail pour Node.js dans le conteneur
WORKDIR /usr/src/app

# Copiez les fichiers package.json et package-lock.json dans le conteneur
COPY package*.json ./

# Installez les dépendances
RUN npm install

# Copiez les fichiers source de l'application dans le conteneur
COPY . .

# Définissez la commande par défaut pour exécuter l'application
CMD [ "npm", "start" ]
