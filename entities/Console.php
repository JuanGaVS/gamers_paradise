<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Console
 *
 * @author Kevin
 */
class Console {
    //put your code here
    
    private $console_id;
    private $name;
    
    function __construct() {
        $this->console_id = "";
        $this->name = "";
    }
    
    public function getConsole_id() {
        return $this->console_id;
    }

    public function setConsole_id($console_id) {
        $this->console_id = $console_id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }



    
}

?>
