<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Employee.php';

    $database = new Database();

    $db = $database->connect();

    $employee = new Employee($db);

    $employee->store_id = isset($_POST['store_id']) ? $_POST['store_id'] : die();
    $employee->product_id = isset($_POST['product_id']) ? $_POST['product_id'] : die();
    $employee->quantity = isset($_POST['quantity']) ? $_POST['quantity'] : die();

    if($employee->add_Inventory()){
        echo json_encode(
            array('message' => 'Inventory Added')
        );
    } else{
        echo json_encode(
            array('message' => 'Inventory Not Added')
        );
    }