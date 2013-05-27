<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/gamers_paradise/' .'entities/Game.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gamers_paradise/' .'entities/Console.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gamers_paradise/' .'entities/DBConnection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gamers_paradise/' .'dal/ConsoleDAL.php';

/**
 * Description of GameDAL
 *
 * @author Kevin
 */
class GameDAL {

    //put your code here

    private $conn;

    function __construct() {
        $connection = new DBConnection();
        $this->conn = $connection->getConnection();
    }

    public function gameAdd(Game $game) {

        $game_id = $game->getGame_id();


        try {
            $statement = $this->conn->prepare("INSERT INTO tb_game (game_id, name, trailer_url, description) values (?, ?, ?, ?)");
            $statement->bindParam(1, $game->getGame_id());
            $statement->bindParam(2, $game->getName());
            $statement->bindParam(3, $game->getTrailer_url());
            $statement->bindParam(4, $game->getDescription());
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $consoles = $game->getConsoles();
        $pictures = $game->getPictures();

        //$contestants = $game->getContestants();

        foreach ($consoles as $console) {

            try {
                $statement = $this->conn->prepare("INSERT INTO tb_game_console (game_id, console_id) values (?, ?)");
                $statement->bindParam(1, $game_id);
                $statement->bindParam(2, $console->getConsole_id());
                $statement->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        foreach ($pictures as $picture) {

            try {
                $statement = $this->conn->prepare("INSERT INTO tb_game_pictures (game_id, picture_url) values (?, ?)");
                $statement->bindParam(1, $game_id);
                $statement->bindParam(2, $picture);
                $statement->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
    
    public function gameUpdate(Game $game) {

        $game_id = $game->getGame_id();


        try {
            $statement = $this->conn->prepare("UPDATE tb_game set name = ?, trailer_url = ?, description = ? where game_id = ?");
            $statement->bindParam(1, $game->getName());
            $statement->bindParam(2, $game->getTrailer_url());
            $statement->bindParam(3, $game->getDescription());
            $statement->bindParam(4, $game->getGame_id());
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $consoles = $game->getConsoles();
        $pictures = $game->getPictures();

        //$contestants = $game->getContestants();

        try {
                
                $statement = $this->conn->prepare("DELETE tb_game_console where game_id = ?");
                $statement->bindParam(1, $game_id);
                $statement->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        
        foreach ($consoles as $console) {

            try {
                               
                $statement2 = $this->conn->prepare("INSERT INTO tb_game_console (game_id, console_id) values (?, ?)");
                $statement2->bindParam(1, $game_id);
                $statement2->bindParam(2, $console->getConsole_id());
                $statement2->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        
        try {
                
                $statement = $this->conn->prepare("DELETE tb_game_pictures where game_id = ?");
                $statement->bindParam(1, $game_id);
                $statement->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        
        foreach ($pictures as $picture) {

            try {
                
                
                
                $statement2 = $this->conn->prepare("INSERT INTO tb_game_pictures (game_id, picture_url) values (?, ?)");
                $statement2->bindParam(1, $game_id);
                $statement2->bindParam(2, $picture);
                $statement2->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
    
    public function gameDelete($game_id) {

        
        try {
                
                $statement = $this->conn->prepare("DELETE tb_game_console where game_id = ?");
                $statement->bindParam(1, $game_id);
                $statement->execute();
                
                $statement2 = $this->conn->prepare("DELETE tb_game_pictures where game_id = ?");
                $statement2->bindParam(1, $game_id);
                $statement2->execute();
                
                $statement3 = $this->conn->prepare("DELETE tb_game where game_id = ?");
                $statement3->bindParam(1, $game_id);
                $statement3->execute();
                
            } catch (PDOException $e) {
                echo $e->getMessage();
            }


      
    }

    public function importJson($stsr_datos) {

        try {
            
        

        $str_datos = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/gamers_paradise/'."games.json");
        echo "Prueba loro ". $_SERVER['DOCUMENT_ROOT'].'/gamers_paradise/'."games.json";
        
        $datos = json_decode($str_datos, true);

        foreach ($datos["games"] as $game) {

            $id = $game["id"];
            $name = $game["name"];
            $trailer_url = $game["trailer_url"];
            $description = $game["description"];
            $consoles = $game["consoles"];
            $pictures = $game["pictures"];

            $game = new Game();

            $game->setGame_id($id);
            $game->setName($name);
            $game->setDescription($description);
            $game->setTrailer_url($trailer_url);
            $game->setPictures($pictures);

            foreach ($consoles as $console) {

                
                $cDAL = new ConsoleDAL();
                
                $consoleEnt = $cDAL->getConsole($console);
                
                if($consoleEnt != null){
                    $game->addConsole($consoleEnt);
                }
                else{
                    //ERROR CONSOLE DOES NOT EXIST
                }
                
                
               

               
            }



            $this->gameAdd($game);
        }
        
        return 0;//correcto
        
        }  catch (Exception $e){
            return 1;
        }
    }
    
    public function truncateGames(){
        $statement = $this->conn->prepare("TRUNCATE table tb_game");
        $statement->execute();
    }
    
    public function getGame($game_id){
        
        
        $game = new Game();


        try {
            $statement = $this->conn->prepare("select name, trailer_url, description from tb_game where game_id = ?");
            $statement->bindParam(1, $game_id);
            $statement->execute();
            $gRow = $statement->fetch();
            
            $game->setGame_id($game_id);
            $game->setName($gRow['name']);
            $game->setTrailer_url($gRow['trailer_url']);
            $game->setDescription($gRow['description']);
            
            
            
            $st2 = $this->conn->prepare("select c.console_id, c.name from tb_game_console gc, tb_console c where gc.console_id = c.console_id and gc.game_id = ?");
            $st2->bindParam(1, $game_id);
            $st2->execute();
            
            $consoles = $st2->fetchAll();
            
            foreach ($consoles as $console){
                $console_name = $console['name'];
                $console_id = $console['console_id'];
                
                $consoleEnt = new Console();
                $consoleEnt->setConsole_id($console_id);
                $consoleEnt->setName($console_name);
                
                $game->addConsole($consoleEnt);
                
                
                
            }
            
            $st3 = $this->conn->prepare("select picture_url from tb_game_pictures where game_id = ?");
            $st3->bindParam(1, $game_id);
            $st3->execute();
            
            $pictures = $st3->fetchAll();
            
            foreach ($pictures as $picture){
                
                
                $game->addPicture($picture['picture_url']);
                
            }
            
            return $game;
            
        } catch (PDOException $e) {
            return null;
            echo $e->getMessage();
        }

       
        
    }
    
      public function getGames(){
        
        
        $games = array();


        try {
            $statement = $this->conn->prepare("select game_id, name, trailer_url, description from tb_game");
            $statement->execute();
            $reults = $statement->fetchAll();
            
            foreach ($reults as $gRow) {
            $game = new Game();
                $game_id = $gRow['game_id'];
                
            $game->setGame_id($game_id);
            $game->setName($gRow['name']);
            $game->setTrailer_url($gRow['trailer_url']);
            $game->setDescription($gRow['description']);
          
            
            $st2 = $this->conn->prepare("select c.console_id, c.name from tb_game_console gc, tb_console c where gc.console_id = c.console_id and gc.game_id = ?");
            $st2->bindParam(1, $game_id);
            $st2->execute();
            
            $consoles = $st2->fetchAll();
            
            foreach ($consoles as $console){
                $console_name = $console['name'];
                $console_id = $console['console_id'];
                
                $consoleEnt = new Console();
                $consoleEnt->setConsole_id($console_id);
                $consoleEnt->setName($console_name);
                
                $game->addConsole($consoleEnt);
                
                
                
            }
            
            $st3 = $this->conn->prepare("select picture_url from tb_game_pictures where game_id = ?");
            $st3->bindParam(1, $game_id);
            $st3->execute();
            
            $pictures = $st3->fetchAll();
            
            foreach ($pictures as $picture){
                
                
                $game->addPicture($picture['picture_url']);
                
            }
            
            $games [] = $game;
          
            }
            
            return $games;
            
        } catch (PDOException $e) {
            return null;
            echo $e->getMessage();
        }

       
        
    }
    
    
   

}

?>
