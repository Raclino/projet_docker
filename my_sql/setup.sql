CREATE DATABASE docker_data;

CREATE DATABASE laravel;

USE docker_data;

CREATE TABLE users (ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT, username VARCHAR(20), email VARCHAR(50), password VARCHAR(255));

INSERT INTO users (username, email, password) VALUES ('User1','user1@mail.test','password'),('User2','user2@mail.test','password');
