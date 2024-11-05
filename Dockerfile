# PHP와 Apache를 포함한 기본 이미지
FROM php:8.0-apache

# PDO MySQL 확장 설치
RUN docker-php-ext-install pdo pdo_mysql

# 애플리케이션 소스 복사
COPY . /var/www/html/

# 포트 노출
EXPOSE 80
