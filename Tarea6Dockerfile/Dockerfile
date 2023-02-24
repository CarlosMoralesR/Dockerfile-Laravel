# Define la imagen base
FROM php:8.0-apache

# Copia los archivos de la aplicación en el contenedor
COPY . /var/www/html

# Instala dependencias de PHP y Apache
RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo && \
    a2enmod rewrite

# Configura el servidor Apache
COPY ./config/sicei.conf /etc/apache2/sites-available/sicei.conf
RUN a2ensite sicei.conf

# Expone el puerto 80
EXPOSE 80

# Define la ruta de trabajo para el contenedor
WORKDIR /var/www/html

# Inicia la aplicación al ejecutar el contenedor
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
