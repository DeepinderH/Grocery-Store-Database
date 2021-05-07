<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Employee.php';

    $database = new Database();

    $db = $database->connect();

    $employee = new Employee($db);

    $result = $employee->get_All_Employees();

    $numberOfRows = $result->rowCount();

    if($numberOfRows > 0){
        $employee_arr = array();
        $employee_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $employee_item = array(
                'user_id' => $user_id,
                'SIN' => $SIN,
                'store_id' => $store_id,
                'department_ID' => $department_ID
            );

            array_push($employee_arr['data'], $employee_item);
        }

        echo json_encode($employee_arr, JSON_PRETTY_PRINT);

    } else{
        echo json_encode(
            array('message' => 'No Employees Found')
        );
    }