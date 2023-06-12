DROP DATABASE IF EXISTS db_ediary;
CREATE DATABASE db_ediary;
USE db_ediary;

CREATE TABLE `users`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100),
    `username` VARCHAR(100),
    `email` VARCHAR(100),
    `password` VARCHAR(100),
    PRIMARY KEY (`id`)
);