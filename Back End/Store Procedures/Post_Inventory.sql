CREATE DEFINER=`root`@`localhost` PROCEDURE `Add_Inventory`(
IN `@store_id` int,
IN `@product_key` int,
IN `@quantity` int )
BEGIN
INSERT INTO `Inventory` VALUES (`@store_id`, `@product_key`, `@quantity`);
END
