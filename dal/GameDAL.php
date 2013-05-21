<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'entities/Game.php';
require_once 'entities/Console.php';
require_once 'entities/DBConnection.php';
require_once 'dal/GameDAL.php';

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

    public function importJson() {

        

        $str_datos = file_get_contents("games.json");
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

                //check console existence
                //recover console name
                //create console

                /* CHANGE THIS */
                $csl = new Console();
                $csl->setConsole_id($console);
                $csl->setName("consola");
                /* UNTIL THIS */


                //add console
                $game->addConsole($csl);
            }



            $this->gameAdd($game);
        }
    }

}

?>
