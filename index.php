<?php

// On démarre un session
session_start();

// On Inclut la connexion à la base

require_once('connexion.php');

// On prépare la requête

$sql = 'SELECT * FROM articles';

$query = $db->prepare($sql);

// On execute la requête

$query->execute();

// On stocke la requête dans un tableau

$result = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('close.php');

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des articles</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>

    <main class="container">
        <div class="row">
            <section class="col-12">
                <?php
                    
                    if(!empty($_SESSION['erreur'])) {
                        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['erreur'] . 

                        '</div>';
                        $_SESSION['erreur'] = "";
                    }
                    
                    if(!empty($_SESSION['message'])) {
                        echo '<div class="alert alert-success" role="alert">' . $_SESSION['message'] . 

                        '</div>';
                        $_SESSION['message'] = "";
                    }

                ?>
                <h1>Liste des articles</h1>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        // On boucle sur la variable result
                        foreach($result as $produit) {
                        ?>
                        <tr>
                            <td><?= $produit['id'] ?></td>
                            <td><?= $produit['produit'] ?></td>
                            <td><?= $produit['quantite'] ?></td>
                            <td><?= $produit['prix'] ?>€</td>
                            <td><a href="detail.php?id=<?= $produit['id'] ?>">Voir</a> <a href="edit.php?id=<?= $produit['id'] ?>">Modifier</a></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="add.php" class="btn btn-primary">Ajouter un nouvel article</a>
            </section>
        </div>
    </main>

    
</body>
</html>