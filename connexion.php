<?php

try {
   
    // connexion a la base

    $dbName = 'magasin';
    $dbUser = 'root';
    $dbPassword = '';

    $db = new PDO('mysql:host=localhost;dbname=' . $dbName, $dbUser, $dbPassword);
    $db->exec('SET NAMES "UTF8"');

} catch (PDOException $e) {

   die('Erreur :' . $e->getMessage());
   
} 

