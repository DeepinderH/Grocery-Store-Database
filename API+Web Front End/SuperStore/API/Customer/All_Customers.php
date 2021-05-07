<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Customer.php';

    $database = new Database();

    $db = $database->connect();

    $customer = new Customer($db);

    $result = $customer->all_Customers();

    $numberOfRows = $result->rowCount();

    if($numberOfRows > 0){
        $customers_arr = array();
        $customers_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $customer_item = array(
                'user_id' => $user_id,
                'points' => $points,
                'member_number' => $member_number
            );

            array_push($customers_arr['data'], $customer_item);
        }

        echo json_encode($customers_arr, JSON_PRETTY_PRINT);

    } else{
        echo json_encode(
            array('message' => 'No Customers Found')
        );
    }