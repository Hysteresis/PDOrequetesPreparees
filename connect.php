<?php
    $host = 'localhost';
    $dbName = "mizen-db";
    $dbUser = "root";
    $dbPassword = "";

    try {
        $pdo = new PDO('mysql:host=localhost; dbname=mizen-db', 'root','');
    }
    catch (PDOException $e) {
        print "erreur :" .$e->getMessage();
        die();
    }

    
?>