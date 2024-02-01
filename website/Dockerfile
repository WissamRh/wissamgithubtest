
# Use a lightweight web server as the base image
FROM nginx:alpine

# Set the working directory in the container
WORKDIR /usr/share/nginx/html

# Copy all files from the build context into the container
COPY . .

# Expose the default HTTP port
EXPOSE 80
