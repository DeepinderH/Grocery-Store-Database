<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Manager.php';

    $database = new Database();

    $db = $database->connect();

    $manager = new Manager($db);

    $manager->company_id = isset($_POST['company_id']) ? $_POST['company_id'] : die();
    $manager->name = isset($_POST['name']) ? $_POST['name'] : die();

    if($manager->edit_Accountant()){
        echo json_encode(
            array('message' => 'Accountant Updated')
        );
    } else{
        echo json_encode(
            array('message' => 'Accountant Not Updated')
        );
    }