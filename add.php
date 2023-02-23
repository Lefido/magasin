<?php

// On démarre un session
session_start();

if($_POST) {

    if(isset($_POST['produit']) && !empty($_POST['produit']) &&
    isset($_POST['reference']) && !empty($_POST['reference']) &&
    isset($_POST['descriptif']) && !empty($_POST['descriptif']) &&
    isset($_POST['quantite']) && !empty($_POST['quantite']) &&
    isset($_POST['prix']) && !empty($_POST['prix'])) {

        // On Inclut la connexion à la base
        require_once('connexion.php');

        // On nettoie les données envoyées
        $produit = strip_tags($_POST['produit']);
        $reference = strip_tags($_POST['reference']);
        $descriptif = strip_tags($_POST['descriptif']);
        $quantite = strip_tags($_POST['quantite']);
        $prix = strip_tags($_POST['prix']);

        $sql = 'INSERT INTO `articles` (`produit`, `reference`, `descriptif`, `quantite`, `prix`) VALUES (:produit , :reference, :descriptif, :quantite, :prix);';

        $query = $db->prepare($sql);

        $query->bindValue(':produit', $produit, PDO::PARAM_STR);
        $query->bindValue(':reference', $reference, PDO::PARAM_STR);
        $query->bindValue(':descriptif', $descriptif, PDO::PARAM_STR);
        $query->bindValue(':quantite', $quantite, PDO::PARAM_INT);
        $query->bindValue(':prix', $prix, PDO::PARAM_STR);

        $query->execute();

        $_SESSION['message'] = "Produit ajouté";

        require_once('close.php');
        
        header('Location: index.php');
       
        

    } else {
        $_SESSION['erreur'] = "Le formulaire est imcomplet";
    }
    
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>
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

                ?>
                <h1>Ajouter un article</h1>
                <form method="post">

                    <div class="form-group">
                        <label for="produit">Produit</label>
                        <input type="text" id="produit" name="produit" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="reference">Référence</label>
                        <input type="text" id="reference" name="reference" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="descriptif">Description</label>
                        <textarea type="text" id="descriptif" name="descriptif" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="quantite">Quantité</label>
                        <input type="number" id="quantite" name="quantite" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="prix">Prix</label>
                        <input type="number" id="prix" name="prix" step="0.01" class="form-control">
                    </div>

                   
                    <button class="btn btn-primary form-control">Enregistrer</button>
                    
                </form>
            </section>
        </div>
    </main>

    
</body>
</html>