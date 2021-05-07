CREATE DEFINER=`root`@`localhost` PROCEDURE `Put_A_Single_Customer_Points`(
IN `@user_id` int(6), 
IN `@Points` int(255),
in `@member_number` int
)
BEGIN
UPDATE `Customers` 
SET 
	points = `@Points`
WHERE user_id = `@user_id` AND member_number = `@member_number`; 
END