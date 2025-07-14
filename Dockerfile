FROM php:8.1-apache

# Copy toàn bộ source code vào thư mục web
COPY . /var/www/html/

# Cấp quyền cho thư mục database (nếu có)
RUN mkdir -p /var/www/html/database && chmod -R 777 /var/www/html/database
