<?php

class GameValue {

    private $game_id;
    private $points;

    function __construct() {
        $this->game_id = 0;
        $this->points = 0;
    }

//Fin de constructor

    public function setGame_id($game_id) {
        $this->game_id = $game_id;
    }

//Fin de function setGame_id.

    public function getGame_id() {
        return $this->game_id;
    }

//Fin de function getGame_id.

    public function setPoints($points) {
        $this->points = $points;
    }

//Fin de function setPoints.

    public function getPoints() {
        return $this->points;
    }

//Fin de function getPoints.

    public function addPoint() {
        $this->points += 1;
    }

//Fin de function addPoint.
}

//Fin de class
?>