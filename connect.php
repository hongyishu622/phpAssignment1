<?php

try {
    $dsn = 'mysql:host = 172.31.22.43; dbname = Hongyi200382190';
    $username = 'Hongyi200382190';
    $password = 'yUxyGF0SvS';

    $db = new PDO($dsn, $username, $password);



}
catch (PDOException $e){
    $error_message = $e -> getMessage();
    echo 'Something wrong happened' . $error_message ;
}