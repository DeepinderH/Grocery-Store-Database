/*
Creating procedures
To get all customers
*/
DELIMITER //
CREATE PROCEDURE `Get_All_Customers` ()
BEGIN
SELECT * FROM `Customers`;
END //
DELIMITER ;