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

    private $db_host = "mysql.flashfusioner.com";
    private $db_name = "gamer_paradise";
    private $username = "jorgemiranda";
    private $password = "pwd123";
    private $connection;

    function __construct() {
        try {
            $this->connection = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->username, $this->password);
            $this->connection->exec("set names utf8");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function getConnection() {
        return $this->connection;
    }



}

?>
