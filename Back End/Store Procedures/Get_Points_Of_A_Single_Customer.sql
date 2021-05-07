/*
Creating procedures
To get a single customers member points
*/
CREATE PROCEDURE `Get_Points_Of_A_Single_Customer` (IN `@user_id` int)
BEGIN
SELECT points FROM Customers
WHERE user_id = @user_id; 
END