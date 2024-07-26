CREATE TABLE users (
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(64) NOT NULL,
    phone VARCHAR(15) ,
    created_at DATETIME NOT NULL DEFAULT NOW(),
    PRIMARY KEY(id)
);

CREATE TABLE product (
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    `image` VARCHAR(255) ,
    describtion TEXT NOT NULL,
    sizee INTEGER NOT NULL,
    user_id INTEGER UNSIGNED NOT NULL,
    created_at DATETIME NOT NULL DEFAULT NOW(),
    PRIMARY KEY(id),
    FOREIGN KEY(user_id) REFERENCES users(id) on update cascade on delete cascade
);

INSERT INTO users (name, email, password,phone) 
VALUES ('user1', 'user1@gmail.com', '$2y$10$Etzw3W594D27kuNjGRkXruHxB8gA3f3IapbXRCvVrqXhbL8UIeC0q',"01025874685");

INSERT INTO product (title, user_id,`image`, describtion, sizee) 
VALUES 
('adidas', 1,'f1.jpg', 'Cartoon Astronaut T-Shirt', '78'),
('adidas', 1,'f2.jpg', 'Cartoon Astronaut T-Shirt', '78'),
('adidas', 1,'f3.jpg', 'Cartoon Astronaut T-Shirt', '78'),
('adidas', 1,'f4.jpg', 'Cartoon Astronaut T-Shirt', '78'),
('adidas', 1,'f5.jpg', 'Cartoon Astronaut T-Shirt', '78'),
('adidas', 1,'f6.jpg', 'Cartoon Astronaut T-Shirt', '78'),
('adidas', 1,'f7.jpg', 'Cartoon Astronaut T-Shirt', '78'),
('adidas', 1,'f8.jpg', 'Cartoon Astronaut T-Shirt', '78'),
('adidas', 1,'n1.jpg', 'Cartoon Astronaut T-Shirt', '78'),
('adidas', 1,'n2.jpg', 'Cartoon Astronaut T-Shirt', '78'),
('adidas', 1,'n3.jpg', 'Cartoon Astronaut T-Shirt', '78'),
('adidas', 1,'n4.jpg', 'Cartoon Astronaut T-Shirt', '78'),
('adidas', 1,'n5.jpg', 'Cartoon Astronaut T-Shirt', '78'),
('adidas', 1,'n6.jpg', 'Cartoon Astronaut T-Shirt', '78'),
('adidas', 1,'n7.jpg', 'Cartoon Astronaut T-Shirt', '78'),
('adidas', 1,'n8.jpg', 'Cartoon Astronaut T-Shirt', '78');
AlTER TABLE users ADD addres VARCHAR(300);









CREATE TABLE cart (
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    user_id INTEGER UNSIGNED NOT NULL,
    product_id INTEGER UNSIGNED NOT NULL,
    quantity INTEGER NOT NULL DEFAULT 1,
    added_at DATETIME NOT NULL DEFAULT NOW(),
    PRIMARY KEY(id),
    FOREIGN KEY(user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY(product_id) REFERENCES product(id) ON UPDATE CASCADE ON DELETE CASCADE
);


