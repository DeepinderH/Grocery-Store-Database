<?php

class Employee {
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

    public $logistics_id;
    public $truck_number;
    public $volume;
    public $date;

    public $product_id;
    public $quantity;

    public $employee_id;
    public $year;
    public $month;

    public $SIN;
    public $department_ID;

    public function __construct($db){
        $this->connection=$db;
    }

    public function add_Delivery_Schedule(){
        $query = 'CALL Post_Delivery_Schedule(?,?,?,?,?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->logistics_id);
        $stmt->bindParam(2,$this->store_id);
        $stmt->bindParam(3,$this->truck_number);
        $stmt->bindParam(4,$this->volume);
        $stmt->bindParam(5,$this->date);

        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function add_Inventory(){
        $query = 'CALL Add_Inventory(?,?,?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->store_id);
        $stmt->bindParam(2,$this->product_id);
        $stmt->bindParam(3,$this->quantity);

        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
        
    }    
    
    public function delete_Employee_Schedule(){
        $query = 'CALL Delete_Employee_Schedule(?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->user_id);

        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }    
    
    public function get_Delivery_Schedule(){
        $query = 'CALL Delivery_Schedule()';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt;
    }    
    
    public function edit_Delivery_Schedule(){
        $query = 'CALL Put_Delivery_Schedule(?,?,?,?,?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->logistics_id);
        $stmt->bindParam(2,$this->store_id);
        $stmt->bindParam(3,$this->truck_number);
        $stmt->bindParam(4,$this->volume);
        $stmt->bindParam(5,$this->date);

        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }    
    
    public function get_Employee_Schedule(){
        $query = 'CALL Get_A_Single_Employee_Schedule(?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->employee_id);

        $stmt->execute();

        $line = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->employee_id = $line['employee_id'] ?? 'null';
        $this->year = $line['year'] ?? 'null';
        $this->month = $line['month'] ?? 'null';

        return $stmt;
    }    
    
    public function get_Employee(){
        $query = 'CALL Get_A_Single_Employee(?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->user_id);

        $stmt->execute();

        $line = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->user_id = $line['user_id'] ?? 'null';
        $this->SIN = $line['SIN'] ?? 'null';
        $this->store_id = $line['store_id'] ?? 'null';
        $this->department_ID = $line['department_ID'] ?? 'null';

        return $stmt;
    }    
    
    public function get_All_Employee_Schedule(){
        $query = 'CALL Get_All_Employees_Schedule()';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt;
    }    
    
    public function get_All_Employees(){
        $query = 'CALL Get_All_Employees()';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt;
    }    
    
    public function get_Inventory(){
        $query = 'CALL Get_Inventory_Information()';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt;
    }    
    
    public function update_Inventory(){
        $query = 'CALL Put_Inventory(?,?,?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->store_id);
        $stmt->bindParam(2,$this->product_id);
        $stmt->bindParam(3,$this->quantity);
        
        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }

}