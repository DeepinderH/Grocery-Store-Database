CREATE DATABASE IF NOT EXISTS `DB`;
USE `DB`;


CREATE TABLE IF NOT EXISTS Supplier (
    
    supplier_id int NOT NULL,
    name varchar(255),
    city varchar(255),
    address varchar(255),
    postal_code varchar(255),
    PRIMARY KEY (supplier_id)

);

CREATE TABLE IF NOT EXISTS Logistics_Company(
    ID int NOT NULL,
    name varchar(255),
    PRIMARY KEY (ID)
);

CREATE TABLE IF NOT EXISTS Cleaning_Company(

    company_id int NOT NULL,
    name varchar(255),
    PRIMARY KEY (company_id)
);

CREATE TABLE IF NOT EXISTS Accountant  (

    company_id int NOT NULL,
    name varchar(255),
    PRIMARY KEY (company_id)
);

CREATE TABLE IF NOT EXISTS Schedule (

    `year` int NOT NULL,
    `month` varchar(256) NOT NULL,
    PRIMARY KEY (`year`, `month`)

);

CREATE TABLE IF NOT EXISTS Store (

    store_id int NOT NULL,
    postal_code varchar(255),
    city varchar(255),
    address varchar(255),
    cleaning_id int,
    accountant_id int, 
    date_of_cleaning varchar (255),
    hours_of_cleaning int,
    PRIMARY KEY (store_id),
    FOREIGN KEY (cleaning_id) REFERENCES Cleaning_Company (company_id) ON DELETE CASCADE,
    FOREIGN KEY (accountant_id) REFERENCES Accountant (company_id) ON DELETE CASCADE

);

CREATE TABLE IF NOT EXISTS Users (

    ID  int NOT NULL,
    first_name varchar(255),
    last_name varchar(255),
    sex varchar(255),
    postal_code varchar(255),
    city    varchar(255),
    province varchar(255),
    street_name varchar(255),
    email   varchar(255),
    date_of_birth varchar(255),
    store_id int,
    PRIMARY KEY (ID),
    FOREIGN KEY (store_id) REFERENCES Store (store_id) ON DELETE CASCADE

); 

