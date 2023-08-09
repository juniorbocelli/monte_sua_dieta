DROP DATABASE `diet_system`;

CREATE DATABASE `diet_system`;

USE `diet_system`;

CREATE TABLE `users` (
	`email` VARCHAR(100) NOT NULL,
	`name` VARCHAR(50) NOT NULL,
    `password` VARCHAR(32) NOT NULL,
    
    CONSTRAINT `email_pk` PRiMARY KEY(`email`)
);

CREATE TABLE `diets` (
	`id` BIGINT NOT NULL AUTO_INCREMENT,
    `user` VARCHAR(50) NOT NULL,
    `nome` VARCHAR(100) NOT NULL,
    CONSTRAINT `d_id_pk` PRIMARY KEY(`id`)
);

ALTER TABLE `diets` ADD CONSTRAINT `user_fk` FOREIGN KEY(`user`) REFERENCES users(`email`);

CREATE TABLE `meals` (
	`id` BIGINT NOT NULL AUTO_INCREMENT,
    `diet` BIGINT NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    
    CONSTRAINT `m_id_pk` PRIMARY KEY(`id`)
);

ALTER TABLE `meals` ADD CONSTRAINT `diet_fk` FOREIGN KEY(`diet`) REFERENCES diets(`id`);

CREATE TABLE `assign_foods_and_meals` (
	`meals` BIGINT NOT NULL,
    `food` BIGINT NOT NULL
);

ALTER TABLE `assign_foods_and_meals` ADD CONSTRAINT `meals_fk` FOREIGN KEY(`meals`) REFERENCES meals(`id`);
