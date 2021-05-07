/*
Creating procedures
To get inventory information
*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `Get_Inventory_Information`()
BEGIN
SELECT * FROM `Inventory`;
END