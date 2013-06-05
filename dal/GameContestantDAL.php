<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ChoiceDAL
 *
 * @author JuanGa
 *
 * 
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/gamers_paradise/' . 'entities/DBConnection.php';

class GameUserDAL {


    private $conn;

    function __construct() {
        $connection = new DBConnection();
        $this->conn = $connection->getConnection();
    }

    public function saveContestantGame($uid, $game, $console) {

        try {
            $statement = $this->conn->prepare("SELECT contestant_id from tb_game_contestant where contestant_id = ?");
            $statement->bindParam(1, $uid);
            $statement->execute();

            $result = $statement->fetch();

            $contestant_id = $result['contestant_id'];

            if ($contestant_id == $uid) {
                $statement = $this->conn->prepare("UPDATE tb_game_contestant SET game_id = ?, console_id = ? where contestant_id = ?");
                $statement->bindParam(1, $game);
                $statement->bindParam(2, $console);
                $statement->bindParam(3, $uid);
                $statement->execute();
            } else {
                $statement = $this->conn->prepare("INSERT INTO tb_game_contestant (contestant_id, game_id, console_id) values (?, ?, ?)");
                $statement->bindParam(1, $uid);
                $statement->bindParam(2, $game);
                $statement->bindParam(3, $console);
                $statement->execute();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?>
