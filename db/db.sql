Create database if not exists db_MMS;
use db_MMS;
set autocommit = false;

CREATE TABLE Admin (    
    admin_name VARCHAR(40) NOT NULL,
    admin_username VARCHAR(40) NOT NULL,
    admin_password VARCHAR(40) NOT NULL, 
    admin_status CHAR(1) NOT NULL, 
    admin_type VARCHAR(20) NOT NULL,

    PRIMARY KEY(admin_username)
);

CREATE TABLE Member (
    member_id VARCHAR(10) NOT NULL,
    member_chi_name VARCHAR(30) NOT NULL,                                                                         
    member_eng_name VARCHAR(30) NOT NULL,
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
    member_status VARCHAR(10) NOT NULL,
    PRIMARY KEY (member_id)
);

CREATE TABLE Tablet(
    tablet_id varchar(10) NOT NULL,
    inst_date date DEFAULT NULL,
    tablet_zone varchar(10) DEFAULT NULL,
    tablet_tier varchar(10) DEFAULT NULL, 
    tablet_row varchar(10) DEFAULT NULL,
    price double(10,2) DEFAULT NULL,
    ancestor_eng_name varchar(30) DEFAULT NULL,
    ancestor_chi_name varchar(10) DEFAULT NULL,
    contact_num1 varchar(20) DEFAULT NULL, 
    contact_num2 varchar(20) DEFAULT NULL,
    address varchar(100) NOT NULL,
    member_eng_name VARCHAR(30) NOT NULL,    
    member_chi_name VARCHAR(10) NOT NULL,
    payment_type varchar(20) NOT NULL,
    remarks varchar(200) DEFAULT NULL,

    PRIMARY KEY(tablet_id)  
);

CREATE TABLE BLantern(
    BLantern_id varchar(10) NOT NULL,
    member_eng_name VARCHAR(30) NOT NULL,    
    member_chi_name VARCHAR(10) NOT NULL,
    contact_num VARCHAR(20) NOT NULL, 
    blessing_price double(10,2) NOT NULL,
    votive_price double(10,2) NOT NULL,    
    breceipt_num VARCHAR(10) NOT NULL,        
    vreceipt_num VARCHAR(10) NOT NULL,
    receipt_date date NOT NULL,        
    price double(10,2) NOT NULL,    
    remarks varchar(200) DEFAULT NULL,    
    username VARCHAR(20) NOT NULL,

    PRIMARY KEY(BLantern_id)  
);

CREATE TABLE GLight(
    GLight_id VARCHAR(20) NOT NULL,        
    member_eng_name VARCHAR(30) NOT NULL,    
    member_chi_name VARCHAR(30) NOT NULL,
    price DOUBLE(10,2) NOT NULL,    
    contact_num VARCHAR(20) NOT NULL,
    remarks VARCHAR(200),

    PRIMARY KEY(GLight_id)  
);

CREATE TABLE Tablet_Receipt (
    Tablet_id VARCHAR(10) NOT NULL,
    receipt_num VARCHAR(10) NOT NULL,    
    receipt_date DATE NOT NULL, 
    receipt_amount DOUBLE(10,2) NOT NULL,
    member_eng_name VARCHAR(30) NOT NULL,    
    member_chi_name VARCHAR(30) NOT NULL,
    remarks VARCHAR(200),
    username VARCHAR(20),    
    recordedOn DATETIME,

    PRIMARY KEY(Tablet_id, receipt_num,receipt_date),
        FOREIGN KEY (Tablet_id) REFERENCES Tablet(Tablet_id)
);

CREATE TABLE GLight_Receipt (
    GLight_id VARCHAR(10) NOT NULL,
    receipt_num VARCHAR(10) NOT NULL,    
    receipt_date DATE NOT NULL, 
    receipt_amount DOUBLE(10,2) NOT NULL,
    username VARCHAR(20) NOT NULL,

    PRIMARY KEY(GLight_id, receipt_num,receipt_date),
        FOREIGN KEY (GLight_id) REFERENCES GLight(GLight_id)
);

 CREATE TABLE Reminder (
    reminder_id INT(10) NOT NULL AUTO_INCREMENT,
    reminder_date DATE NOT NULL, 
    title VARCHAR(50),   
    remarks VARCHAR(200),   

    PRIMARY KEY(Reminder_id)    
);

  CREATE TABLE Product (
    product_id varchar(10) NOT NULL,
    product_status VARCHAR(12) NOT NULL, 
    product_eng_name VARCHAR(40) NOT NULL,
    product_chi_name VARCHAR(40) NOT NULL,
    unit_price double(10,2) DEFAULT NULL,
    remarks VARCHAR(200), 
    recordedBy VARCHAR(30),    
    recordedOn DATETIME,
  

    PRIMARY KEY(product_id)
    
);

 CREATE TABLE Stock (
	product_id VARCHAR(30) NOT NULL,
	stock_date DATE NOT NULL,
	stock_summary VARCHAR(200),
	receipt_no VARCHAR(10) NOT NULL,
	stock_in INT(10) NOT NULL,
	stock_out INT(10) NOT NULL,
	balance_left DOUBLE(10,2) NOT NULL,
	remarks VARCHAR(200),    
	recordedBy VARCHAR(30),    
    	recordedOn DATETIME,


    PRIMARY KEY(receipt_no)   
);

INSERT INTO Admin(admin_name, admin_username, admin_password, admin_status, admin_type) VALUES ('admin', 'admin',md5('admin'), 'T', 'admin');

commit;
