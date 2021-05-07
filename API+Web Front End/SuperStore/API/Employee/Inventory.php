<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Employee.php';

    $database = new Database();

    $db = $database->connect();

    $employee = new Employee($db);

    $result = $employee->get_Inventory();

    $numberOfRows = $result->rowCount();

    if($numberOfRows > 0){
        $inventory_arr = array();
        $inventory_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $inventory_item = array(
                'store_id' => $store_id,
                'product_id' => $product_id,
                'quantity' => $quantity
            );

            array_push($inventory_arr['data'], $inventory_item);
        }

        echo json_encode($inventory_arr, JSON_PRETTY_PRINT);

    } else{
        echo json_encode(
            array('message' => 'No Inventory Found')
        );
    }