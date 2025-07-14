FROM php:8.2-apache

# Copy toàn bộ code vào thư mục web gốc
COPY . /var/www/html/

# Mở port cho web
EXPOSE 80
RUN mkdir -p /var/www/html/database && chmod -R 777 /var/www/html/database
