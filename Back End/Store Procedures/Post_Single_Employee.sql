CREATE DEFINER=`root`@`localhost` PROCEDURE `Post_Single_Employee`(
IN `@ID` int, 
IN `@first_name` varchar(255),
IN `@last_name` varchar(255),
IN `@sex` varchar(255),
IN `@postal_code` varchar(255),
IN `@city`    varchar(255),
IN `@province` varchar(255),
IN `@street_name` varchar(255),
IN `@email` varchar(255),
IN `@date_of_birth` varchar(255),
IN `@store_id` int,
IN `@SIN` int,
IN `@department_ID` int
)
BEGIN
INSERT INTO `Users` VALUES (`@ID`,`@first_name`, `@last_name`, `@sex`, `@postal_code`, `@city`, `@province`, `@street_name`, `@email`, `@date_of_birth`,`@store_id`);
INSERT INTO `Employee` VALUES (`@ID`, `@SIN`, `@store_id`, `@department_ID`);
END