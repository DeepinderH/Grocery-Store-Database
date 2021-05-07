CREATE DEFINER=`root`@`localhost` PROCEDURE `Put_Logistics_Information`(
IN `@ID` int,
IN `@name` varchar(256))
BEGIN
UPDATE  `Logistics_Company`
SET name = `@name`
WHERE (ID = `@ID` );
END