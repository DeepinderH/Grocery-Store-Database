<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Manager.php';

    $database = new Database();

    $db = $database->connect();

    $manager = new Manager($db);

    $result = $manager->get_Cleaning_Company();

    $numberOfRows = $result->rowCount();

    if($numberOfRows > 0){
        $cleaningCompany_arr = array();
        $cleaningCompany_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $cleaningCompany_item = array(
                'company_id' => $company_id,
                'name' => $name
            );

            array_push($cleaningCompany_arr['data'], $cleaningCompany_item);
        }

        echo json_encode($cleaningCompany_arr, JSON_PRETTY_PRINT);

    } else{
        echo json_encode(
            array('message' => 'No Cleaning Companies Found')
        );
    }