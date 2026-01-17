FROM php:8.2-cli

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
    default-mysql-client

# 2. Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# 3. Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Install Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# 5. Set working directory
WORKDIR /var/www

# 6. Copy ONLY Composer files first (Better caching & debugging)
COPY composer.json composer.lock .

# 7. Install Dependencies (This verifies composer.json is there)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# 8. Copy Application Files
COPY . .

# 9. Finish Composer Setup (Scripts & Autoload)
RUN composer dump-autoload --optimize

# 10. Build Assets
RUN npm install
RUN npm run build

# 11. Expose port 8080
EXPOSE 8080

# 12. Start command
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
