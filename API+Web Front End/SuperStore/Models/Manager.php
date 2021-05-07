<?php

class Manager {
    private $connection;

    public $company_id;
    public $name;

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
    public $Points;
    public $MemberNumber;

    public $employee_id;
    public $year;
    public $month;
    public $shift_id;

    public $SIN;
    public $department_ID;

    public $supplier_id;
    public $address;

    public $user_id;

    public function __construct($db){
        $this->connection=$db;
    }

    public function get_Accountant(){
        $query = 'CALL Get_Accountant_Information()';

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function add_Accountant(){
        $query = 'CALL Post_Accountant_Information(?,?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->company_id);
        $stmt->bindParam(2,$this->name);
        
        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function add_Cleaning_Company(){
        $query = 'CALL Post_Cleaning_Company_Information(?,?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->company_id);
        $stmt->bindParam(2,$this->name);
        
        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function add_Customer_Points(){
        $query = 'CALL Post_Points_To_A_Single_Customer(?,?,?,?,?,?,?,?,?,?,?,?,?)';

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
        $stmt->bindParam(12,$this->Points);
        $stmt->bindParam(13,$this->MemberNumber);

        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function add_Employee_Schedule(){
        $query = 'CALL Post_Schedule_To_A_Single_Employee(?,?,?,?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->employee_id);
        $stmt->bindParam(2,$this->year);
        $stmt->bindParam(3,$this->month);
        $stmt->bindParam(4,$this->shift_id);
        
        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function add_Employee(){
        $query = 'CALL Post_Single_Employee(?,?,?,?,?,?,?,?,?,?,?,?,?)';

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
        $stmt->bindParam(12,$this->SIN);
        $stmt->bindParam(13,$this->department_ID);
        
        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function add_Logitics(){
        $query = 'CALL Post_Logistic_Information(?,?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->company_id);
        $stmt->bindParam(2,$this->name);
        
        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function add_Supplier(){
        $query = 'CALL Post_Supplier_Information(?,?,?,?,?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->supplier_id);
        $stmt->bindParam(2,$this->name);
        $stmt->bindParam(3,$this->city);
        $stmt->bindParam(4,$this->address);
        $stmt->bindParam(5,$this->postal_code);
        
        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function get_Cleaning_Company(){
        $query = 'CALL Get_Cleaning_Company_Information()';

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function get_Customers_Purchase_History(){
        $query = 'CALL Get_Purchase_History_All_Customers()';

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function edit_Accountant(){
        $query = 'CALL Put_Accountant_Information(?,?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->company_id);
        $stmt->bindParam(2,$this->name);
        
        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function edit_Cleaning_Company(){
        $query = 'CALL Put_Cleaning_Company_Information(?,?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->company_id);
        $stmt->bindParam(2,$this->name);
        
        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function edit_Customer_Points(){
        $query = 'CALL Put_A_Single_Customer_Points(?,?,?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->user_id);
        $stmt->bindParam(2,$this->Points);
        $stmt->bindParam(3,$this->MemberNumber);

        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function edit_Employee_Schedule(){
        $query = 'CALL Put_A_Single_Employee_Schedule(?,?,?,?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->employee_id);
        $stmt->bindParam(2,$this->year);
        $stmt->bindParam(3,$this->month);
        $stmt->bindParam(4,$this->shift_id);

        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function edit_Employee(){
        $query = 'CALL Put_Employee_Information(?,?,?,?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->user_id);
        $stmt->bindParam(2,$this->SIN);
        $stmt->bindParam(3,$this->store_id);
        $stmt->bindParam(4,$this->department_ID);
        
        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function edit_Logistics(){
        $query = 'CALL Put_Logistics_Information(?,?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->ID);
        $stmt->bindParam(2,$this->name);
        
        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function edit_Supplier(){
        $query = 'CALL Put_Supplier_Information(?,?,?,?,?)';

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(1,$this->supplier_id);
        $stmt->bindParam(2,$this->name);
        $stmt->bindParam(3,$this->city);
        $stmt->bindParam(4,$this->address);
        $stmt->bindParam(5,$this->postal_code);
        
        if($stmt->execute()){
            return true;
        }

        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function get_Logistics(){
        $query = 'CALL Get_Logistics_Information()';

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function get_Supplier(){
        $query = 'CALL Get_Supplier_Information()';

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }

}