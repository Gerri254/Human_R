FROM php:8.2-cli

# 1. Install system dependencies (Added libicu-dev for intl)
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
    default-mysql-client

# 2. Install PHP extensions (Added intl)
RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl

# 3. Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Install Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# 5. Set working directory
WORKDIR /var/www

# 6. Copy application files
COPY . .

# 7. Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# 8. Build Frontend Assets
RUN npm install
RUN npm run build

# 9. Expose port 8080
EXPOSE 8080

# 10. Start command
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
