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

CREATE TABLE product (
    product_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(40) NOT NULL,
    product_price float NOT NULL,
    product_color VARCHAR(40),
    product_capacity VARCHAR(40)
);


SELECT "Filling product table" AS MESSAGE;
INSERT INTO shop.product (product_id, product_name, product_price, product_color, product_capacity)
    VALUES (NULL, "iPhone 14 Pro Leather Case with MagSafe", 59.00, NULL, NULL),
    (NULL, "iPhone 14 Clear Case with MagSafe", 49.00, NULL, NULL),
    (NULL, "iPhone 14 Plus Silicone Case with MagSafe", 49.00, NULL, NULL),
    (NULL, "iPhone 14 Pro Max Leather Case with MagSafe", 59.00, NULL, NULL),
    (NULL, "Apple Watch 8", 399.00, NULL, NULL),
    (NULL, "Apple Watch SE", 249.00, NULL, NULL),
    (NULL, "Apple Watch Ultra", 799.00, NULL, NULL),
    (NULL, "Apple Watch Hermes", 1759.00, NULL, NULL),
    (NULL, "AirPods (2nd Gen)", 199.00, NULL, NULL),
    (NULL, "AirPods (3rd Gen)", 269.00, NULL, NULL),
    (NULL, "AirPods Pro (2nd Gen)", 359.00, NULL, NULL),
    (NULL, "AirPods Max", 799.00, NULL, NULL),
    (NULL, "iPhone 14 Pro", 1649.00, "Deep Purple", "128GB"),
    (NULL, "iPhone 14 Pro", 1819.00, "Deep Purple", "256GB"),
    (NULL, "iPhone 14 Pro", 2149.00, "Deep Purple", "512GB"),
    (NULL, "iPhone 14 Pro", 1649.00, "Gold", "128GB"),
    (NULL, "iPhone 14 Pro", 1819.00, "Gold", "256GB"),
    (NULL, "iPhone 14 Pro", 2149.00, "Gold", "512GB"),
    (NULL, "iPhone 14 Pro", 2479.00, "Gold", "1TB"),
    (NULL, "iPhone 14 Pro", 1649.00, "Silver", "128GB"),
    (NULL, "iPhone 14 Pro", 1819.00, "Silver", "256GB"),
    (NULL, "iPhone 14 Pro", 2149.00, "Silver", "512GB"),
    (NULL, "iPhone 14 Pro", 2479.00, "Silver", "1TB"),
    (NULL, "iPhone 14 Pro", 1649.00, "Space Black", "128GB"),
    (NULL, "iPhone 14 Pro", 1819.00, "Space Black", "256GB"),
    (NULL, "iPhone 14 Pro", 2149.00, "Space Black", "512GB"),
    (NULL, "iPhone 14 Pro", 2479.00, "Space Black", "1TB");



