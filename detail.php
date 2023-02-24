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
    }

} else {

    $_SESSION['erreur'] = "URL invalide";
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<?php

include_once('head.php');

?>

<body>

    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>Produit : <?= $produit['produit'] ?></h1>
                <h2>Référence : <?= $produit['reference'] ?></h2>
                <h3>Description : </h3>
                <p><?= $produit['descriptif'] ?></p>
                <h4>Prix : <?= $produit['prix'] ?>€</h4>
                <h4>Quantité disponible : <?= $produit['quantite'] ?></h4>
                <p><a href="index.php">Retour</a> <a href="edit.php?id=<?= $produit['id']  ?>">Modifier</a></p>

            </section>
        </div>
    </main>
    
</body>
</html>

