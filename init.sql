-- init.sql
USE mydatabase;

-- Your SQL initialization script goes here
CREATE TABLE mytable (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone INT NOT NULL
);

-- Insert some sample data
INSERT INTO mytable (name, phone) VALUES ('Example 1', '11111'), ('Example 2', '222222');
