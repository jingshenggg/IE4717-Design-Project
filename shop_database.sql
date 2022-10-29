-- CREATE DATABASE IF NOT EXISTS shop;
-- USE shop;

-- SELECT "Dropping tables" AS MESSAGE;
-- SET FOREIGN_KEY_CHECKS = 0;
-- -- DROP TABLE IF EXISTS all_products;
-- -- DROP TABLE IF EXISTS phone;
-- -- DROP TABLE IF EXISTS airpod;
-- -- DROP TABLE IF EXISTS smartwatch;
-- DROP TABLE IF EXISTS case1;
-- SET FOREIGN_KEY_CHECKS = 1;

-- SELECT "Creating new tables" AS MESSAGE;

CREATE TABLE product (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(40) NOT NULL,
    product_type VARCHAR(40)
);
CREATE TABLE product_detail (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_price float NOT NULL,
    product_capacity VARCHAR(40),
    product_id int unsigned not null,
    constraint `fk_productid`
        foreign key (product_id) references product(id)
        on delete cascade
        on update restrict
    
);


INSERT INTO product (id, product_name, product_type)
    VALUES (NULL, "iPhone 14 Pro Leather Case with MagSafe", "case"),
    (NULL, "iPhone 14 Clear Case with MagSafe", "case"),
    (NULL, "iPhone 14 Plus Silicone Case with MagSafe","case"),
    (NULL, "iPhone 14 Pro Max Leather Case with MagSafe",  "case"),
    (NULL, "Apple Watch 8", "watch"),
    (NULL, "Apple Watch SE", "watch"),
    (NULL, "Apple Watch Ultra", "watch"),
    (NULL, "Apple Watch Hermes", "watch"),
    (NULL, "AirPods (2nd Gen)","airpod"),
    (NULL, "AirPods (3rd Gen)","airpod"),
    (NULL, "AirPods Pro (2nd Gen)","airpod"),
    (NULL, "AirPods Max","airpod"),
    (NULL, "iPhone 14 Pro","phone"),
    (NULL, "iPhone 14 Pro Max","phone"),
    (NULL, "iPhone 14","phone"),
    (NULL, "iPhone 14 Max","phone")


    INSERT INTO product_detail (id, product_price, product_capacity,product_id)
    VALUES (NULL, 59.00, NULL,1),
    (NULL, 49.00, NULL, 2),
    (NULL, 49.00, NULL, 3),
    (NULL, 59.00, NULL, 4),
    (NULL, 399.00, NULL, 5),
    (NULL, 249.00, NULL, 6),
    (NULL, 399.00, NULL, 7),
    (NULL, 1759.00, NULL, 8),
    (NULL, 199.00, NULL, 9),
    (NULL, 269.00, NULL, 10),
    (NULL, 359.00, NULL, 11),
    (NULL, 799.00, NULL, 12),
    (NULL, 1649.00, "128GB", 13),
    (NULL, 1819.00, "256GB", 13),
    (NULL, 2149.00, "512GB", 13),
    (NULL, 2479.00, "1TB", 13),

    (NULL, 1649.00, "128GB", 14),
    (NULL, 1819.00, "256GB", 14),
    (NULL, 2149.00, "512GB", 14),
    (NULL, 2479.00, "1TB", 14),

    (NULL, 1649.00, "128GB", 15),
    (NULL, 1819.00, "256GB", 15),
    (NULL, 2149.00, "512GB", 15),
    (NULL, 2479.00, "1TB", 15),

    (NULL, 1649.00, "128GB", 16),
    (NULL, 1819.00, "256GB", 16),
    (NULL, 2149.00, "512GB", 16),
    (NULL, 2479.00, "1TB", 16)
    














-- SELECT "Filling product table" AS MESSAGE;
-- INSERT INTO shop.product (product_id, product_name, product_price, product_color, product_capacity, product_type)
--     VALUES (NULL, "iPhone 14 Pro Leather Case with MagSafe", 59.00, NULL, NULL, "case"),
--     (NULL, "iPhone 14 Clear Case with MagSafe", 49.00, NULL, NULL, "case"),
--     (NULL, "iPhone 14 Plus Silicone Case with MagSafe", 49.00, NULL, NULL, "case"),
--     (NULL, "iPhone 14 Pro Max Leather Case with MagSafe", 59.00, NULL, NULL, "case"),
--     (NULL, "Apple Watch 8", 399.00, NULL, NULL, "watch"), 
--     (NULL, "Apple Watch SE", 249.00, NULL, NULL, "watch"),
--     (NULL, "Apple Watch Ultra", 799.00, NULL, NULL, "watch"),
--     (NULL, "Apple Watch Hermes", 1759.00, NULL, NULL, "watch"),

