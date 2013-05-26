<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserDAL
 *
 * @author Kevin
 */
require_once '../entities/User.php';
require_once '../entities/Console.php';
require_once '../entities/DBConnection.php';
require_once '../dal/UserDAL.php';


class UserDAL {

    //put your code here

    public function userAdd(User $user) {
        $connection = new DBConnection();
        $conn = $connection->getConnection();
        try {
            $statement = $conn->prepare("INSERT INTO tb_users (username, first_name, last_name, email, salt, password) values (?, ?, ?, ?, ?, ?)");
            $statement->bindParam(1, $user->getUsername());
            $statement->bindParam(2, $user->getFirst_name());
            $statement->bindParam(3, $user->getLast_name());
            $statement->bindParam(4, $user->getEmail());
            $statement->bindParam(5, $user->getSalt());
            $statement->bindParam(6, $user->getPassword());
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function userUpdate(User $user) {
        $connection = new DBConnection();
        $conn = $connection->getConnection();
        try {
            $statement = $conn->prepare("UPDATE tb_users SET first_name = ?, last_name = ?, email = ?, salt = ?, password = ? WHERE username = ?");
            
            $statement->bindParam(1, $user->getFirst_name());
            $statement->bindParam(2, $user->getLast_name());
            $statement->bindParam(3, $user->getEmail());
            $statement->bindParam(4, $user->getSalt());
            $statement->bindParam(5, $user->getPassword());
            $statement->bindParam(6, $user->getUsername());
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function userUpdateWithoutPassword(User $user) {
        $connection = new DBConnection();
        $conn = $connection->getConnection();
        try {
            $statement = $conn->prepare("UPDATE tb_users SET first_name = ?, last_name = ?, email = ?, salt = ?, WHERE username = ?");
            $statement->bindParam(1, $user->getFirst_name());
            $statement->bindParam(2, $user->getLast_name());
            $statement->bindParam(3, $user->getEmail());
            $statement->bindParam(4, $user->getSalt());
            $statement->bindParam(5, $user->getUsername());
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function userDelete($username) {
        $connection = new DBConnection();
        $conn = $connection->getConnection();
        try {
            $statement = $conn->prepare("DELETE tb_users WHERE username = ?");
            $statement->bindParam(1, $username);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function user_login($username, $password) {
        $connection = new DBConnection();
        $conn = $connection->getConnection();

        try {
            $statement = $conn->prepare("select salt, password from tb_users where username = ?");
            $statement->bindParam(1, $username);
            $statement->execute();
            $row = $statement->fetch();


            $user = new User();

            $salt = $row['salt'];
            $passwordFromDB = $row['password'];
            $hashed_password = $user->passwordFromSalt($password, $salt);


            if ($passwordFromDB == $hashed_password) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getUsers() {
        $connection = new DBConnection();
        $conn = $connection->getConnection();
        try {
            $statement = $conn->prepare("SELECT username, first_name, last_name, email from tb_users");
            $statement->execute();
            $result = $statement->fetchAll();
            return json_encode($result);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?>
