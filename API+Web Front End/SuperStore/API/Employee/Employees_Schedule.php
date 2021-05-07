<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Employee.php';

    $database = new Database();

    $db = $database->connect();

    $employee = new Employee($db);

    $result = $employee->get_All_Employee_Schedule();

    $numberOfRows = $result->rowCount();

    if($numberOfRows > 0){
        $schedule_arr = array();
        $schedule_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $schedule_item = array(
                'employee_id' => $employee_id,
                'year' => $year,
                'month' => $month
            );

            array_push($schedule_arr['data'], $schedule_item);
        }

        echo json_encode($schedule_arr, JSON_PRETTY_PRINT);

    } else{
        echo json_encode(
            array('message' => 'No Employees Schedule Found')
        );
    }