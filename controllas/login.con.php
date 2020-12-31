<?php

require "../config/Database.php";
require "../models/User.php";
session_start();
if(isset($_POST["Login"]))
{

    $pw = $_POST["pass_log"];
    $email = $_POST["email_log"];
    if(isset($_POST["url_log"]))
    {
        $curloc = $_POST["url_log"];
    }
    else{
        $curloc = $_SESSION['homepage'];
    }
    if (empty($email) || empty($password))
    {
        header("Location:" . $curloc . "?error=emptyfields");
        exit();
    }else {
        $data = array(
            'password' => $pw,
            'email' => $email
        );

        $ch = curl_init();
        $url = 'http://localhost:8888/rviii/api/user/login.php';
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Access-Control-Allow-Origin: *',
            'Content-Type: application/json'
        ]);
        if(curl_exec($ch)){
            header("Location:" . $curloc);
            }
        }
        curl_close($ch);
    }





