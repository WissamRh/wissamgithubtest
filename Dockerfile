# Use an existing Apache image with PHP support as a base
FROM php:apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy HTML and PHP files from the host into the container
COPY . .

# Expose port 80 to the outside world
EXPOSE 80
