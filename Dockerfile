# Stage 1: Build database image
FROM mysql:latest AS database

# Set environment variables
ENV MYSQL_ROOT_PASSWORD=root
ENV MYSQL_DATABASE=mydatabase
ENV MYSQL_USER=myuser
ENV MYSQL_PASSWORD=mypassword

# Copy the initialization script
COPY ./init.sql /docker-entrypoint-initdb.d/

# Stage 2: Build web server image with PHP support
FROM php:7-fpm AS webserver

# Set the working directory in the container
WORKDIR /usr/share/nginx/html

# Install any additional PHP extensions if needed
# RUN docker-php-ext-install ...

# Copy website files from the build context into the container
COPY . .

# Copy custom PHP configuration
COPY php.ini /etc/php/php.ini

# Stage 3: Final stage
FROM nginx:alpine AS final

# Set the working directory in the container
WORKDIR /usr/share/nginx/html

# Copy files from the webserver stage
COPY --from=webserver /usr/share/nginx/html /usr/share/nginx/html

# Copy nginx configuration file from the same directory as Dockerfile
COPY nginx.conf /etc/nginx/nginx.conf

# Expose the default HTTP port
EXPOSE 80

# Start the nginx web server
CMD ["nginx", "-g", "daemon off;"]
