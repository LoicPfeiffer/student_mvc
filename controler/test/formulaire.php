<?php
$action = filter_var($_SERVER['PHP_SELF'], FILTER_VALIDATE_URL);
$nom = 'nom';
$nom2 = 'description';
$nom3 = 'note';
if (empty($_POST)) {
    //afficher le formulaire
    echo 'formulaire insertion 1'; ?>
    <form method="POST" action="<?= $action ?>">
        <label for name="<?= $nom ?>">Nom</label>
        <input type="text" name="<?= $nom ?>" /><br>
        <label for name="<?= $nom2 ?>">Description</label>
        <input type="text" name="<?= $nom2 ?>" /><br>
        <label for name="<?= $nom3 ?>">Note</label>
        <input type="text" name="<?= $nom3 ?>" /><br>
        <input type="submit" value="envoyer">
    </form>

<?php
} else {




    /*$taille = -1;*/
    /*$poids = -1;*/
    if (isset($_POST[$nom]) && isset($_POST[$nom2]) && isset($_POST[$nom3])) {
        $saisie = $_POST[$nom];
        /*$poids = intval($saisie);*/
        $saisie2 = $_POST[$nom2];
        $saisie3 = floatval($_POST[$nom3]);
        $ok = true;/* Valider le formulaire*/
        if (mb_strlen($saisie) == 0) {
            echo 'Donnée incorrect';
            $ok = false;/*formulaire Invalide*/
        }
        if ($saisie3 <= 0 or $saisie3 > 100) {
            echo 'Donnée incorrect';
            $ok = false;/*formulaire Invalide*/
        }

        if ($ok) {
            /*formulaire Valide*/
            echo 'nom : ' . $saisie . ' nom2 : ' . $saisie2 . ' nom3 : ' . $saisie3;
        }

        /* $taille = intval($saisie);*/
    }
}
?>