<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Game
 *
 * @author Kevin
 */
class Game {

    //put your code here

    private $game_id;
    private $name;
    private $trailer_url;
    private $description;
    private $consoles;
    private $pictures;
    private $contestants;

    function __construct() {
        $this->game_id = 0;
        $this->name = "";
        $this->trailer_url = "";
        $this->description = "";

        $this->consoles = array();
        $this->pictures = array();
        $this->contestants = array();
    }

    public function addConsole(Console $console) {
        $this->consoles[] = $console;
    }

    public function addPicture($picture_url) {
        $this->pictures[] = $picture_url;
    }

    /* public function addContestant($contestant, $console){
      $this->contestants[] = {$contestant,$console};
      } */

    public function setGame_id($game_id) {
        $this->game_id = $game_id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setTrailer_url($trailer_url) {
        $this->trailer_url = $trailer_url;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setPictures($pictures) {
        $this->pictures = $pictures;
    }

    
    public function getGame_id() {
        return $this->game_id;
    }

    public function getName() {
        return $this->name;
    }

    public function getTrailer_url() {
        return $this->trailer_url;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getConsoles() {
        return $this->consoles;
    }

    public function getPictures() {
        return $this->pictures;
    }

    public function getContestants() {
        return $this->contestants;
    }
    
    public function getFirstPicture(){
        return $this->pictures[0];
    }
    
   
    
 

}

?>
