<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GameConstestants
 *
 * @author Kevin
 */
class GameConstestant {
    //put your code here
    private $contestant;
    private $game;
    private $console;
    
   
    
    public function getContestant() {
        return $this->contestant;
    }

    public function setContestant($contestant) {
        $this->contestant = $contestant;
    }

    public function getGame() {
        return $this->game;
    }

    public function setGame($game) {
        $this->game = $game;
    }

    public function getConsole() {
        return $this->console;
    }

    public function setConsole($console) {
        $this->console = $console;
    }





}

?>
