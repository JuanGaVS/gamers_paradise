<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBConnection
 *
 * @author Kevin
 */
class DBConnection {

    private $db_host = "localhost";
    private $db_name = "gamers_paradise";
    private $username = "root";
    private $password = "root";
    private $connection;

    function __construct() {
        try {
            $this->connection = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->username, $this->password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function getConnection() {
        return $this->connection;
    }



}

?>