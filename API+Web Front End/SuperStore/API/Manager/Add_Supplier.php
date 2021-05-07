<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Manager.php';

    $database = new Database();

    $db = $database->connect();

    $manager = new Manager($db);

    $manager->supplier_id = isset($_POST['supplier_id']) ? $_POST['supplier_id'] : die();
    $manager->name = isset($_POST['name']) ? $_POST['name'] : die();
    $manager->city = isset($_POST['city']) ? $_POST['city'] : die();
    $manager->address = isset($_POST['address']) ? $_POST['address'] : die();
    $manager->postal_code = isset($_POST['postal_code']) ? $_POST['postal_code'] : die();

    if($manager->add_Supplier()){
        echo json_encode(
            array('message' => 'Supplier Created')
        );
    } else{
        echo json_encode(
            array('message' => 'Supplier Not Created')
        );
    }