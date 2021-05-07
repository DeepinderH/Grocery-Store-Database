/*
Creating procedures
To get a single customer
*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `Get_A_Single_Customer`(IN `@ID` int(6))
BEGIN
SELECT * FROM Customers
WHERE user_id = `@ID`; 
END