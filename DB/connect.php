<?php 
    include "config/config.php";
    try {
        $conn = new PDO('mysql:host=localhost;dbname=projeto', DBUSER, DBPASS);
    } 
    catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
?>