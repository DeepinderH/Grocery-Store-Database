<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Manager.php';

    $database = new Database();

    $db = $database->connect();

    $manager = new Manager($db);

    $result = $manager->get_Accountant();

    $numberOfRows = $result->rowCount();

    if($numberOfRows > 0){
        $accountant_arr = array();
        $accountant_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $accountant_item = array(
                'company_id' => $company_id,
                'name' => $name
            );

            array_push($accountant_arr['data'], $accountant_item);
        }

        echo json_encode($accountant_arr, JSON_PRETTY_PRINT);

    } else{
        echo json_encode(
            array('message' => 'No Accountants Found')
        );
    }