-- Создание базы данных с именем online_store
CREATE DATABASE online_store;

-- Выбор базы данных online_store для дальнейшей работы
USE online_store;

-- Создание таблицы пользователей
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_type ENUM("Administrator", "Customer", "Manager") NOT NULL DEFAULT "Customer",
    first_name VARCHAR(32) NOT NULL,
    last_name VARCHAR(32) NOT NULL,
    email VARCHAR(64) UNIQUE NOT NULL CHECK (email LIKE "%@%.%"),
    phone VARCHAR(20) UNIQUE DEFAULT NULL,
    password VARCHAR(256) NOT NULL,
    salt CHAR(32) NOT NULL,
    preferred_language ENUM("en", "kk", "ru") NOT NULL DEFAULT "en",
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Таблица для хранения активных сессий пользователей
CREATE TABLE user_sessions (
    session_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    session_token VARCHAR(256) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    last_accessed_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    ip_address VARCHAR(45) DEFAULT NULL,
    user_agent VARCHAR(256) DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Таблица для логирования изменений в таблице users
CREATE TABLE user_logs (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    action VARCHAR(50) NOT NULL,
    old_value TEXT,
    new_value TEXT,
    changed_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Создание таблицы клиентов
CREATE TABLE customers (
    user_id INT PRIMARY KEY,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Создание таблицы адресов
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

-- Добавление столбца для хранения идентификатора основного адреса в таблицу клиентов
ALTER TABLE
    customers
ADD
    COLUMN default_address_id INT DEFAULT NULL;

-- Устанавливаем внешнюю связь для нового столбца
ALTER TABLE
    customers
ADD
    FOREIGN KEY (default_address_id) REFERENCES addresses(address_id);

-- Создание таблицы менеджеров
CREATE TABLE managers (
    user_id INT PRIMARY KEY,
    iin CHAR(12) UNIQUE NOT NULL,
    birthday DATE NOT NULL,
    status ENUM("Active", "Inactive") DEFAULT "Active",
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Создание таблицы категорий
CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(64) NOT NULL,
    parent_category_id INT DEFAULT NULL,
    FOREIGN KEY (parent_category_id) REFERENCES categories(category_id) ON DELETE CASCADE
);

CREATE TABLE category_translations (
    translation_id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    language_code VARCHAR(5),
    translated_name VARCHAR(256),
    FOREIGN KEY (category_id) REFERENCES categories(category_id) ON DELETE CASCADE
);

-- Создание таблицы брендов
CREATE TABLE brands (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(256) NOT NULL,
    description TEXT
);

-- Создание таблицы продуктов
CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(64) NOT NULL,
    category_id INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock_quantity INT NOT NULL,
    brand_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(category_id) ON DELETE CASCADE,
    FOREIGN KEY (brand_id) REFERENCES brands(id) ON DELETE CASCADE
);

-- Создание таблицы переводов продуктов
CREATE TABLE product_translations (
    translation_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    language ENUM("en", "kk", "ru") NOT NULL,
    translated_name VARCHAR(64) NOT NULL,
    translated_description TEXT,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

-- Таблица для хранения истории изменений цен продуктов
CREATE TABLE product_price_history (
    history_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    old_price DECIMAL(10, 2) NOT NULL,
    new_price DECIMAL(10, 2) NOT NULL,
    changed_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

-- Таблица для хранения истории изменений уровня запасов
CREATE TABLE product_stock_history (
    history_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    old_stock INT NOT NULL,
    new_stock INT NOT NULL,
    changed_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

-- Таблица тегов
CREATE TABLE tags (
    tag_id INT AUTO_INCREMENT PRIMARY KEY,
    tag_name VARCHAR(64) NOT NULL
);


-- Промежуточная таблица для связи продуктов и тегов
CREATE TABLE product_tags (
    product_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY (product_id, tag_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id),
    FOREIGN KEY (tag_id) REFERENCES tags(tag_id)
);

-- Создание таблицы заказов
CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    coupon_code VARCHAR(50) DEFAULT NULL,
    status ENUM('Pending', 'Shipped', 'Delivered', 'Cancelled', 'Returned', 'Refunded') DEFAULT 'Pending',
    total_amount DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Создание таблицы деталей заказов
CREATE TABLE order_details (
    order_detail_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    unit_price DECIMAL(10, 2) NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

-- Таблица для управления возвратами и отменами заказов
CREATE TABLE order_returns (
    return_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    return_reason TEXT NOT NULL,
    return_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

-- Создание таблицы изображений продуктов
CREATE TABLE product_images (
    image_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    image_url VARCHAR(256) NOT NULL,
    main_image TINYINT(1) DEFAULT 0 NOT NULL CHECK (main_image IN (0, 1)),
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

-- Создание таблицы отзывов
CREATE TABLE reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    user_id INT,
    language ENUM("en", "kk", "ru") NOT NULL,
    rating DECIMAL(3, 2),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Создание таблицы купонов
CREATE TABLE coupons (
    coupon_id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) UNIQUE,
    discount DECIMAL(5, 2),
    expiration_date DATE
);

-- Создание таблицы квитанций
CREATE TABLE receipts (
    receipt_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    amount DECIMAL(10, 2),
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    payment_method ENUM("kaspi", "card", "paypal") NOT NULL,
    payment_token VARCHAR(256),
    FOREIGN KEY (order_id) REFERENCES orders(order_id) ON DELETE CASCADE
);

-- Создание таблицы корзины покупок
CREATE TABLE shopping_cart (
    record_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    product_id INT,
    quantity INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(user_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(product_id) ON DELETE CASCADE
);

-- Триггер на адреса
DELIMITER $$

CREATE TRIGGER check_user_address_trigger BEFORE
UPDATE
    ON customers FOR EACH ROW BEGIN DECLARE user_id_exists INT;

-- Проверяем существует ли указанный user_id в таблице addresses
SELECT
    COUNT(*) INTO user_id_exists
FROM
    addresses
WHERE
    customer_id = NEW.user_id
    AND address_id = NEW.default_address_id;

-- Если указанный user_id не существует, генерируем ошибку
IF user_id_exists = 0 THEN SIGNAL SQLSTATE '45000'
SET
    MESSAGE_TEXT = 'Нельзя установить адрес другого пользователя';

END IF;

END $$
DELIMITER;

-- Вычисление общей стоимости товара в заказе
DELIMITER $$

CREATE TRIGGER calculate_price_total BEFORE
INSERT
    ON order_details FOR EACH ROW BEGIN
SET
    NEW.total_price = NEW.unit_price * NEW.quantity;

END $$
DELIMITER;

-- Генерация "соли" для пароля пользователя
DELIMITER $$

CREATE TRIGGER generate_salt BEFORE
INSERT
    ON users FOR EACH ROW BEGIN
SET
    NEW.salt = SUBSTRING(MD5(RAND()), 1, 32);

END $$
DELIMITER;

-- Хеширование пароля пользователя
DELIMITER $$

CREATE TRIGGER hash_password_insert BEFORE
INSERT
    ON users FOR EACH ROW BEGIN
SET
    NEW.password = SHA1(CONCAT(MD5(NEW.password), NEW.salt));

END $$
DELIMITER;

-- Хеширование пароля пользователя при его обновлении
DELIMITER $$

CREATE TRIGGER hash_password_update BEFORE
UPDATE
    ON users FOR EACH ROW BEGIN IF NEW.password != OLD.password THEN
SET
    NEW.password = SHA1(CONCAT(MD5(NEW.password), NEW.salt));

END IF;

END $$
DELIMITER;

-- Создание триггера для автоматического заполнения истории изменения цены
DELIMITER $$

CREATE TRIGGER before_product_price_update
BEFORE UPDATE ON products
FOR EACH ROW
BEGIN
    -- Проверка, изменилось ли значение цены
    IF NEW.price != OLD.price THEN
        -- Вставка записи в таблицу истории изменения цены
        INSERT INTO product_price_history (product_id, old_price, new_price, changed_at)
        VALUES (OLD.product_id, OLD.price, NEW.price, CURRENT_TIMESTAMP);
    END IF;
END $$

DELIMITER ;

-- Триггер для проверки срока действия купона
DELIMITER $$
CREATE TRIGGER check_coupon_validity
BEFORE INSERT ON orders
FOR EACH ROW
BEGIN
    DECLARE coupon_valid INT;
    -- Проверяем, существует ли купон и не истек ли его срок
    SELECT COUNT(*) INTO coupon_valid
    FROM coupons
    WHERE code = NEW.coupon_code
    AND expiration_date >= CURRENT_DATE;
    
    -- Если купон недействителен, генерируем ошибку
    IF coupon_valid = 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Купон недействителен или срок его действия истек.';
    END IF;
END $$
DELIMITER ;


-- Триггер для обновления уровня запасов при создании заказа
DELIMITER $$
CREATE TRIGGER update_stock_on_order
AFTER INSERT ON order_details
FOR EACH ROW
BEGIN
    UPDATE products
    SET stock_quantity = stock_quantity - NEW.quantity
    WHERE product_id = NEW.product_id;
END $$
DELIMITER ;


-- Триггер для обновления среднего рейтинга продукта
DELIMITER $$
CREATE TRIGGER update_product_rating
AFTER INSERT ON reviews
FOR EACH ROW
BEGIN
    DECLARE avg_rating DECIMAL(3, 2);
    SELECT AVG(rating) INTO avg_rating
    FROM reviews
    WHERE product_id = NEW.product_id;
    
    UPDATE products
    SET average_rating = avg_rating
    WHERE product_id = NEW.product_id;
END $$
DELIMITER ;


-- Триггер для проверки отрицательных значений в заказе
DELIMITER $$
CREATE TRIGGER check_negative_quantity
BEFORE INSERT ON order_details
FOR EACH ROW
BEGIN
    IF NEW.quantity < 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Количество товара не может быть отрицательным.';
    END IF;
END $$
DELIMITER ;


-- Событие для удаления старых сессий
DELIMITER $$
CREATE EVENT delete_old_sessions
ON SCHEDULE EVERY 1 DAY
DO
BEGIN
    DELETE FROM user_sessions
    WHERE last_accessed_at < NOW() - INTERVAL 30 DAY;
END $$
DELIMITER ;

-- Функция для получения полного имени пользователя

DELIMITER $$

CREATE FUNCTION get_full_name(user_id INT) 
RETURNS VARCHAR(64)
DETERMINISTIC
BEGIN
    DECLARE full_name VARCHAR(64);
    SELECT CONCAT(first_name, ' ', last_name) INTO full_name
    FROM users
    WHERE user_id = user_id;
    RETURN full_name;
END $$
DELIMITER ;


-- Функция для вычисления общего числа заказов клиента
DELIMITER $$

CREATE FUNCTION get_customer_order_count(customer_id INT) 
RETURNS INT
DETERMINISTIC
BEGIN
    DECLARE order_count INT;
    SELECT COUNT(*) INTO order_count
    FROM orders
    WHERE customer_id = customer_id;
    RETURN order_count;
END $$

DELIMITER ;



-- Функция для получения списка товаров по тегу
DELIMITER $$

CREATE PROCEDURE get_products_by_tag(IN tag_name VARCHAR(64))
BEGIN
    SELECT p.product_id, p.product_name
    FROM products p
    JOIN product_tags pt ON p.product_id = pt.product_id
    JOIN tags t ON pt.tag_id = t.tag_id
    WHERE t.tag_name = tag_name;
END $$

DELIMITER ;
