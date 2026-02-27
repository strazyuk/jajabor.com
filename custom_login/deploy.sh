#!/usr/bin/env bash

# Deployment script for Jajabor.com Custom Login
# -------------------------------------------------
# 1. Install PHP dependencies
composer install --no-interaction --prefer-dist --optimize-autoloader

# 2. Install Node dependencies
npm ci

# 3. Build assets for production
npm run build

# 4. Run database migrations (force for production)
php artisan migrate --force

# 5. Clear caches
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 6. Restart queue workers (if any)
# php artisan queue:restart

echo "Deployment completed successfully."
