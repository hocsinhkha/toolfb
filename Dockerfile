FROM php:8.1-apache

# Cài PostgreSQL driver cho PDO
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_pgsql

# Copy code
COPY . /var/www/html

# Cấp quyền ghi nếu cần
RUN chmod -R 777 /var/www/html

EXPOSE 80
