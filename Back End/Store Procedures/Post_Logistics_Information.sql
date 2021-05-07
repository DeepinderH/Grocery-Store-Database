/*
	Creating Procedures
    Add a cleaning company information  
*/
CREATE DEFINER=`root`@`localhost` PROCEDURE `Post_Logistic_Information`(
IN `@company_id` int,
IN `@name` varchar(256))
BEGIN
INSERT INTO `Logistics_Company` VALUES (`@company_id`, `@name`);
END