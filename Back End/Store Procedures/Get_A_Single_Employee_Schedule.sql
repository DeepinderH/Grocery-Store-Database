CREATE DEFINER=`root`@`localhost` PROCEDURE `Get_A_Single_Employee_Schedule`(IN `@ID` int(6))
BEGIN
SELECT * FROM Employee_Works
WHERE employee_id = `@ID`; 
END