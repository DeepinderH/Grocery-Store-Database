<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Manager.php';

    $database = new Database();

    $db = $database->connect();

    $manager = new Manager($db);

    $manager->employee_id = isset($_POST['employee_id']) ? $_POST['employee_id'] : die();
    $manager->year = isset($_POST['year']) ? $_POST['year'] : die();
    $manager->month = isset($_POST['month']) ? $_POST['month'] : die();
    $manager->shift_id = isset($_POST['shift_id']) ? $_POST['shift_id'] : die();

    if($manager->edit_Employee_Schedule()){
        echo json_encode(
            array('message' => 'Employee_Schedule Updated')
        );
    } else{
        echo json_encode(
            array('message' => 'Employee_Schedule Not Updated')
        );
    }