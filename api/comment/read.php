<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json');

//include model and db
include_once '../../config/Database.php';
include_once '../../models/Comment.php';

//init and connect
$database = new Database();
$db = $database->connect();

//comment instance
$comment = new Comment($db);

// Get ID
$comment->art_id = isset($_GET['id']) ? $_GET['id'] : die();

//query
$res = $comment->read();

//count
$number = $res->rowCount();

if ($number > 0){

    $comment_list = array();
    while($row = $res->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $commentListItem = array(
            'id' => $id,
            'user_id' => $user_id,
            'art_id' => $art_id,
            'body' => $body,
            'created_at' => $created_at
        );
        array_push($comment_list, $commentListItem);
        var_dump( json_encode($comment_list));
    }
}else{
    return json_encode(
        array('message' => 'No Comments Found')
    );
}


