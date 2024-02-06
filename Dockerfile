# Stage 1: Build database image
FROM mysql:latest AS database

# Set environment variables
ENV MYSQL_ROOT_PASSWORD=root
ENV MYSQL_DATABASE=mydatabase
ENV MYSQL_USER=myuser
ENV MYSQL_PASSWORD=mypassword

# Copy the initialization script
COPY ./init.sql /docker-entrypoint-initdb.d/

# Stage 2: Build web server image
FROM nginx:alpine AS webserver

# Set the working directory in the container
WORKDIR /usr/share/nginx/html

# Copy website files from the build context into the container
COPY . .

# Copy nginx configuration file from the same directory as Dockerfile
COPY nginx.conf .

# Expose the default HTTP port
EXPOSE 80 

# Final stage: Create a minimal image with the necessary artifacts
FROM nginx:alpine

# Copy files from the webserver stage
COPY --from=webserver /usr/share/nginx/html /usr/share/nginx/html

# Copy nginx configuration file from the same directory as Dockerfile
COPY nginx.conf /etc/nginx/nginx.conf

# Expose the default HTTP port
EXPOSE 80

# Optionally, you can copy other configuration files or perform additional setup here

# Start the nginx web server
CMD ["nginx", "-g", "daemon off;"]
