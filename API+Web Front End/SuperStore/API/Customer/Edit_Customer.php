<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Customer.php';

    $database = new Database();

    $db = $database->connect();

    $customer = new Customer($db);

    $customer->ID = isset($_POST['ID']) ? $_POST['ID'] : die();
    $customer->first_name = isset($_POST['first_name']) ? $_POST['first_name'] : die();
    $customer->last_name = isset($_POST['last_name']) ? $_POST['last_name'] : die();
    $customer->sex = isset($_POST['sex']) ? $_POST['sex'] : die();
    $customer->postal_code = isset($_POST['postal_code']) ? $_POST['postal_code'] : die();
    $customer->city = isset($_POST['city']) ? $_POST['city'] : die();
    $customer->province = isset($_POST['province']) ? $_POST['province'] : die();
    $customer->street_name = isset($_POST['street_name']) ? $_POST['street_name'] : die();
    $customer->email = isset($_POST['email']) ? $_POST['email'] : die();
    $customer->date_of_birth = isset($_POST['date_of_birth']) ? $_POST['date_of_birth'] : die();
    $customer->store_id = isset($_POST['store_id']) ? $_POST['store_id'] : die();
    $customer->points = isset($_POST['points']) ? $_POST['points'] : die();
    $customer->member_number = isset($_POST['member_number']) ? $_POST['member_number'] : die();

    if($customer->edit_Customer()){
        echo json_encode(
            array('message' => 'Customer Updated')
        );
    } else{
        echo json_encode(
            array('message' => 'Customer Not Updated')
        );
    }