CREATE DEFINER=`root`@`localhost` PROCEDURE `Put_Inventory`(
IN `@store_id` int,
IN `@product_key` int,
IN `@quantity` int )
BEGIN
UPDATE  `Inventory`
SET 
	quantity = `@quantity`
WHERE (store_id = `@store_id` AND product_id= `@product_key` );
END