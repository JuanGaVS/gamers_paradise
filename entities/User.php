<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Kevin
 */
require_once 'DBConnection.php';

class User {
    private $username;
    private $first_name;
    private $last_name;
    private $email;
    private $salt;
    private $password;
    
    function __construct() {
        $this->username = "";
        $this->first_name = "";
        $this->last_name = "";
        $this->email = "";
        $this->salt = "";
        $this->password = "";
        
    }
    
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getFirst_name() {
        return $this->first_name;
    }

    public function setFirst_name($first_name) {
        $this->first_name = $first_name;
    }

    public function getLast_name() {
        return $this->last_name;
    }

    public function setLast_name($last_name) {
        $this->last_name = $last_name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getSalt() {
        return $this->salt;
    }

    public function setSalt() {
        $date = date("Y-m-d H:i:s");
        $this->salt = md5($date);
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
                
        $this->password = $this->password($password);
    }
    
    public function password($plain_password){
        $temporary_password = $this->salt.$plain_password;
        for ($i = 0; $i<10; $i++){
           $temporary_password = hash("sha512", $temporary_password);
        }
        return $temporary_password;
    }
     public function passwordFromSalt($plain_password, $salt){
        $temporary_password = $salt.$plain_password;
        for ($i = 0; $i<10; $i++){
           $temporary_password = hash("sha512", $temporary_password);
        }
        return $temporary_password;
    }
    
    
    public function userAdd(){
        $connection = new DBConnection();
        $conn = $connection->getConnection();
        try{
            $statement = $conn->prepare("INSERT INTO tb_users (username, first_name, last_name, email, salt, password) values (?, ?, ?, ?, ?, ?)");
            $statement->bindParam(1,  $this->username);
            $statement->bindParam(2, $this->first_name);
            $statement->bindParam(3, $this->last_name);
            $statement->bindParam(4, $this->email);
            $statement->bindParam(5, $this->salt);
            $statement->bindParam(6, $this->password);
            $statement->execute();
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    
    }
    
    public function userUpdate(){
        $connection = new DBConnection();
        $conn = $connection->getConnection();
        try{
            $statement = $conn->prepare("UPDATE tb_users SET first_name = ?, last_name = ?, email = ?, salt = ?, password = ? WHERE username = ?");
            $statement->bindParam(1, $this->first_name);
            $statement->bindParam(2, $this->last_name);
            $statement->bindParam(3, $this->email);
            $statement->bindParam(4, $this->salt);
            $statement->bindParam(5, $this->password);
            $statement->bindParam(6,  $this->username);
            $statement->execute();
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    
    }
    
    public function userDelete($username){
        $connection = new DBConnection();
        $conn = $connection->getConnection();
        try{
            $statement = $conn->prepare("DELETE tb_users WHERE username = ?");
            $statement->bindParam(1,  $username);
            $statement->execute();
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    
    }
    
    
    
    public function user_login($username, $password){
        $connection = new DBConnection();
        $conn = $connection->getConnection();
        
        try{
            $statement = $conn->prepare("select salt, password from tb_users where username = ?");
            $statement->bindParam(1,  $username);
            $statement->execute();
            $row = $statement->fetch();
            
            
            
            $salt = $row['salt'];
            $passwordFromDB = $row['password'];
            $hashed_password = $this->passwordFromSalt($password, $salt);
            
                      
            if($passwordFromDB == $hashed_password){
                return TRUE;
            }
            else{
                return FALSE;
            }
            
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    


    
    

}

?>
