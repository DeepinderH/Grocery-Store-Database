<?php

class Customer {
    private $connection;

    public $user_id;
    public $ID;
    public $first_name;
    public $last_name;
    public $sex;
    public $postal_code;
    public $city;
    public $province;
    public $street_name;
    public $email;
    public $date_of_birth;
    public $store_id;
    public $points;
    public $member_number;

    public function __construct($db){
        $this->connection=$db;
    }

    public function add_Customer(){
        $query = 'CALL Post_A_Single_Customer(?,?,?,?,?,?,?,?,?,?,?,?,?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->ID);
        $stmt->bindParam(2,$this->first_name);
        $stmt->bindParam(3,$this->last_name);
        $stmt->bindParam(4,$this->sex);
        $stmt->bindParam(5,$this->postal_code);
        $stmt->bindParam(6,$this->city);
        $stmt->bindParam(7,$this->province);
        $stmt->bindParam(8,$this->street_name);
        $stmt->bindParam(9,$this->email);
        $stmt->bindParam(10,$this->date_of_birth);
        $stmt->bindParam(11,$this->store_id);
        $stmt->bindParam(12,$this->points);
        $stmt->bindParam(13,$this->member_number);

        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function all_Customers(){
        $query = 'CALL Get_All_Customers()';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt;
    }  

    public function customer_Points(){
        $query = 'CALL Get_Points_Of_A_Single_Customer(?)';
        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->ID);
        
        $stmt->execute();

        $line = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->points = $line['points'] ?? 'null';

        return $stmt;
    } 

    public function delete_Customer(){
        $query = 'CALL Delete_A_Single_Customer(?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->ID);

        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }   

    public function edit_Customer(){
        $query = 'CALL Put_A_Single_Customer(?,?,?,?,?,?,?,?,?,?,?,?,?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->ID);
        $stmt->bindParam(2,$this->first_name);
        $stmt->bindParam(3,$this->last_name);
        $stmt->bindParam(4,$this->sex);
        $stmt->bindParam(5,$this->postal_code);
        $stmt->bindParam(6,$this->city);
        $stmt->bindParam(7,$this->province);
        $stmt->bindParam(8,$this->street_name);
        $stmt->bindParam(9,$this->email);
        $stmt->bindParam(10,$this->date_of_birth);
        $stmt->bindParam(11,$this->store_id);
        $stmt->bindParam(12,$this->points);
        $stmt->bindParam(13,$this->member_number);

        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }    

    public function get_Customer(){
        $query = 'CALL Get_A_Single_Customer(?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1, $this->user_id);

        $stmt->execute();

        $line = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->user_id = $line['user_id'] ?? 'null';
        $this->points = $line['points'] ?? 'null';
        $this->member_number = $line['member_number'] ?? 'null';

        return $stmt;
    }

}