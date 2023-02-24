<?php

// On démarre un session
session_start();

// Est ce que l'Id existe et n'est pas vide
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once('connexion.php');
    // On nettoie l'id envoyé
    $id = strip_tags($_GET['id']);
    $sql = 'SELECT * FROM `articles` WHERE `id` = :id;';
    // On prépare la requête
    $query = $db->prepare($sql);
    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    // On exécute la requête
    $query->execute();
    // On récupère le produit
    $produit = $query->fetch();
    // On vérifie si le produit existe

    if(!$produit) {
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: index.php');
        die();
    }

     

       $sql = 'DELETE FROM `articles` WHERE `id` = :id;';
       // On prépare la requête
       $query = $db->prepare($sql);
       // On "accroche" les paramètre (id)
       $query->bindValue(':id', $id, PDO::PARAM_INT);
       // On exécute la requête
       $query->execute();

       $_SESSION['message'] = "Article supprimé";
        header('Location: index.php');

} else {

    $_SESSION['erreur'] = "URL invalide";
    header('Location: index.php');
}
