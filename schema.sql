
CREATE DATABASE Hireme;
USE Hireme;

CREATE TABLE Users(
    id int(6) unsigned auto_increment primary key,
    FirstName varchar(100),
    LastName varchar(100),
    password varchar(255),
    telephone varchar(100),
    email varchar(100),
    date_joined timestamp 
);

CREATE TABLE Jobs(
    id int(6) unsigned auto_increment primary key,
    job_title varchar(20),
    job_description varchar(255),
    category varchar(30),
    company_name varchar(30),
    company_location varchar(50),
    date_posted timestamp
);

CREATE TABLE Jobs Applied For(
    id int(6) unsigned auto_increment primary key,
    job_id varchar(20),
    user_id varchar(20),
    date_applied timestamp
);

/*SELECT HASHBYTES('SHA1', 'password123');*/

INSERT INTO Users (FirstName, LastName, password, telephone, email)
VALUES ("Admin", "Administrator","HASHBYTES("SHA1", "password123")", "876-999-9999", "admin@hireme.com");