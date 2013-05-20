<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Question
 *
 * @author Kevin
 */
class Question {
    //put your code here
    private $quiestion_id;
    private $text;
    private $type_multiple;
    
    private $choices;
            
    function __construct() {
        $this->quiestion_id=0;
        $this->text="";
        $this->type_multiple=false;
        
        $this->choices = array();
    }
    
    public function getQuiestion_id() {
        return $this->quiestion_id;
    }

    public function setQuiestion_id($quiestion_id) {
        $this->quiestion_id = $quiestion_id;
    }

    public function getText() {
        return $this->text;
    }

    public function setText($text) {
        $this->text = $text;
    }

    public function getType_multiple() {
        return $this->type_multiple;
    }

    public function setType_multiple($type_multiple) {
        $this->type_multiple = $type_multiple;
    }
    
    public function addChoice($choice){
        $this->choices[] = $choice;
    }
    
    public function getChoices() {
        return $this->choices;
    }


    
    



    
}

?>
