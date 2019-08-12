-- the name of the database for admin is fundraiser

CREATE TABLE adminlogin (
    admin_id int(11) AUTO_INCREMENT PRIMARY KEY not null,
    admin_username varchar(255) not null,
    admin_password varchar(255) not null
);

INSERT INTO adminlogin(admin_username, admin_password) VALUES('admin','admin');
