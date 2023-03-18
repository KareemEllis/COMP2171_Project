<?php

class NoticeBoard {
    private $db;
    private $noticeList;

    public function __construct() {
        $this->db = new DB();
        $this->noticeList = array();
    }

    // Getter method for noticeList
    public function getNoticeList() {
        return $this->noticeList;
    }

    // Method to get all notices
    public function getAllNotices() {
        // TODO: Implement method to get all notices
    }

    // Method to find a notice by ID
    public function findNotice($noticeID) {
        // TODO: Implement method to find a notice by ID
    }

    // Method to add a new notice
    public function addNotice($title, $date, $time, $description, $location, $author, $postDate) {
        // TODO: Implement method to add a new notice
    }

    // Method to delete a notice by ID
    public function deleteNotice($noticeID) {
        // TODO: Implement method to delete a notice by ID
    }

    // Method to update the details of a notice by ID
    public function updateNoticeDetails($noticeID, $title, $date, $time, $description, $location) {
        // TODO: Implement method to update the details of a notice by ID
    }

    // Method to display all notices
    public function displayNotices() {
        // TODO: Implement method to display all notices
    }
}

?>