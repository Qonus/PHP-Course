INSERT INTO users (user_type, first_name, last_name, email, phone, password, salt)
VALUES
    ('Customer', 'Tony', 'Stark', 'ironman@avengers.com', '123-456-7890', '1r0nM4n$tr0ng', 'saltyIron'),
    ('Customer', 'Bruce', 'Wayne', 'batman@gotham.com', '987-654-3210', 'B4tC@v3', 'saltyBat'),
    ('Manager', 'Michael', 'Scott', 'michael@dundermifflin.com', '555-123-4567', 'W0rld$B3stB0ss', 'saltyWorld'),
    ('Manager', 'Dwight', 'Schrute', 'dwight@dundermifflin.com', '555-987-6543', 'B3etsB34RS', 'saltyBeets'),
    ('Administrator', 'Leslie', 'Knope', 'leslie@pawnee.gov', NULL, 'P4wnee4Ever', 'saltyWaffles');

INSERT INTO customers (user_id)
VALUES
    (1),
    (2);

INSERT INTO addresses (address_label, customer_id, address_line1, city, state, postal_code, country, address_comment)
VALUES
    ('Home', 1, '10880 Malibu Point', 'Malibu', 'CA', '90265', 'USA', 'Stark Industries HQ'),
    ('Batcave', 2, '1007 Mountain Drive', 'Gotham', 'NJ', '08030', 'USA', 'Wayne Manor');

INSERT INTO managers (user_id, iin, birthday)
VALUES
    (3, '123456789012', '1964-03-25'),
    (4, '987654321098', '1976-01-20');

INSERT INTO categories (category_name)
VALUES
    ('Electronics'),
    ('Clothing'),
    ('Books'),
    ('Toys'),
    ('Home & Garden');

INSERT INTO products (product_name, category_id, price, stock_quantity)
VALUES
    ('Arc Reactor', 1, 999.99, 10),
    ('Batarang', 4, 199.99, 20),
    ('Schrute Farms Beets', 5, 9.99, 50),
    ('Waffles', 5, 5.00, 100),
    ('Pawnee: The Greatest Town in America', 3, 19.99, 30);