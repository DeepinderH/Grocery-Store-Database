<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Manager.php';

    $database = new Database();

    $db = $database->connect();

    $manager = new Manager($db);

    $manager->ID = isset($_POST['ID']) ? $_POST['ID'] : die();
    $manager->first_name = isset($_POST['first_name']) ? $_POST['first_name'] : die();
    $manager->last_name = isset($_POST['last_name']) ? $_POST['last_name'] : die();
    $manager->sex = isset($_POST['sex']) ? $_POST['sex'] : die();
    $manager->postal_code = isset($_POST['postal_code']) ? $_POST['postal_code'] : die();
    $manager->city = isset($_POST['city']) ? $_POST['city'] : die();
    $manager->province = isset($_POST['province']) ? $_POST['province'] : die();
    $manager->street_name = isset($_POST['street_name']) ? $_POST['street_name'] : die();
    $manager->email = isset($_POST['email']) ? $_POST['email'] : die();
    $manager->date_of_birth = isset($_POST['date_of_birth']) ? $_POST['date_of_birth'] : die();
    $manager->store_id = isset($_POST['store_id']) ? $_POST['store_id'] : die();
    $manager->SIN = isset($_POST['SIN']) ? $_POST['SIN'] : die();
    $manager->department_ID = isset($_POST['department_ID']) ? $_POST['department_ID'] : die();

    if($manager->add_Employee()){
        echo json_encode(
            array('message' => 'Employee Created')
        );
    } else{
        echo json_encode(
            array('message' => 'Employee Not Created')
        );
    }