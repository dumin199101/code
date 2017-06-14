<?php 
    $jsonpCallback = $_GET['callback'];
    
    $data = [
       [
        'username'=>'dumin',
        'age'=>23
       ],
       [
        'username'=>'lieyan',
        'age'=>22
       ]
    ];
    echo $jsonpCallback . '(' . json_encode($data) . ')';
    // echo $jsonpCallback . '(' . json_encode($_GET) . ')';