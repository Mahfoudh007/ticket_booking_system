-- Create the database
CREATE DATABASE TicketBookingSystem;

-- Use the created database
USE TicketBookingSystem;

--Create the orders table
CREATE TABLE orders (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) NOT NULL,
    created DATATIME DEFAULT CURRENT_TIMESTAMP
);

--Create the ticket types table
CREATE TABLE ticket_types (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(50) NOT NULL,
    price INT(11) NOT NULL
);


--Create the tikets table
CREATE TABLE tikets (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    order_id INT(10) NOT NULL,
    ticket_type INT(10) NOT NULL,
    quantity INT(11) NOT NULL,
    barcode VARCHAR(120) UNIQUE NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE ON UPDATE NO ACTION,
    FOREIGN KEY (ticket_type) REFERENCES orders(id) ON DELETE CASCADE ON UPDATE NO ACTION
);