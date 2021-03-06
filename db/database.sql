{\rtf1\ansi\ansicpg1252\deff0\nouicompat\deflang1033{\fonttbl{\f0\fnil\fcharset0 Courier New;}}
{\*\generator Riched20 10.0.22000}\viewkind4\uc1 
\pard\sa200\sl276\slmult1\f0\fs22 Create database if not exists db_MMS;\par
use db_MMS;\par
set autocommit = false;\par
CREATE TABLE Admin (\par
    admin_username VARCHAR(20) NOT NULL,\par
    admin_password VARCHAR(20) NOT NULL, \par
\par
    PRIMARY KEY(admin_username)\par
);\par
\par
CREATE TABLE Member (\par
    member_id VARCHAR(10) NOT NULL,\par
    member_name VARCHAR(30) NOT NULL,\par
    member_ic INT(14) NOT NULL ,\par
    member_gender VARCHAR(6) NOT NULL ,\par
    member_dob Date NOT NULL ,\par
    member_tel Int(12) NOT NULL ,\par
    member_address VARCHAR(100) NOT NULL,\par
    recommender_name VARCHAR(30) NOT NULL,\par
    accept_date Date NOT NULL,\par
    member_citizenship INT(15) NOT NULL,\par
    member_job VARCHAR(15) NOT NULL,\par
    recommender_id VARCHAR(4) NOT NULL,\par
    member_type VARCHAR(10) NOT NULL,\par
    remarks VARCHAR(40),\par
\par
    PRIMARY KEY (member_id)\par
);\par
\par
\par
CREATE TABLE Tablet (\par
    tablet_id INT(10) NOT NULL,\par
    inst_date DATE NOT NULL,\par
    ancestor_name VARCHAR(20) NOT NULL ,\par
    payment_type VARCHAR(20) NOT NULL ,\par
    receipt_num INT(10) NOT NULL ,\par
    contact_num1 INT(12) NOT NULL,\par
    contact_num2 INT(12) NOT NULL,\par
    remarks VARCHAR(200),\par
    tablet_zone VARCHAR(10) NOT NULL,\par
    tablet_tier VARCHAR(10) NOT NULL,   \par
    tablet_row VARCHAR(10) NOT NULL,\par
    price Double(10,2) NOT NULL,\par
    address VARCHAR(100) NOT NULL,\par
    \par
    PRIMARY KEY(tablet_id) \par
);\par
\par
CREATE TABLE BLantern (\par
    BLantern_id INT(10) NOT NULL,\par
    contact_num INT(12) NOT NULL,\par
    blessing_price double(10,2) NOT NULL,       \par
    votive_price double(10,2) NOT NULL,\par
    remarks VARCHAR(200),\par
    \par
    PRIMARY KEY(BLantern_id)\par
);\par
\par
CREATE TABLE GLantern(\par
    GLantern_id INT(10) NOT NULL,       \par
    contact_num INT(12) NOT NULL,\par
    remarks VARCHAR(200),\par
    receipt_num INT(8) NOT NULL,\par
    receipt_date DATE NOT NULL,\par
\par
    PRIMARY KEY(GLantern_id)\par
\par
);\par
\par
\par
CREATE TABLE Product (\par
    product_id VARCHAR(10) NOT NULL,\par
        product_name VARCHAR(20) NOT NULL,\par
        product_price Double(10,2) NOT NULL ,\par
        product_description VARCHAR(200),\par
\par
    PRIMARY KEY(product_id)\par
);\par
\par
CREATE TABLE Membership(\par
    member_id VARCHAR(10) NOT NULL,\par
    username VARCHAR(20) NOT NULL,\par
    PRIMARY KEY (member_id, username),\par
        FOREIGN KEY (username) REFERENCES Admin(admin_username),\par
        FOREIGN KEY (member_id) REFERENCES Member(member_id)\par
\par
);\par
\par
CREATE TABLE Manage(\par
    username VARCHAR(20) NOT NULL,\par
    product_id VARCHAR(10) NOT NULL,\par
    receipt_num VARCHAR(20),     \par
    UpdatedOn DATETIME NOT NULL,  \par
    PRIMARY KEY (username, product_id),\par
        FOREIGN KEY (username) REFERENCES Admin(admin_username),        \par
        FOREIGN KEY (product_id) REFERENCES Product(product_id)\par
);\par
\par
CREATE TABLE Stock(\par
    receipt_num VARCHAR(20) NOT NULL,\par
    stock_date DATE NOT NULL,\par
    stock_amount DOUBLE(10,2) NOT NULL, \par
    stock_balance DOUBLE(10,2) NOT NULL, \par
    stock_remark VARCHAR(200),\par
    product_id VARCHAR(10) NOT NULL,\par
\par
    PRIMARY KEY(receipt_num, product_id),    \par
        FOREIGN KEY (product_id) REFERENCES Manage(product_id)\par
);\par
\par
CREATE TABLE Booking(  \par
    member_id VARCHAR(10) NOT NULL,\par
    book_date DATE NOT NULL,\par
    tablet_id INT(10),\par
    BLantern_id INT(10),    \par
    GLantern_id INT(10),\par
\par
    PRIMARY KEY(member_id),\par
        FOREIGN KEY (member_id) REFERENCES Member(member_id),\par
        FOREIGN KEY (tablet_id) REFERENCES Tablet(tablet_id),\par
        FOREIGN KEY (BLantern_id) REFERENCES BLantern(BLantern_id),\par
        FOREIGN KEY (GLantern_id) REFERENCES GLantern(GLantern_id)     \par
\par
);\par
\par
CREATE TABLE Tablet_Receipt(\par
    receipt_num VARCHAR(10) NOT NULL,\par
    receipt_date DATE NOT NULL,\par
    receipt_amount DOUBLE(10,2) NOT NULL,\par
    remarks VARCHAR(200),\par
    member_id VARCHAR(10) NOT NULL,\par
    tablet_id INT(10) NOT NULL,\par
    username VARCHAR(20) NOT NULL,\par
\par
    PRIMARY KEY(receipt_num, receipt_date, member_id, username),        \par
        FOREIGN KEY (tablet_id) REFERENCES Tablet(tablet_id),        \par
        FOREIGN KEY (member_id) REFERENCES Member(member_id),\par
        FOREIGN KEY (username) REFERENCES Admin(admin_username)    \par
\par
);\par
\par
CREATE TABLE BLantern_Receipt (\par
    BLantern_id INT(10) NOT NULL,\par
    B_receipt_num VARCHAR(8) NOT NULL,\par
    V_receipt_num VARCHAR(8) NOT NULL,  \par
    receipt_date DATE NOT NULL, \par
    receipt_amount DOUBLE(10,2) NOT NULL,\par
    remarks VARCHAR(200),   \par
    member_id VARCHAR(10) NOT NULL, \par
    username VARCHAR(20) NOT NULL,\par
\par
    \par
    PRIMARY KEY(BLantern_id, B_receipt_num, V_receipt_num,receipt_date, username),\par
        FOREIGN KEY (BLantern_id) REFERENCES BLantern(BLantern_id),         \par
        FOREIGN KEY (username ) REFERENCES Admin(admin_username)    \par
);\par
 \par
CREATE TABLE GLantern_Receipt (\par
    GLantern_id INT(10) NOT NULL,\par
    receipt_num INT(8) NOT NULL,    \par
    receipt_date DATE NOT NULL, \par
    receipt_amount DOUBLE(10,2) NOT NULL,\par
    remarks VARCHAR(200),   \par
    member_id VARCHAR(10) NOT NULL, \par
    username VARCHAR(20) NOT NULL,\par
\par
    \par
    PRIMARY KEY(GLantern_id, receipt_num,receipt_date, username),\par
        FOREIGN KEY (GLantern_id) REFERENCES GLantern(GLantern_id),         \par
        FOREIGN KEY (username ) REFERENCES Admin(admin_username)    \par
);\par
\par
ALTER TABLE Member\par
ADD member_age INT(3) NOT NULL;\par
\par
commit;\par
}
 