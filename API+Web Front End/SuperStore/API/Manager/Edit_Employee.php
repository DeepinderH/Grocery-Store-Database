<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Manager.php';

    $database = new Database();

    $db = $database->connect();

    $manager = new Manager($db);

    $manager->user_id = isset($_POST['user_id']) ? $_POST['user_id'] : die();
    $manager->SIN = isset($_POST['SIN']) ? $_POST['SIN'] : die();
    $manager->store_id = isset($_POST['store_id']) ? $_POST['store_id'] : die();
    $manager->department_ID = isset($_POST['department_ID']) ? $_POST['department_ID'] : die();

    if($manager->edit_Employee()){
        echo json_encode(
            array('message' => 'Employee Updated')
        );
    } else{
        echo json_encode(
            array('message' => 'Employee Not Updated')
        );
    }