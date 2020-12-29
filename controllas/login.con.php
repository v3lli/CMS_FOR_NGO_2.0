<?php

require "../config/Database.php";
require "../models/User.php";


// require_once("posts.php");
// $query = "Select * from content";
// $result = mysqli_query($conn,$query);

if (isset($_POST["submit_log"])) {

    $pw = $_POST["pw_log"];
    $email = $_POST["email_log"];
    $curloc = $_POST["url_log"];

    if (empty($pw) || empty($email)){
        header("Location:" . $curloc . "?error=emptyfields");
        exit();
    } else {
        $data = array(
                "password" => $pw,
                "email" => $email
        );
        $data = json_encode($data);

//        if (!mysqli_stmt_prepare($stmt, $query)) {
//            header("Location:" . $curloc . "?error=sqlerror");
//            exit();
//        } else {
//            mysqli_stmt_bind_param($stmt, "ss", $uname, $uname);
//            mysqli_stmt_execute($stmt);
//            $result = mysqli_stmt_get_result($stmt);
//            while ($row = mysqli_fetch_assoc($result)) {
                if (
                        $pwc = password_verify($pw, $row['password'])
                ) {
                    session_start();
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['namefirst'] = $row['namefirst'];
                    $_SESSION['namefirst'] = $row['namelast'];

                }
                else {
                    header("Location:" . $url . "?error=wrongpw");
                    exit();
                }
            }

        }
    }
    //  = $userid;
    //  = $userfname;
    // $_SESSION['namelast'] = $userlname;
    // $_SESSION['username'] = $uzaname;
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
    header("Location:" . $url);

}

