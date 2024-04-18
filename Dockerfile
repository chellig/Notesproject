# Utilisez l'image de base PHP avec FPM pour Laravel
FROM php:7.4-fpm

# Installation des dépendances nécessaires
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Installation de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installation de Node.js et npm
RUN npm install
# Définition du répertoire de travail dans le conteneur
WORKDIR /home/vm1/GestionNotes

# Copie des fichiers du projet Laravel dans le conteneur
COPY . .

# Installation des dépendances PHP via Composer
RUN composer install

# Installation des dépendances Vue.js via npm
WORKDIR /home/vm1/GestionNotes
COPY frontend/package*.json ./
RUN npm install

# Compilation des fichiers Vue.js
RUN npm run build

# Retour au répertoire principal
WORKDIR /home/vm1/GestionNotes

# Configuration de Nginx
FROM nginx:latest

# Copie du fichier de configuration Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Exposition du port 80
EXPOSE 80
