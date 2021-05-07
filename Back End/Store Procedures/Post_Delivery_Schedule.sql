CREATE DEFINER=`root`@`localhost` PROCEDURE `Post_Delivery_Schedule`(
IN `@logistics_id` int,
IN `@store_id` int,
IN `@truck_number` int,
IN `@volume` varchar(256),
IN `@date` varchar(256))
BEGIN
INSERT INTO `Delivers` VALUES (`@logistics_id`, `@store_id`, `@truck_number`, `@volume` , `@date`);
END