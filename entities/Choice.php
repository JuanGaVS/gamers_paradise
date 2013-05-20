<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Choice
 *
 * @author Kevin
 */
class Choice {
    //put your code here
    
    private $choice_id;
    private $text;
    
    function __construct() {
        $this->choice_id=0;
        $this->text="";
    }
    
    public function getChoice_id() {
        return $this->choice_id;
    }

    public function setChoice_id($choice_id) {
        $this->choice_id = $choice_id;
    }

    public function getText() {
        return $this->text;
    }

    public function setText($text) {
        $this->text = $text;
    }



    
}

?>
