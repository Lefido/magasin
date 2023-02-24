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

<?php

include_once('head.php');

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
                        <textarea type="text" id="descriptif" name="descriptif" class="form-control" rows="10" cols="10"></textarea>
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

                <button onclick="history.go(-1)" class="btn btn-secondary form-control">Annuler</button>
                    
            </section>
        </div>
    </main>

    <script src="script.js"></script>

</body>
</html>