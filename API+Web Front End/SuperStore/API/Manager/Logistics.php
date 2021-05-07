<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Manager.php';

    $database = new Database();

    $db = $database->connect();

    $manager = new Manager($db);

    $result = $manager->get_Logistics();

    $numberOfRows = $result->rowCount();

    if($numberOfRows > 0){
        $logistics_Arr = array();
        $logistics_Arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $logistic_item = array(
                'ID' => $ID,
                'name' => $name
            );

            array_push($logistics_Arr['data'], $logistic_item);
        }

        echo json_encode($logistics_Arr, JSON_PRETTY_PRINT);

    } else{
        echo json_encode(
            array('message' => 'No Logistics Companies Found')
        );
    }