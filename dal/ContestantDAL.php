<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContestantDAL
 *
 * @author Kevin
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/gamers_paradise/' . 'entities/Contestant.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/gamers_paradise/' . 'entities/DBConnection.php';



class ContestantDAL {

    //put your code here

    public function contestantAdd(Contestant $contestant) {
        $connection = new DBConnection();
        $conn = $connection->getConnection();
        try {
            $statement = $conn->prepare("INSERT INTO tb_contestant (contestant_id, first_name,last_name, gender, locale,birthday, date_added) values (?, ?, ?, ?, ?, ?, ?)");
            $statement->bindParam(1, $contestant->getContestant_id());
            $statement->bindParam(2, $contestant->getFirst_name());
            $statement->bindParam(3, $contestant->getLast_name());
            $statement->bindParam(4, $contestant->getGender());
            $statement->bindParam(5, $contestant->getLocale());
            $statement->bindParam(6, $contestant->getBirthday());
            $statement->bindParam(7, $contestant->getDate_added());
			$result = $statement->execute();
			return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /*public function contestantUpdate(Contestant $contestant) {
        $connection = new DBConnection();
        $conn = $connection->getConnection();
        try {
            $statement = $conn->prepare("UPDATE tb_contestants SET first_name = ?, last_name = ?, email = ?, salt = ?, password = ? WHERE contestantname = ?");
            
            $statement->bindParam(1, $contestant->getFirst_name());
            $statement->bindParam(2, $contestant->getLast_name());
            $statement->bindParam(3, $contestant->getEmail());
            $statement->bindParam(4, $contestant->getSalt());
            $statement->bindParam(5, $contestant->getPassword());
            $statement->bindParam(6, $contestant->getContestantname());
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function contestantUpdateWithoutPassword(Contestant $contestant) {
        $connection = new DBConnection();
        $conn = $connection->getConnection();
        try {
            $statement = $conn->prepare("UPDATE tb_contestants SET first_name = ?, last_name = ?, email = ?, salt = ?, WHERE contestantname = ?");
            $statement->bindParam(1, $contestant->getFirst_name());
            $statement->bindParam(2, $contestant->getLast_name());
            $statement->bindParam(3, $contestant->getEmail());
            $statement->bindParam(4, $contestant->getSalt());
            $statement->bindParam(5, $contestant->getContestantname());
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
*/
    public function contestantDelete($contestant_id) {
        $connection = new DBConnection();
        $conn = $connection->getConnection();
        try {
            $statement = $conn->prepare("DELETE tb_contestants WHERE contestant_id = ?");
            $statement->bindParam(1, $contestant_id);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
/*
    public function contestant_login($contestantname, $password) {
        $connection = new DBConnection();
        $conn = $connection->getConnection();

        try {
            $statement = $conn->prepare("select salt, password from tb_contestants where contestantname = ?");
            $statement->bindParam(1, $contestantname);
            $statement->execute();
            $row = $statement->fetch();


            $contestant = new Contestant();

            $salt = $row['salt'];
            $passwordFromDB = $row['password'];
            $hashed_password = $contestant->passwordFromSalt($password, $salt);


            if ($passwordFromDB == $hashed_password) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
*/
    public function getContestants() {
        $connection = new DBConnection();
        $conn = $connection->getConnection();
        try {
            $statement = $conn->prepare("SELECT contestant_id, first_name, last_name, gender, locale, birthday, date_added from tb_contestants");
            $statement->execute();
            $result = $statement->fetchAll();
            return json_encode($result);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?>
