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
