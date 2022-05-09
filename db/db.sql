Create database if not exists db_MMS;
use db_MMS;
set autocommit = false;

CREATE TABLE Admin (
    admin_username VARCHAR(20) NOT NULL,
    admin_password VARCHAR(20) NOT NULL, 
    admin_status CHAR(1) NOT NULL, 
    admin_type VARCHAR(10) NOT NULL,

    PRIMARY KEY(admin_username)
);

CREATE TABLE Member (
    member_id VARCHAR(10) NOT NULL,
    member_name VARCHAR(30) NOT NULL,
    member_ic VARCHAR(14) NOT NULL ,
    member_gender VARCHAR(6) NOT NULL ,
    member_dob Date NOT NULL ,
    member_tel VARCHAR(20) NOT NULL ,
    member_address VARCHAR(100) NOT NULL,
    recommender_name VARCHAR(30) NOT NULL,
    accept_date Date NOT NULL,
    member_citizenship VARCHAR(20) NOT NULL,
    member_job VARCHAR(15) NOT NULL,
    recommender_id VARCHAR(4) NOT NULL,
    member_type VARCHAR(10) NOT NULL,
    remarks VARCHAR(40),
    admin_username VARCHAR(20) NOT NULL,
    UpdatedOn DATETIME NOT NULL,  
    PRIMARY KEY (member_id)
);

CREATE TABLE GLight(
    GLight_id VARCHAR(20) NOT NULL,        
    member_id VARCHAR(10) NOT NULL,
    price DOUBLE(8,2) NOT NULL,    
    contact_num INT(12) NOT NULL,
    remarks VARCHAR(200),
    createdOnDateTime DATETIME NOT NULL,

    PRIMARY KEY(GLight_id)  
);

 CREATE TABLE GLight_Receipt (
    GLight_id VARCHAR(10) NOT NULL,
    receipt_num INT(8) NOT NULL,    
    receipt_date DATE NOT NULL, 
    receipt_amount DOUBLE(10,2) NOT NULL,
    remarks VARCHAR(200),   
    member_id VARCHAR(10) NOT NULL, 
    username VARCHAR(20) NOT NULL,

    PRIMARY KEY(GLight_id, receipt_num,receipt_date, username),
        FOREIGN KEY (GLight_id) REFERENCES GLight(GLight_id),         
        FOREIGN KEY (username) REFERENCES Admin(admin_username)    
);

ALTER TABLE Member
ADD member_age INT(3) NOT NULL;
INSERT INTO Admin(admin_username, admin_password, admin_status) VALUES ('admin','admin', 'T');

commit;

 
