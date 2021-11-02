CREATE DATABASE bdSeedsShop CHARACTER SET utf8;
USE bdSeedsShop;

CREATE TABLE users (
    id int NOT NULL AUTO_INCREMENT,
    uName varchar(30) NOT NULL,
    uPassword varchar(30) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE products (
    id int NOT NULL AUTO_INCREMENT,
    pName varchar(30) NOT NULL,
    pDescription varchar(200),
    price int,
    origin varchar(30) NOT NULL,
    img varchar(30) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO products (pName, pDescription, price, origin, img)
VALUES ('watermelon seeds', 'Perfect for summer!', 10, 'Spain', 'watermelonSeeds.png'),
    ('Tomatoes seeds', 'Great for a tomatoes sauce!', 20, 'China', 'tomatoesSeeds.png'),
    ('Pumpkin seeds', 'Important for Halloween!', 15, 'New Zealand', 'pumpkinSeeds.png');