#!/bin/bash
set -e

echo "=== School API Startup ==="

# Re-cache config with current runtime env vars (override any build-time cache)
echo "Caching configuration..."
php artisan config:clear
php artisan config:cache

# Wait for MySQL to be ready
echo "Waiting for MySQL at ${DB_HOST}:${DB_PORT}..."
MAX_TRIES=30
COUNT=0
until php -r "
try {
    \$pdo = new PDO(
        'mysql:host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT') . ';dbname=' . getenv('DB_DATABASE'),
        getenv('DB_USERNAME'),
        getenv('DB_PASSWORD'),
        [PDO::ATTR_TIMEOUT => 3, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    echo 'connected';
    exit(0);
} catch (Exception \$e) {
    exit(1);
}
" 2>/dev/null; do
    COUNT=$((COUNT + 1))
    if [ "$COUNT" -ge "$MAX_TRIES" ]; then
        echo "ERROR: MySQL did not become ready after ${MAX_TRIES} attempts. Exiting."
        exit 1
    fi
    echo "MySQL not ready (attempt ${COUNT}/${MAX_TRIES}), retrying in 3s..."
    sleep 3
done

echo "MySQL is ready!"

# Run database migrations
echo "Running migrations..."
php artisan migrate --force

# Start the PHP development server
echo "Starting server on port ${PORT}..."
exec php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"
