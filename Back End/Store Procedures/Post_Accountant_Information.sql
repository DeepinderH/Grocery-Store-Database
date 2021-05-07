/*
	Creating Procedures
    Add an accountant information  
*/
CREATE PROCEDURE `Post_Accountant_Information` (
IN `@company_id` int,
IN `@name` varchar(256))
BEGIN
INSERT INTO `Accountant` VALUES (`@company_id`, `@name`);
END