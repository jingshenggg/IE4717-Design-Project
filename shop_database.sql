CREATE DATABASE IF NOT EXISTS shop;
USE shop;

SELECT "Dropping tables" AS MESSAGE;
SET FOREIGN_KEY_CHECKS = 0;
-- DROP TABLE IF EXISTS all_products;
-- DROP TABLE IF EXISTS phone;
-- DROP TABLE IF EXISTS airpod;
-- DROP TABLE IF EXISTS smartwatch;
DROP TABLE IF EXISTS case1;
SET FOREIGN_KEY_CHECKS = 1;

SELECT "Creating new tables" AS MESSAGE;

CREATE TABLE case1 (
    case_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    case_name VARCHAR(40) NOT NULL,
    case_price float NOT NULL
);


SELECT "Filling product table" AS MESSAGE;
INSERT INTO shop.case1 (case_id, case_name, case_price)
    VALUES (NULL, "iPhone 14 Pro Leather Case with MagSafe", 10.00),
    (NULL, "iPhone 14 Clear Case with MagSafe", 11.00),
    (NULL, "iPhone 14 Plus Silicone Case with MagSafe", 12.00),
    (NULL, "iPhone 14 Pro Max Leather Case with MagSafe", 13.00);

