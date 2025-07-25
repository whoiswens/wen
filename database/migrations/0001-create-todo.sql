CREATE DATABASE IF NOT EXISTS uph_23ti2;
USE uph_23ti2;
DROP TABLE IF EXISTS todo;

CREATE TABLE todo(
    id BIGINT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    task VARCHAR(255) NOT NULL,
    status VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
