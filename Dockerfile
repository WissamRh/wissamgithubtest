# Use a base image with your web server
FROM nginx:alpine

# Set the working directory in the container
WORKDIR /usr/share/nginx/html

# Copy all files from the build context into the container
COPY . .

# Install SQLite
RUN apk add --no-cache sqlite

# Create a directory for the SQLite database
RUN mkdir /data

# Set permissions for the directory
RUN chown nginx:nginx /data

# Expose the default HTTP port
EXPOSE 80
