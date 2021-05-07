<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Employee.php';

    $database = new Database();

    $db = $database->connect();

    $employee = new Employee($db);

    $employee->user_id = isset($_POST['user_id']) ? $_POST['user_id'] : die();

    if($employee->delete_Employee_Schedule()){
        echo json_encode(
            array('message' => 'Employee Schedule Deleted')
        );
    } else{
        echo json_encode(
            array('message' => 'Employee Schedule Not Deleted')
        );
    }