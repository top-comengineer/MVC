-- DB SCRIPTS
-- ========== 
-- Run these on your Database in PHPMYADMIN when setting up the project

-- USERS TABLE

CREATE TABLE users (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(255),
    email varchar(255),
    password varchar(255),
    created_at DATETIME default CURRENT_TIMESTAMP,
    PRIMARY KEY (id) 
);

CREATE TABLE entity (
    id int NOT NULL AUTO_INCREMENT,
    user_id INT,
    title VARCHAR(255),
    body TEXT,
    created_at DATETIME default CURRENT_TIMESTAMP,
    PRIMARY KEY (id) 
);
