<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Manager.php';

    $database = new Database();

    $db = $database->connect();

    $manager = new Manager($db);

    $manager->ID = isset($_POST['ID']) ? $_POST['ID'] : die();
    $manager->name = isset($_POST['name']) ? $_POST['name'] : die();

    if($manager->edit_Logistics()){
        echo json_encode(
            array('message' => 'Logistics Updated')
        );
    } else{
        echo json_encode(
            array('message' => 'Logistics Not Updated')
        );
    }