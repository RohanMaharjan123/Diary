DROP DATABASE IF EXISTS db_ediary;

CREATE DATABASE db_ediary;

USE db_ediary;

CREATE TABLE
    `users`(
        `id` INT NOT NULL AUTO_INCREMENT,
        `name` VARCHAR(100),
        `username` VARCHAR(100),
        `email` VARCHAR(100),
        `password` VARCHAR(100),
        PRIMARY KEY (`id`)
    );

CREATE TABLE
    entries (
        id INT PRIMARY KEY AUTO_INCREMENT,
        date DATE NOT NULL,
        title TEXT NOT NULL,
        entry TEXT NOT NULL,
        user_id INT NOT NULL,
        FOREIGN KEY (user_id) REFERENCES users(id)
    );