<?php

class NoticeDetails {
    private $title;
    private $date;
    private $time;
    private $description;
    private $location;

    public function __construct(
        $title, $date, $time, $description, $location
    )
    {
        $this->title = $title;
        $this->date = $date;
        $this->time = $time;
        $this->description = $description;
        $this->location = $location;
    }

    //GETTERS
    public function getTitle() {
        return $this->title;
    }
    public function getDate() {
        return $this->date;
    }
    public function getTime() {
        return $this->time;
    }
    public function getDescription() {
        return $this->description;
    }
    public function getLocation() {
        return $this->location;
    }
    
    //SETTERS
    public function setTitle($title) {
        $this->title = $title;
    }
    public function setDate($date) {
        $this->date = $date;
    }
    public function setTime($time) {
        $this->time = $time;
    }
    public function setDescription($description) {
        $this->description = $description;
    }
    public function setLocation($location) {
        $this->location = $location;
    }
}

?>