--     (NULL, "AirPods (2nd Gen)", 199.00, NULL, NULL,"airpod"),
--     (NULL, "AirPods (3rd Gen)", 269.00, NULL, NULL,"airpod"),
--     (NULL, "AirPods Pro (2nd Gen)", 359.00, NULL, NULL,"airpod"),
--     (NULL, "AirPods Max", 799.00, NULL, NULL,"airpod"),

    -- iphone 14 pro
    -- (NULL, "iPhone 14 Pro", 1649.00, "Deep Purple", "128GB","phone"),
    -- (NULL, "iPhone 14 Pro", 1819.00, "Deep Purple", "256GB","phone"),
    -- (NULL, "iPhone 14 Pro", 2149.00, "Deep Purple", "512GB","phone"),
    -- (NULL, "iPhone 14 Pro", 1649.00, "Gold", "128GB","phone"),
    -- (NULL, "iPhone 14 Pro", 1819.00, "Gold", "256GB","phone"),
    -- (NULL, "iPhone 14 Pro", 2149.00, "Gold", "512GB","phone"),
    -- (NULL, "iPhone 14 Pro", 2479.00, "Gold", "1TB","phone"),
    -- (NULL, "iPhone 14 Pro", 1649.00, "Silver", "128GB","phone"),
    -- (NULL, "iPhone 14 Pro", 1819.00, "Silver", "256GB","phone"),
    -- (NULL, "iPhone 14 Pro", 2149.00, "Silver", "512GB","phone"),
    -- (NULL, "iPhone 14 Pro", 2479.00, "Silver", "1TB","phone"),
    -- (NULL, "iPhone 14 Pro", 1649.00, "Space Black", "128GB","phone"),
    -- (NULL, "iPhone 14 Pro", 1819.00, "Space Black", "256GB","phone"),
    -- (NULL, "iPhone 14 Pro", 2149.00, "Space Black", "512GB","phone"),
    -- (NULL, "iPhone 14 Pro", 2479.00, "Space Black", "1TB","phone"),
    -- iphone 14 pro max
    -- (NULL, "iPhone 14 Pro Max", 1649.00, "Deep Purple", "128GB","phone"),
    -- (NULL, "iPhone 14 Pro Max", 1819.00, "Deep Purple", "256GB","phone"),
    -- (NULL, "iPhone 14 Pro Max", 2149.00, "Deep Purple", "512GB","phone"),
    -- (NULL, "iPhone 14 Pro Max", 1649.00, "Gold", "128GB","phone"),
    -- (NULL, "iPhone 14 Pro Max", 1819.00, "Gold", "256GB","phone"),
    -- (NULL, "iPhone 14 Pro Max", 2149.00, "Gold", "512GB","phone"),
    -- (NULL, "iPhone 14 Pro Max", 2479.00, "Gold", "1TB","phone"),
    -- (NULL, "iPhone 14 Pro Max", 1649.00, "Silver", "128GB","phone"),
    -- (NULL, "iPhone 14 Pro Max", 1819.00, "Silver", "256GB","phone"),
    -- (NULL, "iPhone 14 Pro Max", 2149.00, "Silver", "512GB","phone"),
    -- (NULL, "iPhone 14 Pro Max", 2479.00, "Silver", "1TB","phone"),
    -- (NULL, "iPhone 14 Pro Max", 1649.00, "Space Black", "128GB","phone"),
    -- (NULL, "iPhone 14 Pro Max", 1819.00, "Space Black", "256GB","phone"),
    -- (NULL, "iPhone 14 Pro Max", 2149.00, "Space Black", "512GB","phone"),
    -- (NULL, "iPhone 14 Pro Max", 2479.00, "Space Black", "1TB","phone");
    -- iphone 14
    -- (NULL, "iPhone 14", 1649.00, "Deep Purple", "128GB","phone"),
    -- (NULL, "iPhone 14", 1819.00, "Deep Purple", "256GB","phone"),
    -- (NULL, "iPhone 14", 2149.00, "Deep Purple", "512GB","phone"),
    -- (NULL, "iPhone 14", 1649.00, "Gold", "128GB","phone"),
    -- (NULL, "iPhone 14", 1819.00, "Gold", "256GB","phone"),
    -- (NULL, "iPhone 14", 2149.00, "Gold", "512GB","phone"),
    -- (NULL, "iPhone 14", 2479.00, "Gold", "1TB","phone"),
    -- (NULL, "iPhone 14", 1649.00, "Silver", "128GB","phone"),
    -- (NULL, "iPhone 14", 1819.00, "Silver", "256GB","phone"),
    -- (NULL, "iPhone 14", 2149.00, "Silver", "512GB","phone"),
    -- (NULL, "iPhone 14", 2479.00, "Silver", "1TB","phone"),
    -- (NULL, "iPhone 14", 1649.00, "Space Black", "128GB","phone"),
    -- (NULL, "iPhone 14", 1819.00, "Space Black", "256GB","phone"),
    -- (NULL, "iPhone 14", 2149.00, "Space Black", "512GB","phone"),
    -- (NULL, "iPhone 14", 2479.00, "Space Black", "1TB","phone");




