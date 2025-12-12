#!/bin/sh

set -e

# Create SSL certificates directory
mkdir -p /etc/nginx/certs

# Generate SSL certificate if it doesn't exist
if [ ! -f "/etc/nginx/certs/server.crt" ]; then
    echo "Generating SSL certificate..."
    openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
        -keyout /etc/nginx/certs/server.key \
        -out /etc/nginx/certs/server.crt \
        -subj "/C=DE/ST=Bavaria/L=Munich/O=42School/OU=Student/CN=mknoll.42.fr"
fi

if [ "$#" -eq 0 ]; then
  echo "Starting nginx..."
  exec nginx -g 'daemon off;'
else
  # Ermöglicht z.B.: docker run image nginx -t
  exec "$@"
fi