<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Employee.php';

    $database = new Database();

    $db = $database->connect();

    $employee = new Employee($db);

    $result = $employee->get_Delivery_Schedule();

    $numberOfRows = $result->rowCount();

    if($numberOfRows > 0){
        $delivery_arr = array();
        $delivery_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $delivery_item = array(
                'logistics_id' => $logistics_id,
                'store_id' => $store_id,
                'truck_number' => $truck_number,
                'volume' => $volume,
                'date' => $date
            );

            array_push($delivery_arr['data'], $delivery_item);
        }

        echo json_encode($delivery_arr, JSON_PRETTY_PRINT);

    } else{
        echo json_encode(
            array('message' => 'No Delivery Schedule Found')
        );
    }