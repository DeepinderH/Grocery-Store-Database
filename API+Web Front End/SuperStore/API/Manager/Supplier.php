<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Manager.php';

    $database = new Database();

    $db = $database->connect();

    $manager = new Manager($db);

    $result = $manager->get_Supplier();

    $numberOfRows = $result->rowCount();

    if($numberOfRows > 0){
        $supplier_arr = array();
        $supplier_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $supplier_item = array(
                'supplier_id' => $supplier_id,
                'name' => $name,
                'city' => $city,
                'address' => $address,
                'postal_code' => $postal_code
            );

            array_push($supplier_arr['data'], $supplier_item);
        }

        echo json_encode($supplier_arr, JSON_PRETTY_PRINT);

    } else{
        echo json_encode(
            array('message' => 'No Suppliers Found')
        );
    }