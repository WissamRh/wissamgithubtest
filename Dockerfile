# Use an existing Apache image with PHP support as a base
FROM php:apache

# Install the MySQLi extension
RUN docker-php-ext-install mysqli

# Set the working directory in the container
WORKDIR /var/www/html

# Copy HTML and PHP files from the host into the container
COPY . .

# Expose port 80 to the outside world
EXPOSE 80
