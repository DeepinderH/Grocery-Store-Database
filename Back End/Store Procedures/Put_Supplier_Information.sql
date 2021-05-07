CREATE DEFINER=`root`@`localhost` PROCEDURE `Put_Supplier_Information`(
IN `@supplier_id` int,
IN `@name` varchar(256),
IN `@city` varchar(256),
IN `@address` varchar(256),
IN `@postal_code` varchar(256))
BEGIN
UPDATE  `Supplier`
SET name = `@name`,
	city = `@city`,
    address =`@address`,
    postal_code = `@postal_code`
WHERE (supplier_id = `@supplier_id` );
END