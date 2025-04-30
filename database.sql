-- database.sql

-- 1) (необязательно) создаем БД, если ее нет
CREATE DATABASE IF NOT EXISTS phpmyadmin
       CHARACTER SET utf8mb4
       COLLATE utf8mb4_unicode_ci;
USE phpmyadmin;

-- 2) создаем таблицу пользователей
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB
    DEFAULT CHARSET=utf8mb4
    COLLATE=utf8mb4_unicode_ci;