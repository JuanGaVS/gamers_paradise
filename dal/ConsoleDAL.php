<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConsoleDAL
 *
 * @author Kevin
 */

  

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/gamers_paradise/' . 'entities/Console.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gamers_paradise/' . 'entities/DBConnection.php';



/**
 * Description of ConsoleDAL
 *
 * @author Kevin
 */
class ConsoleDAL {

    //put your code here

    private $conn;

    function __construct() {
        $connection = new DBConnection();
        $this->conn = $connection->getConnection();
    }

    public function consoleAdd(Console $console) {



        try {
            $statement = $this->conn->prepare("INSERT INTO tb_console (console_id, name) values (?, ?)");
            $statement->bindParam(1, $console->getConsole_id());
            $statement->bindParam(2, $console->getName());
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

       
    }
    
    public function getConsole($console_id){
        try {
            $statement = $this->conn->prepare("select name from tb_console where console_id = ?");
            $statement->bindParam(1, $console_id);
            $statement->execute();
            $row = $statement->fetch();


            $console = new Console();

            $console->setConsole_id($console_id);
            $console->setName($row['name']);
            
            return $console;
        } catch (PDOException $e) {
            //echo $e->getMessage();
            return null;
        }
    }
    
    public function consoleUpdate(Console $console) {

        $console_id = $console->getConsole_id();


        try {
            $statement = $this->conn->prepare("UPDATE tb_console set name = ? where console_id = ?");
            $statement->bindParam(1, $console->getName());
            $statement->bindParam(2, $console_id);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        
    }
    
    public function consoleDelete($console_id) {

        
        try {
                
                $statement = $this->conn->prepare("DELETE tb_console where console_id = ?");
                $statement->bindParam(1, $console_id);
                $statement->execute();
                
               
                
            } catch (PDOException $e) {
                echo $e->getMessage();
            }


      
    }
    
    public function truncateConsoles(){
        $statement = $this->conn->prepare("TRUNCATE table tb_console");
        $statement->execute();
    }

    public function importJson($stsr_datos) {

        $str_datos = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/gamers_paradise/'."consoles.json");

        try{
        $datos = json_decode($str_datos, true);

        foreach ($datos["consoles"] as $console) {

            $id = $console["id"];
            $name = $console["name"];
            

            $console = new Console();

            $console->setConsole_id($id);
            $console->setName($name);
           

            $this->consoleAdd($console);
        }
        return 0;//correcto
        
        }  catch (Exception $e){
            return 1;
        }
    }

}

?>
