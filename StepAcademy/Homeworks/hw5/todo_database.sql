CREATE DATABASE todo;

USE todo;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL
);

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    task_name VARCHAR(255) NOT NULL,
    task_status ENUM('pending', 'completed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (username)
VALUES 
    ('Qonus'),
    ('Ansar'),
    ('Alikhan');

INSERT INTO tasks (user_id, task_name, task_status)
VALUES 
    (1, 'Complete UltraPackage design', 'completed'),
    (1, 'Finish telegram bot', 'pending'),
    (1, 'Complete last UML homework', 'pending'),
    (2, 'Go to gym', 'completed'),
    (2, 'Learn programming', 'pending'),
    (2, 'Pass IELTS exam', 'pending'),
    (3, 'Relax', 'completed'),
    (3, 'Play brawl stars and dota', 'completed'),
    (3, 'Win first place in national math olympiad', 'pending');