<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Employee.php';

    $database = new Database();

    $db = $database->connect();

    $employee = new Employee($db);

    $employee->employee_id = isset($_GET['employee_id']) ? $_GET['employee_id'] : die();

    $employee->get_Employee_Schedule();

    $employee_schedule = array(
        'employee_id' => $employee->employee_id,
        'year' => $employee->year,
        'month' => $employee->month
    );

    echo(json_encode($employee_schedule,JSON_PRETTY_PRINT));