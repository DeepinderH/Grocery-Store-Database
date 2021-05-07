CREATE DEFINER=`root`@`localhost` PROCEDURE `Post_A_Single_Customer`(
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
INSERT INTO `Users` VALUES (`@ID`, `@first_name`, `@last_name`, `@sex`, `@postal_code`, `@city`, `@province`, `@street_name`, `@email`, `@date_of_birth`, `@store_id`);
INSERT INTO `Customers` VALUES (`@ID`, `@Points`, `@MemberNumber`);
END