<?php
    $user = '';
    $password = '';
    $db = '';
    $host = 'localhost';
    $dsn = 'mysql:host='.$host.';dbname='.$db;
    $pdo = new PDO($dsn, $user, $password);
?>