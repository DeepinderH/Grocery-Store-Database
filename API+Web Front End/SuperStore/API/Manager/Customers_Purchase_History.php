<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Manager.php';

    $database = new Database();

    $db = $database->connect();

    $manager = new Manager($db);

    $result = $manager->get_Customers_Purchase_History();

    $numberOfRows = $result->rowCount();

    if($numberOfRows > 0){
        $customer_Purchase_arr = array();
        $customer_Purchase_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $customer_Purchase_item = array(
                'customer_id' => $customer_id,
                'product_id' => $product_id,
                'items_bought' => $items_bought
            );

            array_push($customer_Purchase_arr['data'], $customer_Purchase_item);
        }

        echo json_encode($customer_Purchase_arr, JSON_PRETTY_PRINT);

    } else{
        echo json_encode(
            array('message' => 'No Customer Purchase History Found')
        );
    }