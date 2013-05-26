<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QuestionDAL
 *
 * @author Kevin
 */
require_once 'entities/Question.php';
require_once 'entities/Choice.php';
require_once 'entities/Console.php';
require_once 'entities/DBConnection.php';

class QuestionDAL {

    //put your code here

    private $conn;

    function __construct() {
        $connection = new DBConnection();
        $this->conn = $connection->getConnection();
    }

    public function questionAdd(Question $question) {

        $question_id = $question->getQuestion_id();


        try {
            $statement = $this->conn->prepare("INSERT INTO tb_question (question_id, text, type_multiple) values (?, ?, ?)");
            $statement->bindParam(1, $question->getQuestion_id());
            $statement->bindParam(2, $question->getText());
            $statement->bindParam(3, $question->getType_multiple());
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $choices = $question->getChoices();


        foreach ($choices as $choice) {

            try {

                $statement = $this->conn->prepare("INSERT INTO tb_choices (text) values (?)");
                $statement->bindParam(1, $choice->getText());
                $statement->execute();

                $choice_id = $this->conn->lastInsertId('choice_id');

                $statement2 = $this->conn->prepare("INSERT INTO tb_question_choice (question_id, choice_id) values (?, ?)");
                $statement2->bindParam(1, $question_id);
                $statement2->bindParam(2, $choice_id);
                $statement2->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

    /*
      public function questionUpdate(Question $question) {

      $question_id = $question->getQuestion_id();


      try {
      $statement = $this->conn->prepare("UPDATE tb_question set name = ?, trailer_url = ?, description = ? where question_id = ?");
      $statement->bindParam(1, $question->getName());
      $statement->bindParam(2, $question->getTrailer_url());
      $statement->bindParam(3, $question->getDescription());
      $statement->bindParam(4, $question->getQuestion_id());
      $statement->execute();
      } catch (PDOException $e) {
      echo $e->getMessage();
      }

      $consoles = $question->getConsoles();
      $pictures = $question->getPictures();

      //$contestants = $question->getContestants();

      try {

      $statement = $this->conn->prepare("DELETE tb_question_console where question_id = ?");
      $statement->bindParam(1, $question_id);
      $statement->execute();
      } catch (PDOException $e) {
      echo $e->getMessage();
      }

      foreach ($consoles as $console) {

      try {

      $statement2 = $this->conn->prepare("INSERT INTO tb_question_console (question_id, console_id) values (?, ?)");
      $statement2->bindParam(1, $question_id);
      $statement2->bindParam(2, $console->getConsole_id());
      $statement2->execute();
      } catch (PDOException $e) {
      echo $e->getMessage();
      }
      }


      try {

      $statement = $this->conn->prepare("DELETE tb_question_pictures where question_id = ?");
      $statement->bindParam(1, $question_id);
      $statement->execute();
      } catch (PDOException $e) {
      echo $e->getMessage();
      }

      foreach ($pictures as $picture) {

      try {



      $statement2 = $this->conn->prepare("INSERT INTO tb_question_pictures (question_id, picture_url) values (?, ?)");
      $statement2->bindParam(1, $question_id);
      $statement2->bindParam(2, $picture);
      $statement2->execute();
      } catch (PDOException $e) {
      echo $e->getMessage();
      }
      }
      }

      public function questionDelete($question_id) {


      try {

      $statement = $this->conn->prepare("DELETE tb_question_console where question_id = ?");
      $statement->bindParam(1, $question_id);
      $statement->execute();

      $statement2 = $this->conn->prepare("DELETE tb_question_pictures where question_id = ?");
      $statement2->bindParam(1, $question_id);
      $statement2->execute();

      $statement3 = $this->conn->prepare("DELETE tb_question where question_id = ?");
      $statement3->bindParam(1, $question_id);
      $statement3->execute();

      } catch (PDOException $e) {
      echo $e->getMessage();
      }



      }

      public function importJson() {



      $str_datos = file_get_contents("questions.json");
      $datos = json_decode($str_datos, true);

      foreach ($datos["questions"] as $question) {

      $id = $question["id"];
      $name = $question["name"];
      $trailer_url = $question["trailer_url"];
      $description = $question["description"];
      $consoles = $question["consoles"];
      $pictures = $question["pictures"];

      $question = new Question();

      $question->setQuestion_id($id);
      $question->setName($name);
      $question->setDescription($description);
      $question->setTrailer_url($trailer_url);
      $question->setPictures($pictures);

      foreach ($consoles as $console) {

      //check console existence
      //recover console name
      //create console

      /* CHANGE THIS */
    /* $csl = new Console();
      $csl->setConsole_id($console);
      $csl->setName("consola");
      /* UNTIL THIS */

    //add console
    /* $question->addConsole($csl);
      }



      $this->questionAdd($question);
      }
      } */

    public function getQuestions() {

        $questions = array();
        
        try {
            $statement = $this->conn->prepare("SELECT question_id, text, type_multiple from tb_question");
            $statement->execute();
            $result = $statement->fetchAll();

            foreach ($result as $row) {

                $question = new Question();
                
                $question->setQuestion_id($row['question_id']);
                $question->setText($row['text']);
                $question->setType_multiple($row['type_multiple']);
                
                
                
                $statement = $this->conn->prepare("select c.choice_id cid, text from tb_choices c, tb_question_choice qc where c.choice_id = qc.choice_id and qc.question_id = ? ");
                $statement->bindParam(1, $row['question_id']);
                $statement->execute();
                $choices = $statement->fetchAll();
                
                foreach ( $choices as $choice ){
                    $choiceObject = new Choice();
                    
                    
                    $choiceObject->setChoice_id( $choice['cid'] );
                    $choiceObject->setText( $choice['text'] );
                    
                    
                    $question->addChoice($choiceObject);
                    
                }
                
                $questions[] = $question;
                
                
                
                
            }

            return $questions;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?>
