-- init.sql
USE mydatabase;

-- Your SQL initialization script goes here
CREATE TABLE mytable (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Insert some sample data
INSERT INTO mytable (name) VALUES ('Example 1'), ('Example 2');
