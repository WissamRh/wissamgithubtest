# Use a lightweight web server as the base image
FROM nginx:alpine

# Set the working directory in the container
WORKDIR /usr/share/nginx/html

# Copy the HTML file into the container
COPY index.html .

# Expose the default HTTP port
EXPOSE 80
