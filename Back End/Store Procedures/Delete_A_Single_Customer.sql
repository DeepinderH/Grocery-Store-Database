/*
Creating procedures
To delete a single customers information

*/

CREATE DEFINER=`root`@`localhost` PROCEDURE `Delete_A_Single_Customer`(IN `@ID` int(6))
BEGIN
DELETE FROM `Users`
WHERE ID = `@ID`;
END