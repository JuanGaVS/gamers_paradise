<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contestants
 *
 * @author Kevin
 */
class Contestant {
    //put your code here
    
    private $contestant_id;
    private $first_name;
    private $last_name;
    private $gender;
    private $locale;
    private $birthday;
    private $date_added;
    
    function __construct() {
        $this->birthday = "1";
        $this->contestant_id="1";
        $this->date_added="1";
        $this->first_name="1";
        $this->gender="1";
        $this->last_name="1";
        $this->locale="1";
    }
    
    public function getContestant_id() {
        return $this->contestant_id;
    }

    public function setContestant_id($contestant_id) {
        $this->contestant_id = $contestant_id;
    }

    public function getFirst_name() {
        return $this->first_name;
    }

    public function setFirst_name($first_name) {
        $this->first_name = $first_name;
    }

    public function getLast_name() {
        return $this->last_name;
    }

    public function setLast_name($last_name) {
        $this->last_name = $last_name;
    }

    public function getGender() {
        return $this->gender;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function getLocale() {
        return $this->locale;
    }

    public function setLocale($locale) {
        $this->locale = $locale;
    }

    public function getBirthday() {
        return $this->birthday;
    }

    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

    public function getDate_added() {
        return $this->date_added;
    }

    public function setDate_added($date_added) {
        $this->date_added = $date_added;
    }

    

    
}

?>
