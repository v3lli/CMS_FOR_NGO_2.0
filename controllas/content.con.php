<?php

//     $url = 'http://localhost:8888/rviii/api/post/read.php';
//     $options = [
//         'http'=>[
//             'method' => 'GET',
//             'header' => "Content-type: application/json\r\n"
//         ],
//     ];
//     $context = stream_context_create($options);
//     $res = file_get_contents($url,false, $context);
//     $beans = json_decode($res);
//     $beans["body"];

function get_banner_content(){
    $ch = curl_init();
    $url = 'http://localhost:8888/rviii/api/post/read.php';
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Access-Control-Allow-Origin: *',
        'Content-Type: application/json'
    ]);
    $res = json_decode(curl_exec($ch));
//    var_dump($res[0]->spread);
    curl_close($ch);
    return $res;
}