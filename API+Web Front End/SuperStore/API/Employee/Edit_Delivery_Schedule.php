<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Employee.php';

    $database = new Database();

    $db = $database->connect();

    $employee = new Employee($db);

    $employee->logistics_id = isset($_POST['logistics_id']) ? $_POST['logistics_id'] : die();
    $employee->store_id = isset($_POST['store_id']) ? $_POST['store_id'] : die();
    $employee->truck_number = isset($_POST['truck_number']) ? $_POST['truck_number'] : die();
    $employee->volume = isset($_POST['volume']) ? $_POST['volume'] : die();
    $employee->date = isset($_POST['date']) ? $_POST['date'] : die();

    if($employee->edit_Delivery_Schedule()){
        echo json_encode(
            array('message' => 'Delivery Schedule Updated')
        );
    } else{
        echo json_encode(
            array('message' => 'Delivery Schedule Not Updated')
        );
    }