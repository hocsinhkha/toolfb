FROM php:8.1-apache

# Copy toàn bộ source code vào thư mục web server
COPY . /var/www/html/

# Cấp quyền thư mục database (nếu cần dùng SQLite)
RUN mkdir -p /var/www/html/database && chmod -R 777 /var/www/html/database

# Bắt buộc mở cổng 80 để Render hoạt động
EXPOSE 80
