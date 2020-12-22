<?php


class Comment
{

    private $conn;
    private $table = "comment_test";
    public $id;
    public $user_id;
    public $art_id;
    public $body;
    public $create_date;


    public function __construct($db){
        $this->conn = $db;
    }

}