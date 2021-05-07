<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Customer.php';

    $database = new Database();

    $db = $database->connect();

    $customer = new Customer($db);

    $customer->ID = isset($_POST['ID']) ? $_POST['ID'] : die();

    if($customer->delete_Customer()){
        echo json_encode(
            array('message' => 'Customer Deleted')
        );
    } else{
        echo json_encode(
            array('message' => 'Customer Not Deleted')
        );
    }