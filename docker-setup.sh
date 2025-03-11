#!/bin/bash

# Create necessary directories
mkdir -p nginx/conf.d
mkdir -p php
mkdir -p mysql

# Build and start the containers
docker-compose up -d

# Install composer dependencies
docker-compose exec app composer install

# Set proper permissions
docker-compose exec app chmod -R 777 storage bootstrap/cache

# Run migrations
docker-compose exec app php artisan migrate

# Install NPM dependencies and build assets
docker-compose exec app npm install
docker-compose exec app npm run build

echo "Docker setup completed successfully!"
echo "You can now access the application at http://localhost" 