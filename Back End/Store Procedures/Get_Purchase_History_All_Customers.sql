/*
Creating procedures
To Get All Items Bought from all customers 

*/

CREATE PROCEDURE `Get_Purchase_History_All_Customers` ()
BEGIN
SELECT * FROM `Items_Bought`;
END 