<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Manager.php';

    $database = new Database();

    $db = $database->connect();

    $manager = new Manager($db);

    $manager->user_id = isset($_POST['user_id']) ? $_POST['user_id'] : die();
    $manager->Points = isset($_POST['Points']) ? $_POST['Points'] : die();
    $manager->MemberNumber = isset($_POST['MemberNumber']) ? $_POST['MemberNumber'] : die();

    if($manager->edit_Customer_Points()){
        echo json_encode(
            array('message' => 'Customer_Points Updated')
        );
    } else{
        echo json_encode(
            array('message' => 'Customer_Points Not Updated')
        );
    }