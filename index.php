<?php

// On démarre un session
session_start();

// On Inclut la connexion à la base

require_once('connexion.php');

// On prépare la requête

$sql = 'SELECT * FROM articles ORDER BY produit ASC';

$query = $db->prepare($sql);

// On execute la requête

$query->execute();

// On stocke la requête dans un tableau

$result = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('close.php');

?>

<!DOCTYPE html>
<html lang="fr">

<?php

include_once('head.php')

?>

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
                            <td> <a href="./detail.php?id=<?= $produit['id'] ?>" class="link-primary"> <?= $produit['produit'] ?></a></td>
                            <td><?= $produit['quantite'] ?></td>
                            <td><?= $produit['prix'] ?>€</td>
                            <td>
                            
                            <!-- <button class="edit btn btn btn-warning" data-id="<?= $produit['id'] ?>">Modifer</button> -->
                            
                            <button class="delete btn btn-danger" data-id="<?= $produit['id'] ?>" data-produit="<?= $produit['produit'] ?>">Supprimer</button>

                            </td>
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

    <script src="script.js"></script>
    
</body>
</html>