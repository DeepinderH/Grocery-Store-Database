/*
Creating procedures
To get all Employee schedules
*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `Get_All_Employees_Schedule`()
BEGIN
SELECT * FROM `Employee_Works`;
END