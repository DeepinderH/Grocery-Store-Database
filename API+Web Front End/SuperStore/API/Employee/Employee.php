<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Employee.php';

    $database = new Database();

    $db = $database->connect();

    $employee = new Employee($db);

    $employee->user_id = isset($_GET['user_id']) ? $_GET['user_id'] : die();

    $employee->get_Employee();

    $employee_array = array(
        'user_id' => $employee->user_id,
        'SIN' => $employee->SIN,
        'store_id' => $employee->store_id,
        'department_ID' => $employee->department_ID
    );

    echo(json_encode($employee_array, JSON_PRETTY_PRINT));