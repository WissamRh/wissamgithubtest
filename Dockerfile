# Stage 1: Build PHP image
FROM php:7.4-apache AS php

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Set working directory
WORKDIR /var/www/html

# Copy PHP files
COPY index.php .
COPY insert.php .

# Stage 2: Build MySQL image
FROM mysql:latest AS database

# Set environment variables
ENV MYSQL_ROOT_PASSWORD=root
ENV MYSQL_DATABASE=mydatabase

# Copy initialization script
COPY ./init.sql /docker-entrypoint-initdb.d/

# Stage 3: Final stage
FROM php AS final

# Expose port 80
EXPOSE 80
