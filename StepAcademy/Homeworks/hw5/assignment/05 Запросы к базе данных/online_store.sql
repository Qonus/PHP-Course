INSERT INTO categories (category_name, parent_category_id) VALUES ("Electronics", NULL);
INSERT INTO categories (category_name, parent_category_id) VALUES ("Laptops", 1);

-- Основные категории
INSERT INTO categories (category_name, parent_category_id) VALUES ("Software", NULL); -- ID 3
INSERT INTO categories (category_name, parent_category_id) VALUES ("Games", NULL); -- ID 4

-- Подкатегории для "Electronics"
INSERT INTO categories (category_name, parent_category_id) VALUES ("Smartphones", 1); -- ID 5
INSERT INTO categories (category_name, parent_category_id) VALUES ("Tablets", 1); -- ID 6
INSERT INTO categories (category_name, parent_category_id) VALUES ("Cameras", 1); -- ID 7
INSERT INTO categories (category_name, parent_category_id) VALUES ("Accessories", 1); -- ID 8

-- Подкатегории для "Software"
INSERT INTO categories (category_name, parent_category_id) VALUES ("Operating Systems", 3); -- ID 9
INSERT INTO categories (category_name, parent_category_id) VALUES ("Office Software", 3); -- ID 10

-- Подкатегории для "Games"
INSERT INTO categories (category_name, parent_category_id) VALUES ("PC Games", 4); -- ID 11
INSERT INTO categories (category_name, parent_category_id) VALUES ("Console Games", 4); -- ID 12
INSERT INTO categories (category_name, parent_category_id) VALUES ("Mobile Games", 4); -- ID 13

SELECT * FROM categories WHERE parent_category_id IS NULL;
SELECT COUNT(*) FROM categories WHERE parent_category_id IS NOT NULL;
UPDATE categories SET category_name = "Phones" WHERE category_id = 5;
DELETE FROM categories WHERE category_id = 13;