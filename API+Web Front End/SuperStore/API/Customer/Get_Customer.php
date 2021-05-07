<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Customer.php';

    $database = new Database();

    $db = $database->connect();

    $customer = new Customer($db);

    $customer->user_id = isset($_GET['user_id']) ? $_GET['user_id'] : die();

    $customer -> get_Customer();

    $customer_array = array(
        'user_id' => $customer->user_id,
        'points' => $customer->points,
        'member_number' => $customer->member_number
    );

  echo(json_encode($customer_array, JSON_PRETTY_PRINT));