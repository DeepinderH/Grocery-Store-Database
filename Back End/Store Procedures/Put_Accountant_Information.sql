CREATE DEFINER=`root`@`localhost` PROCEDURE `Put_Accountant_Information`(
IN `@company_id` int,
IN `@name` varchar(256))
BEGIN
UPDATE  `Accountant`
SET name = `@name`
WHERE (company_id = `@company_id`);
END