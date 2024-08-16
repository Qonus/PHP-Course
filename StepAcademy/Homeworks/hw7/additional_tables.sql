CREATE TABLE brands (
    brand_id INT AUTO_INCREMENT PRIMARY KEY,
    brand_name VARCHAR(64) NOT NULL,
);

CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(64) NOT NULL,
    parent_category_id INT DEFAULT NULL
);

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(64) NOT NULL,
    description TEXT NOT NULL,
    brand_id INT NOT NULL,
    category_id INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock_quantity INT NOT NULL,

    age_range VARCHAR(32) NOT NULL,
    player_number VARCHAR(32) NOT NULL,
    weight DECIMAL(5, 2) NOT NULL,
    dimensions VARCHAR(32) NOT NULL,
    release_date DATE NOT NULL,
    FOREIGN KEY (brand_id) REFERENCES brands(brand_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id),
);

CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM('Pending', 'Shipped', 'Delivered', 'Canceled') DEFAULT 'Pending',
    total_amount DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES customers(user_id)
);

CREATE TABLE order_details (
    order_derail_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    unit_price DECIMAL(10, 2) NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);



CREATE TABLE product_photos (
    photo_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    image_url VARCHAR(256) NOT NULL,
    is_primary BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE discounts (
    discount_id INT AUTO_INCREMENT PRIMARY KEY,
    discount_code VARCHAR(32) UNIQUE,
    discount_type ENUM('Percentage', 'Fixed Amount') NOT NULL,
    discount_value DECIMAL(10, 2) NOT NULL,
    start_date DATETIME NOT NULL,
    end_date DATETIME NOT NULL,
    min_purchase_amount DECIMAL(10, 2) DEFAULT 0,
    max_usage INT DEFAULT NULL,
    is_active BOOLEAN DEFAULT TRUE
);

CREATE TABLE delivery_methods (
    delivery_method_id INT AUTO_INCREMENT PRIMARY KEY,
    method_name VARCHAR(64) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    estimated_delivery_time VARCHAR(32),
    is_active BOOLEAN DEFAULT TRUE
);