CREATE DEFINER=`root`@`localhost` PROCEDURE `Put_Employee_Information`(
IN `@user_id` int,
IN `@SIN` int,
IN `@store_id` int,
IN `@department_id` varchar(256))
BEGIN
UPDATE  `Employee`
SET SIN = `@SIN`, 
    store_id = `@store_id` , 
    department_id = `@department_id`
WHERE (user_id = `@user_id` );
END