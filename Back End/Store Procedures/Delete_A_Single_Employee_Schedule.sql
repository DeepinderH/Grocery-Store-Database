CREATE DEFINER=`root`@`localhost` PROCEDURE `Delete_Employee_Schedule`(IN `@employee_id` int(6))
BEGIN
DELETE FROM `Employee_Works` 
WHERE employee_id = `@employee_id`;
END