/*
Creating procedures
To get all Employee information
*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `Get_All_Employees`()
BEGIN
SELECT * FROM `Employee`;
END