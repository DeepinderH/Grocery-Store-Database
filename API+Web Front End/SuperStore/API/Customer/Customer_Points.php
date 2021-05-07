<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Customer.php';

    $database = new Database();

    $db = $database->connect();

    $customer = new Customer($db);

    $customer->ID = isset($_GET['ID']) ? $_GET['ID'] : die();

    $customer -> customer_Points();

    $customer_array = array(
        'points' => $customer->points
    );

    print_r(json_encode($customer_array));