FROM php:8.3-cli

# 1. Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libicu-dev \
    libjpeg-dev \
    libfreetype6-dev \
    default-mysql-client

# 2. Configure & Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl opcache

# 3. Install Redis extension
RUN pecl install redis && docker-php-ext-enable redis

# 4. Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 5. Install Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# 6. Set working directory
WORKDIR /var/www

# 7. Copy application files
COPY . .

# 8. Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-scripts --ignore-platform-reqs

# 9. Build Frontend Assets
RUN npm install
RUN npm run build

# 10. Expose port 8080
EXPOSE 8080

# 11. Start command
# FIX: Run migrations, seed, and storage link on startup
CMD sh -c "php artisan migrate --force && php artisan db:seed --force && php artisan storage:link && php artisan serve --host=0.0.0.0 --port=8080"