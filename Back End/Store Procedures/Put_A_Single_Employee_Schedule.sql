CREATE DEFINER=`root`@`localhost` PROCEDURE `Put_A_Single_Employee_Schedule`(
IN `@employee_id` int, 
IN `@year` int,
IN `@month` varchar(255),
IN `@shift_id` int
)
BEGIN
UPDATE `Employee_Works` 
SET 
	year = `@year`,
    month = `@month`
WHERE employee_id = `@employee_id` AND shift_id = `@shift_id`;
END