CREATE DEFINER=`root`@`localhost` PROCEDURE `Put_A_Single_Customer`(
IN `@ID` int(6),  
IN `@first_name` varchar(255), 
IN `@last_name` varchar(255),
IN `@sex` varchar(255),
IN `@postal_code` varchar(255),
IN `@city`    varchar(255),
IN `@province` varchar(255),
IN `@street_name` varchar(255),
IN `@email`   varchar(255),
IN `@date_of_birth` varchar(255),
IN `@store_id` int,
IN `@Points` int(255),
IN `@MemberNumber` int(255))
BEGIN
UPDATE `Users` 
SET 
	first_name = `@first_name` , 
	last_name = `@last_name` , 
	sex= `@sex` , 
	postal_code = `@postal_code` , 
	city = `@city` , 
	province = `@province` , 
	street_name = `@street_name`, 
	email = `@email`,
	date_of_birth = `@date_of_birth`, 
	store_id = `@store_id`
WHERE ID = `@ID`;

UPDATE `Customers` 
SET 
	points = `@Points`, 
    member_number = `@MemberNumber`
WHERE user_id = `@ID`;
END