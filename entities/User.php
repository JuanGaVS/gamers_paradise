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
    
    
    

    
    

}

?>
