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
FROM nginx:latest AS webserver

# Set the working directory in the container
WORKDIR /usr/share/nginx/html

# Install PHP and PHP-FPM
RUN apt-get update && apt-get install -y php-fpm

# Copy website files from the build context into the container
COPY . .

# Copy nginx configuration file from the same directory as Dockerfile
COPY nginx.conf .

# Copy PHP files from the same directory as Dockerfile
COPY process.php .
COPY phpinfo.php .

# Expose the default HTTP port
EXPOSE 80 

# Start PHP-FPM service
CMD ["php-fpm", "-R"]

# Stage 3: Final stage
FROM webserver AS final

# Copy nginx configuration file from the same directory as Dockerfile
COPY nginx.conf /etc/nginx/nginx.conf

# Copy files from the webserver stage
COPY --from=webserver /usr/share/nginx/html /usr/share/nginx/html

# Expose the default HTTP port
EXPOSE 80

# Optionally, you can copy other configuration files or perform additional setup here

# Start the nginx web server
CMD ["nginx", "-g", "daemon off;"]
