<?php

$dsn="mysql:dbname=carreiras; host=localhost";
$user="root";
$pass="";
    
    try {
        $pdo=new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $e) {
        echo "erro: ".$e->getMessage();
    }
?>