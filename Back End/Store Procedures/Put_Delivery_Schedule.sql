CREATE DEFINER=`root`@`localhost` PROCEDURE `Put_Delivery_Schedule`(
IN `@logistics_id` int,
IN `@store_id` int,
IN `@truck_number` int,
IN `@volume` varchar(256),
IN `@date` varchar(256))
BEGIN
UPDATE  `Delivers`
SET truck_number = `@truck_number`, 
    volume = `@volume` , 
    date = `@date`
WHERE (logistics_id = `@logistics_id` AND store_id = `@store_id` );
END