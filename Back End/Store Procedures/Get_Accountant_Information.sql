/*
	Creating Procedures
    Get the delivery scheudle
*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `Get_Accountant_Information`()
BEGIN
SELECT * FROM Accountant; 
END