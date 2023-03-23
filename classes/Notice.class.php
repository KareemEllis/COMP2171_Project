<?php

class Notice {
    private $noticeID;
    private $author;
    private $postDate;
    private $noticeDetails;

    public function __construct($noticeID, $author, $postDate, $title, $date, $time, $location, $description) {
        $this->noticeID = $noticeID;
        $this->author = $author;
        $this->postDate = $postDate;
        $this->noticeDetails = new NoticeDetails($title, $date, $time, $description, $location);
    }

    // Getter methods
    public function getNoticeID() {
        return $this->noticeID;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getPostDate() {
        return $this->postDate;
    }

    public function getNoticeDetails() {
        return $this->noticeDetails;
    }

    // Setter methods
    public function setNoticeID($noticeID) {
        $this->noticeID = $noticeID;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setPostDate($postDate) {
        $this->postDate = $postDate;
    }

    public function setNoticeDetails($title, $date, $time, $description, $location) {
        $noticeDetails = $this->getNoticeDetails();
        $noticeDetails->setTitle($title);
        $noticeDetails->setDate($date);
        $noticeDetails->setTime($time);
        $noticeDetails->setDescription($description);
        $noticeDetails->setLocation($location);
        $this->noticeDetails = $noticeDetails;
    }
}


?>