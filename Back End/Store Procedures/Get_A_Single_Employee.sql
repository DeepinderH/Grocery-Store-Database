CREATE DEFINER=`root`@`localhost` PROCEDURE `Get_A_Single_Employee`(IN `@ID` int(6))
BEGIN
SELECT * FROM Users
JOIN Employee ON user_id = ID
WHERE ID = `@ID`; 
END