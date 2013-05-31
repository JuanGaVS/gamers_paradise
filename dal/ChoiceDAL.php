<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ChoiceDAL
 *
 * @author Kevin
 */
require_once '../entities/Choice.php';
require_once '../entities/DBConnection.php';
require_once './GameDAL.php';

class ChoiceDAL {

    //put your code here

    private $choice;
    private $games_id;
    
    private $conn;

    function __construct() {
        $this->games_id = array();
        $this->conn = new DBConnection();
    }

    public function getChoice() {
        return $this->choice;
    }

    public function setChoice($choice) {
        $this->choice = $choice;
    }

    public function getGames_id() {
        return $this->games_id;
    }

    public function setGames_id($games_id) {
        $this->games_id = $games_id;
    }

    public function getGamesFromChoice($choice) {
        $cid = $choice->getChoice_id();

        $games = array();
        
        try {
            $statement = $this->conn->prepare("select game_id from tb_choice_game where choice_id = ?");
            $statement->bindParam(1, $cid);
            $statement->execute();
            
            $result = $statement->fetchAll();

            foreach ($result as $row) {
                $gID = $row['game_id'];
                
                
                $gameDAL = new GameDAL();
                
                $game = $gameDAL->getGame($gID);
                $games[] = $game;
                
                
            }
            
            
            
            return $games;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?>
