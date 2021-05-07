CREATE DEFINER=`root`@`localhost` PROCEDURE `Post_Supplier_Information`(
IN `@supplier_id` int,
IN `@name` varchar(256),
IN `@city` varchar(256),
IN `@address` varchar(256),
IN `@postal_code` varchar(256))
BEGIN
INSERT INTO `Supplier` VALUES (`@supplier_id`, `@name`, `@city`, `@address`, `@postal_code` );
END