CREATE TABLE IF NOT EXISTS Department (
	department_ID int,
    name varchar(255) NOT NULL,
    store_id int NOT NULL,
    manager_id int,
    PRIMARY KEY (department_ID),
    FOREIGN KEY (store_id) REFERENCES Store (store_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Category (
	category varchar(256) NOT NULL,
    PRIMARY KEY(category)
); 

CREATE TABLE IF NOT EXISTS Product  (
    product_id int NOT NULL,
    department_ID int,
    store_id int,
    price varchar(255),
    name varchar(255),
	category varchar(255),
    PRIMARY KEY (product_id),
    FOREIGN KEY (department_ID) REFERENCES Department (department_ID) ON DELETE CASCADE,
    FOREIGN KEY (store_id) REFERENCES Store (store_id) ON DELETE CASCADE,
	FOREIGN KEY (category) REFERENCES Category (category) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Inventory (
    store_id int,
    product_id int, 
	quantity int,
    FOREIGN KEY (product_id) REFERENCES Product (product_id) ON DELETE CASCADE,
    FOREIGN KEY (store_id) REFERENCES Store (store_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Transport_Via (
    supplier_id int NOT NULL,
    logistics_id int NOT NULL,
    FOREIGN KEY (supplier_id) REFERENCES Supplier (supplier_id) ON DELETE CASCADE,
    FOREIGN KEY (logistics_id) REFERENCES Logistics_Company (ID) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Shifts (
	shift_id int,
    year int,
    month varchar(256), 
    date varchar(256),
    start_time varchar(256) NOT NULL,
    end_time varchar(256) NOT NULL,
    PRIMARY KEY (shift_id),
    FOREIGN KEY (year, month) REFERENCES Schedule (year, month) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Manager (
    user_id int,
    SIN int, 
    FOREIGN KEY (user_id) REFERENCES Users (ID) ON DELETE CASCADE
); 


CREATE TABLE IF NOT EXISTS Employee (
    user_id int,
    SIN int, 
    store_id int,
    department_ID int,
    FOREIGN KEY (user_id) REFERENCES Users (ID) ON DELETE CASCADE,
    FOREIGN KEY (store_id) REFERENCES Store (store_id) ON DELETE CASCADE,
    FOREIGN KEY (department_ID) REFERENCES Department (department_ID) ON DELETE CASCADE
); 
CREATE TABLE IF NOT EXISTS Employee_Works(
    employee_id int,
    year int,
    month varchar(255),
    shift_id int,
    FOREIGN KEY (employee_id) REFERENCES Users (ID) ON DELETE CASCADE,
	FOREIGN KEY (shift_id) REFERENCES Shifts (shift_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Manager_Works (
    manager_id int,
    year int,
    month varchar(255),
	shift_id int,
    FOREIGN KEY (manager_id) REFERENCES Users (ID) ON DELETE CASCADE,
    FOREIGN KEY (year, month) REFERENCES Schedule (year, month) ON DELETE CASCADE,
    FOREIGN KEY (shift_id) REFERENCES Shifts (shift_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Delivers (
    logistics_id int,
    store_id int, 
    truck_number int,
    volume varchar(256),
    date varchar(256),
    FOREIGN KEY (logistics_id) REFERENCES Logistics_Company (ID) ON DELETE CASCADE,
    FOREIGN KEY (store_id) REFERENCES Store (store_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Supplies (
    supplier_id int,
    product_id int, 
    FOREIGN KEY (supplier_id) REFERENCES Supplier (supplier_id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES Product (product_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Buys (
    customer_id int,
    product_id int, 
    FOREIGN KEY (customer_id) REFERENCES Users (ID) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES Product (product_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Transaction_at (
    customer_id int,
    store_id int, 
    total_cost Double,
    transaction_time varchar(256),
    FOREIGN KEY (customer_id) REFERENCES Users (ID) ON DELETE CASCADE,
    FOREIGN KEY (store_id) REFERENCES Store (store_id) ON DELETE CASCADE
);


CREATE TABLE IF NOT EXISTS Items_Bought (
    customer_id int,
    product_id int, 
    items_bought varchar(256) NOT NULL,
    PRIMARY KEY (items_bought),
    FOREIGN KEY (customer_id) REFERENCES Users (ID) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES Product (product_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Phone_Number (
    user_id int,
    phone_number varchar(256) NOT NULL,
    PRIMARY KEY (phone_number),
    FOREIGN KEY (user_id) REFERENCES Users (ID) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Edible_Products (
    product_id int,
    expiration_date varchar(256),
    FOREIGN KEY (product_id) REFERENCES Product (product_id) ON DELETE CASCADE
); 

CREATE TABLE IF NOT EXISTS Refridgerated (
    product_id int,
    expiration_date varchar(256),
    FOREIGN KEY (product_id) REFERENCES Product (product_id) ON DELETE CASCADE
); 

CREATE TABLE IF NOT EXISTS Non_Refridgerated (
    product_id int,
    expiration_date varchar(256),
    FOREIGN KEY (product_id) REFERENCES Product (product_id) ON DELETE CASCADE
); 

CREATE TABLE IF NOT EXISTS Non_Edible_Products (
    product_id int,
    FOREIGN KEY (product_id) REFERENCES Product (product_id) ON DELETE CASCADE
); 

CREATE TABLE IF NOT EXISTS Customers (
    user_id int,
    points int,
    member_number int,
	FOREIGN KEY (user_id) REFERENCES Users (ID) ON DELETE CASCADE
); 

/*
	Populating the Supplier Table
*/
INSERT INTO `Supplier` VALUES (00001, 'Pepsi', 'Calgary', '1903  Shearwood Forest Drive', 'L9M 6L9');
INSERT INTO `Supplier` VALUES (00002, 'Weber', 'Calgary', '4256  Scenic Way', 'H9R 0Y3');
INSERT INTO `Supplier` VALUES (00003, 'Mid-West Supply Co', 'Edmonton', '2320  Terra Cotta Street', 'T9S 8V3');

/*
	Populating the Logistic Company Table
*/

INSERT INTO `Logistics_Company` VALUES (00001, 'Q-Line');
INSERT INTO `Logistics_Company` VALUES (00002, 'Rebel Transport');
INSERT INTO `Logistics_Company` VALUES (00003, 'TransX Ltd');

/*
	Populating the Cleaning Company Table
*/

INSERT INTO `Cleaning_Company` VALUES (00001, 'KBM Janitorial Ltd');
INSERT INTO `Cleaning_Company` VALUES (00002, 'Tonmar Janitorial Ltd');
INSERT INTO `Cleaning_Company` VALUES (00003, 'Bee Line');

/*
	Populating the Accountant Table
*/

INSERT INTO `Accountant` VALUES (00001, 'SAR Accounting & Tax Solutions');
INSERT INTO `Accountant` VALUES (00002, 'Cox & Company Certified General Accountant');
INSERT INTO `Accountant` VALUES (00003, 'Geib & Company Chartered Professional Accountants');

/*
	Populating the Schedule Table
*/

INSERT INTO `Schedule` VALUES (2020, 'April');
INSERT INTO `Schedule` VALUES (2020, 'May');
INSERT INTO `Schedule` VALUES (2020, 'June');

/*
	Populating the Store Table
*/

INSERT INTO `Store` VALUES (01, 'T1P 1Y8', 'Calgary', '793  Wilmar Farm Road', 00001, 00001, 'Every Sunday', 4);
INSERT INTO `Store` VALUES (02, 'T9E 3T9', 'Calgary', '523  Hayhurst Lane', 00002, 00002, 'Every Sunday', 4);
INSERT INTO `Store` VALUES (03, 'T9S 3R7', 'Calgary', '2648  Pride Avenue', 00003, 00003, 'Every Sunday', 4);

/*
	Populating the Department Table
*/
INSERT INTO `Department` VALUES (01, 'Customer Service', 01, 001);
INSERT INTO `Department` VALUES (02, 'Produce', 01, 002);
INSERT INTO `Department` VALUES (03, 'Health and Beauty', 01, 003);
INSERT INTO `Department` VALUES (04, 'Dairy', 01, 004);
INSERT INTO `Department` VALUES (05, 'Bakery', 01, 005);
INSERT INTO `Department` VALUES (06, 'Deli', 01, 006);
INSERT INTO `Department` VALUES (07, 'The Beer and Wine section', 01, 007);
INSERT INTO `Department` VALUES (08, 'Seafood', 01, 008);
INSERT INTO `Department` VALUES (09, 'Meat', 01, 009);
INSERT INTO `Department` VALUES (10, 'General', 01, 010);

INSERT INTO `Department` VALUES (11, 'Customer Service', 02, 001);
INSERT INTO `Department` VALUES (12, 'Produce', 02, 002);
INSERT INTO `Department` VALUES (13, 'Health and Beauty', 02, 003);
INSERT INTO `Department` VALUES (14, 'Dairy', 02, 004);
INSERT INTO `Department` VALUES (15, 'Bakery', 02, 005);
INSERT INTO `Department` VALUES (16, 'Deli', 02, 006);
INSERT INTO `Department` VALUES (17, 'The Beer and Wine section', 02, 007);
INSERT INTO `Department` VALUES (18, 'Seafood', 02, 008);
INSERT INTO `Department` VALUES (19, 'Meat', 02, 009);
INSERT INTO `Department` VALUES (20, 'General', 02, 010);

INSERT INTO `Department` VALUES (21, 'Customer Service', 03, 001);
INSERT INTO `Department` VALUES (22, 'Produce', 03, 002);
INSERT INTO `Department` VALUES (23, 'Health and Beauty', 03, 003);
INSERT INTO `Department` VALUES (24, 'Dairy', 03, 004);
INSERT INTO `Department` VALUES (25, 'Bakery', 03, 005);
INSERT INTO `Department` VALUES (26, 'Deli', 03, 006);
INSERT INTO `Department` VALUES (27, 'The Beer and Wine section', 03, 007);
INSERT INTO `Department` VALUES (28, 'Seafood', 03, 008);
INSERT INTO `Department` VALUES (29, 'Meat', 03, 009);
INSERT INTO `Department` VALUES (30, 'General', 03, 010);

/*
	Populating the Users Table
*/
INSERT INTO `Users` VALUES (00001, 'John', 'Smith', 'Male', 'T2J 3S8', 'Calgary', 'Alberta', '4469  Winding Way', 'JohnSmith@gmail.com', '1988-06-21', 01);
INSERT INTO `Users` VALUES (00002, 'Iona', 'Karme', 'Female', 'K1B 4L3', 'Calgary', 'Alberta', '4039  Derek Drive', 'IonaKarme@yahoo.com', '1992-08-11', 01);
INSERT INTO `Users` VALUES (00003, 'Gina', 'Amittai', 'Female', 'V0S 5C5', 'Calgary', 'Alberta', '313  Goldcliff Circle', 'GinaAmittai@shaw.ca', '1996-03-01', 02);
INSERT INTO `Users` VALUES (00004, 'Amritpal', 'Rush', 'Female', 'L2A 8H6', 'Calgary', 'Alberta', '2356  Munsee Street', 'AmritpalRush@yahoo.ca', '2000-11-16', 02);
INSERT INTO `Users` VALUES (00005, 'Jean', 'Hood', 'Male', 'N8A 8V5', 'Calgary', 'Alberta', '3038  St. John Street', 'JeanHood@gmail.ca', '1999-09-14', 03);
INSERT INTO `Users` VALUES (00006, 'Ari', 'Gordon', 'Male', 'P9A 3J5', 'Calgary', 'Alberta', '2929  Tanner Street', 'AriGordon@outlook.ca', '1995-12-01', 03);


/*
	Populating data for Category
*/
INSERT INTO `Category` Values('Breakfast'); 
INSERT INTO `Category` Values('Poultry'); 
INSERT INTO `Category` Values('Liquids'); 
INSERT INTO `Category` Values('Cooking'); 
INSERT INTO `Category` Values('Snacks'); 
INSERT INTO `Category` Values('Fresh'); 
INSERT INTO `Category` Values('Beef'); 
INSERT INTO `Category` Values('Pork'); 
INSERT INTO `Category` Values('Hygiene'); 
INSERT INTO `Category` Values('Kitchen'); 


/*
	Populating the Product Table
*/
INSERT INTO `Product` VALUES ( 0000000001, 09, 01, '2.99', 'Steak', 'Beef');
INSERT INTO `Product` VALUES ( 0000000002, 13 , 02, '3.99', 'Lotion', 'Hygiene');
INSERT INTO `Product` VALUES ( 0000000003, 06 , 01, '35.20', 'Ham', 'Pork');
INSERT INTO `Product` VALUES ( 0000000004, 28 , 03, '12.50', 'Squid', 'Fresh');

INSERT INTO `Product` Values(356657247, 10, 01, '5.25', 'Cereal', 'Breakfast'); 
INSERT INTO `Product` Values(341146888, 10, 01, '1.20' ,'Candy', 'Snacks'); 
INSERT INTO `Product` Values(785624889, 10, 01, '3.10' ,'Chips', 'Snacks'); 
INSERT INTO `Product` Values(984217143, 10, 01, '3.55' ,'Bread', 'Snacks'); 

INSERT INTO `Product` Values(668217887, 04, 01, '3.55' ,'Eggs', 'Poultry'); 
INSERT INTO `Product` Values(937418288, 04, 01, '3.55' ,'Milk', 'Liquids'); 
INSERT INTO `Product` Values(811275294, 04, 01, '3.55' ,'Butter', 'Cooking'); 
INSERT INTO `Product` Values(442778317, 10, 01, '3.55' ,'Pizza', 'Snacks'); 
INSERT INTO `Product` Values(383537227, 04, 01, '3.55' ,'Ice-cream', 'Snacks'); 

INSERT INTO `Product` Values(869341175, 10, 01, '3.55' ,'Q-tips', 'Hygiene'); 
INSERT INTO `Product` Values(511626416, 10, 01, '3.55' ,'Band-Aids', 'Hygiene'); 
INSERT INTO `Product` Values(667677994, 10, 01, '3.55' ,'ToothPaste', 'Hygiene'); 
INSERT INTO `Product` Values(751529434, 10, 01, '3.55' ,'TidePods', 'Hygiene'); 
INSERT INTO `Product` Values(159614836, 10, 01, '3.55' ,'Utensils', 'Kitchen'); 
INSERT INTO `Product` Values(287465133, 10, 01, '3.55' ,'Toilet Paper', 'Hygiene'); 

/*
	Populating the Inventory Table
*/
INSERT INTO `Inventory` Values(01, 668217887, 100); 
INSERT INTO `Inventory` Values(03, 511626416, 250); 
INSERT INTO `Inventory` Values(02, 442778317, 480); 
INSERT INTO `Inventory` Values(02, 287465133, 55); 
INSERT INTO `Inventory` Values(03, 811275294, 300); 
INSERT INTO `Inventory` Values(02, 984217143, 150); 
INSERT INTO `Inventory` Values(02, 356657247, 500); 

/*
	Populating the Transport Via Table
*/
INSERT INTO `Transport_Via` VALUES ( 00001, 00002);
INSERT INTO `Transport_Via` VALUES ( 00003, 00003);
INSERT INTO `Transport_Via` VALUES ( 00002, 00001);

/*
	Populating data for Shifts
*/
INSERT INTO `Shifts` Values(01, 2020, 'April', '23', '9:00AM', '5:00PM'); 
INSERT INTO `Shifts` Values(02, 2020, 'May', '24', '12:00PM', '8:00PM'); 
INSERT INTO `Shifts` Values(03, 2020, 'June', '12','3:00PM', '11:00PM'); 

/*
	Populating the Transport Via Table
*/
INSERT INTO `Employee_Works` VALUES ( 001, 2020, 'April', 01);
INSERT INTO `Employee_Works` VALUES ( 002, 2020, 'May', 02);
INSERT INTO `Employee_Works` VALUES ( 003, 2020, 'June', 03);

/*
	Populating the Manager Works Table
*/

INSERT INTO `Manager_Works` VALUES ( 004, 2020, 'April', 01);
INSERT INTO `Manager_Works` VALUES ( 005, 2020, 'May', 02);
INSERT INTO `Manager_Works` VALUES ( 006, 2020, 'June', 03);

/*
	Populating the Delivers Table
*/

INSERT INTO `Delivers` VALUES ( 00001, 01, 1021, '10000 kg','April-17-2020');
INSERT INTO `Delivers` VALUES ( 00002, 01, 1025, '8000 kg','April-25-2020');
INSERT INTO `Delivers` VALUES ( 00003, 01, 1027, '525 kg' ,'April-30-2020');

/*
	Populating the Supplies Table
*/

INSERT INTO `Supplies` VALUES ( 00001, 0000000001);
INSERT INTO `Supplies` VALUES ( 00002, 0000000002);
INSERT INTO `Supplies` VALUES ( 00003, 0000000003);

/*
	Populating the Buys Table
*/

INSERT INTO `Buys` VALUES ( 00001, 0000000001);
INSERT INTO `Buys` VALUES ( 00002, 0000000002);
INSERT INTO `Buys` VALUES ( 00003, 0000000003);

/*
	Populating data for Transaction_at
*/
INSERT INTO `Transaction_at` Values(001, 01, 24.50,'3:30PM'); 
INSERT INTO `Transaction_at` Values(002, 02, 50.10,'5:00PM'); 
INSERT INTO `Transaction_at` Values(003, 03, 130.40,'7:10PM');

/*
	Populating data for Items_Bought
*/
INSERT INTO `Items_Bought` Values(001, 356657247, 'Cereal'); 
INSERT INTO `Items_Bought` Values(002, 341146888, 'Candy'); 
INSERT INTO `Items_Bought` Values(003, 785624889, 'Chips'); 

/*
	Populating data for Phone_Number
*/
INSERT INTO `Phone_Number` Values(001, '(401)123-4566'); 
INSERT INTO `Phone_Number` Values(002, '(401)231-3356'); 
INSERT INTO `Phone_Number` Values(003, '(401)819-2778'); 

/*
	Populating data for Edible_Products
*/
INSERT INTO `Edible_Products` Values(356657247, 'Aug/8/2021'); 
INSERT INTO `Edible_Products` Values(341146888, 'Aug/20/2021'); 
INSERT INTO `Edible_Products` Values(785624889, 'Mar/4/2021'); 
INSERT INTO `Edible_Products` Values(0000000004, 'Feb/3/2021'); 
INSERT INTO `Edible_Products` Values(0000000003, 'Jan/11/2021'); 
INSERT INTO `Edible_Products` Values(0000000001, 'Jan/14/2021'); 
INSERT INTO `Edible_Products` Values(984217143, 'Sept/1/2021'); 


/*
	Populating data for Refridgerated
*/
INSERT INTO `Refridgerated` Values(0000000001, 'July/10/2021'); 
INSERT INTO `Refridgerated` Values(0000000003, 'Nov/3/2021'); 
INSERT INTO `Refridgerated` Values(668217887, 'May/4/2021'); 
INSERT INTO `Refridgerated` Values(937418288, 'Sept/23/2021'); 
INSERT INTO `Refridgerated` Values(811275294, 'Sept/14/2021'); 
INSERT INTO `Refridgerated` Values(442778317, 'Dec/30/2021'); 
INSERT INTO `Refridgerated` Values(383537227, 'Feb/14/2021'); 

/*
	Populating data for Non_Refridgerated
*/
INSERT INTO `Non_Refridgerated` Values(356657247, 'Jan/23/2021'); 
INSERT INTO `Non_Refridgerated` Values(341146888, 'Apr/1/2021'); 
INSERT INTO `Non_Refridgerated` Values(785624889, 'May/13/2021'); 
INSERT INTO `Non_Refridgerated` Values(984217143, 'Oct/23/2021'); 

/*
	Populating data for Customers
*/
INSERT INTO `Customers` Values(001, 100, 610458); 
INSERT INTO `Customers` Values(002, NULL, NULL); 
INSERT INTO `Customers` Values(003, 0, 123149); 


/*
	Populating data for Employee
*/
INSERT INTO `Employee` Values(00001, 321654987, 01, 02); 
INSERT INTO `Employee` Values(00002, 123456789, 03, 29 ); 
INSERT INTO `Employee` Values(00003, 521654985, 03, 28); 

/*
	Populating data for Managers
*/
INSERT INTO `Manager` Values(04, 321654987); 
INSERT INTO `Manager` Values(05, 123456789); 
INSERT INTO `Manager` Values(06, 521654985);

/*
	Populating data for Non_Edible_Products
*/
INSERT INTO `Non_Edible_Products` Values(869341175); 
INSERT INTO `Non_Edible_Products` Values(511626416); 
INSERT INTO `Non_Edible_Products` Values(667677994); 
INSERT INTO `Non_Edible_Products` Values(751529434); 
INSERT INTO `Non_Edible_Products` Values(159614836); 
INSERT INTO `Non_Edible_Products` Values(287465133); 
