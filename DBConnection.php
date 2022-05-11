<?php

/**
 * DBConnection
 * class connect to manage connection to the database
 * @author FS-24 3W Academy 
 */
class DBConnection{

    private mysqli $conn;
    
    function __construct(string $hostName, string $userName, string $password, string $database )
    {
        $this->conn = new mysqli($hostName, $userName, $password, $database);
        if ($this->conn->connect_error) {
            die("Connection error".$this->conn->connect_error);
        }else{
            // echo "successfull connection";
        }
    }
    
    /**
     * getConnection: get connected mysqli object
     *
     * @return mysqli
     */
    public function getConnection():mysqli{
        return $this->conn;
    }
    
    /**
     * add: execute insertion request 
     *
     * @param  mixed $request
     * @return bool
     */
    public function add(string $requestQuery, string $fieldTypes, array $fields):bool{
        $stmt = $this->conn->prepare($requestQuery);
        $stmt->bind_param($fieldTypes, ...$fields);

        if ($stmt->execute()) {
        return true;
        }
        return false;
    }

 public function update(string $requestQuery, string $fieldTypes,int $id,array $fields):bool{
        $stmt = $this->conn->prepare($requestQuery);
        $array = [...$fields, $id];
        $stmt->bind_param($fieldTypes, ...$array);

        if ($stmt->execute()) {
        return true;
        }
        return false;
    }

    public function search(string $requestQuery, string $fieldTypes,array $fields){
        $stmt = $this->conn->prepare($requestQuery);
        $stmt->bind_param($fieldTypes, ...$fields);
        if ($stmt->execute()) {
            return $stmt->get_result();
        }
        return false;
    }

    public function getAll($requestQuery){
        $stmt = $this->conn->prepare($requestQuery);
        if ($stmt->execute()) {
           return $stmt->get_result();
        }
            return false;
    } 
    
    public function delete($requestQuery, int $id): bool{
        $stmt = $this->conn->prepare($requestQuery);
        $stmt->bind_param('i', $id);
        if ($stmt->execute()) {
           return true;
        }
            return false;
    }
    
    public function getOneById($requestQuery, $id){
        $stmt = $this->conn->prepare($requestQuery);
        $stmt->bind_param('i', $id);
        if ($stmt->execute()) {
           return $stmt->get_result();
        }
            return false;
    }


}