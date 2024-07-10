-- Создание базы данных с именем online_store
CREATE DATABASE online_store;

-- Выбор базы данных online_store для дальнейшей работы
USE online_store;

-- Создание таблицы пользователей
CREATE TABLE users (
    -- Уникальный идентификатор пользователя, автоматически увеличивается с каждым новым пользователем
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    -- Тип пользователя: Администратор, Клиент или Менеджер; по умолчанию «Клиент»
    user_type ENUM("Administrator", "Customer", "Manager") NOT NULL DEFAULT "Customer",
    -- Имя пользователя (не более 32 символов); обязательное поле
    first_name VARCHAR(32) NOT NULL,
    -- Фамилия пользователя (не более 32 символов); обязательное поле
    last_name VARCHAR(32) NOT NULL,
    -- Адрес электронной почты пользователя (не более 64 символов); уникален и должен содержать «@» и «.» 
    email VARCHAR(64) UNIQUE NOT NULL CHECK (email LIKE "%@%.%"),
    -- Номер телефона пользователя (не более 20 символов); может быть пустым
    phone VARCHAR(20) UNIQUE DEFAULT NULL,
    -- Хэш пароля пользователя (не более 256 символов); обязательное поле
    password VARCHAR(256) NOT NULL,
    -- Соль для хэширования пароля (32 символа); обязательное поле
    salt CHAR(32) NOT NULL,
    -- Дата и время создания записи; по умолчанию текущее время
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    -- Дата и время последнего обновления записи; обновляется автоматически при изменении записи
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Создание таблицы клиентов
CREATE TABLE customers (
    -- Идентификатор пользователя, который является клиентом; это же поле является первичным ключом
    user_id INT PRIMARY KEY,
    -- Устанавливаем внешнюю связь с таблицей пользователей, указывая, что поле user_id связано с user_id в таблице users
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Создание таблицы адресов
CREATE TABLE addresses (
    -- Уникальный идентификатор адреса, автоматически увеличивается с каждым новым адресом
    address_id INT AUTO_INCREMENT PRIMARY KEY,
    -- Метка для адреса (например, «Дом», «Офис»); может быть пустым
    address_label VARCHAR(16) DEFAULT NULL,
    -- Идентификатор клиента, которому принадлежит этот адрес; обязательное поле
    customer_id INT NOT NULL,
    -- Основная строка адреса (например, улица и номер дома); обязательное поле
    address_line1 VARCHAR(256) NOT NULL,
    -- Дополнительная строка адреса (например, квартира); может быть пустым
    address_line2 VARCHAR(256) DEFAULT NULL,
    -- Город; обязательное поле
    city VARCHAR(32) NOT NULL,
    -- Штат или область; может быть пустым
    state VARCHAR(32) DEFAULT NULL,
    -- Почтовый индекс; обязательное поле
    postal_code VARCHAR(16) NOT NULL,
    -- Страна; обязательное поле
    country VARCHAR(32) NOT NULL,
    -- Комментарий к адресу; может быть пустым
    address_comment TEXT DEFAULT NULL,
    -- Устанавливаем внешнюю связь с таблицей клиентов, указывая, что поле customer_id связано с user_id в таблице customers
    FOREIGN KEY (customer_id) REFERENCES customers(user_id) ON DELETE CASCADE
);

-- Добавление столбца для хранения идентификатора основного адреса в таблицу клиентов; может быть пустым
ALTER TABLE customers ADD COLUMN default_address_id INT DEFAULT NULL;

-- Устанавливаем внешнюю связь для нового столбца, указывая, что default_address_id связан с address_id в таблице addresses
ALTER TABLE customers ADD FOREIGN KEY (default_address_id) REFERENCES addresses(address_id);

-- Создание таблицы менеджеров
CREATE TABLE managers (
    -- Идентификатор пользователя, который является менеджером; это же поле является первичным ключом
    user_id INT PRIMARY KEY,
    -- Идентификационный номер менеджера (12 символов); уникален и обязательное поле
    iin CHAR(12) UNIQUE NOT NULL,
    -- Дата рождения менеджера; обязательное поле
    birthday DATE NOT NULL,
    -- Статус менеджера (Активен или Неактивен); по умолчанию «Активен»
    status ENUM("Active", "Inactive") DEFAULT "Active",
    -- Устанавливаем внешнюю связь с таблицей пользователей, указывая, что поле user_id связано с user_id в таблице users
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);
