CREATE DATABASE online_store;
use online_store;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_type ENUM("Administrator", "Customer", "Manager") NOT NULL DEFAULT "Customer",
    first_name VARCHAR(32) NOT NULL,
    last_name VARCHAR(32) NOT NULL,
    email VARCHAR(64) UNIQUE NOT NULL CHECK (email LIKE "%@%.%"),
    phone VARCHAR(20) UNIQUE DEFAULT NULL,
    password VARCHAR(256) NOT NULL,
    salt CHAR(32) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE customers (
    user_id INT PRIMARY KEY,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE addresses (
    address_id INT AUTO_INCREMENT PRIMARY KEY,
    address_label VARCHAR(16) DEFAULT NULL,
    customer_id INT NOT NULL,
    address_line1 VARCHAR(256) NOT NULL,
    address_line2 VARCHAR(256) DEFAULT NULL,
    city VARCHAR(32) NOT NULL,
    state VARCHAR(32) DEFAULT NULL,
    postal_code VARCHAR(16) NOT NULL,
    country VARCHAR(32) NOT NULL,
    address_comment TEXT DEFAULT NULL,
    FOREIGN KEY (customer_id) REFERENCES customers(user_id) ON DELETE CASCADE
);

ALTER TABLE customers ADD COLUMN default_address_id INT DEFAULT NULL;
ALTER TABLE customers ADD FOREIGN KEY (default_address_id) REFERENCES addresses(address_id);

CREATE TABLE managers (
    user_id INT PRIMARY KEY,
    iin CHAR(12) UNIQUE NOT NULL,
    birthday DATE NOT NULL,
    status ENUM("Active", "Inactive") DEFAULT "Active",
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);