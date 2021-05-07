CREATE DEFINER=`root`@`localhost` PROCEDURE `Put_Cleaning_Company_Information`(
IN `@company_id` int,
IN `@name` varchar(256))
BEGIN
UPDATE  `Cleaning_Company`
SET name = `@name`
WHERE (company_id = `@company_id` );
END