CREATE DEFINER=`root`@`localhost` PROCEDURE `Post_Schedule_To_A_Single_Employee`(
IN `@employee_id` int(6), 
IN `@year` int, 
IN `@month` varchar(255),
IN `@shift_id` int)
BEGIN
INSERT INTO `Employee_Works` VALUES (`@employee_id`, `@year`, `@month`, `@shift_id`);
END