<?php
$nom = 'nom';
$nom2 = 'description';
$nom3 = 'note';
require_once('vue/head.php');

if ($op === 'delete') {
    if ($id > 0) {
        $tag->delete($id);
        $tags = $tag->all();
        require_once('vue/tag_supprimer.php');
        require_once('vue/tag_liste.php');
    }
} elseif ($op === 'insert' or $op === "update") {
    if (empty($_POST)) {
        //afficher le formulaire
        echo 'formulaire insertion';
        if ($op === "insert")
            $id = 0;
        require_once("vue/tag_form.php");
    } else {
        //valider et filtré le formulaire
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
                if ($id > 0) {
                    $tag->select($id);
                }
                echo 'nom : ' . $saisie . ' nom2 : ' . $saisie2 . ' nom3 : ' . $saisie3;
                $tag->name = $saisie;
                $tag->description = $saisie2;
                $tag->note = $saisie3;
                if ($id === 0) {
                    $tag->insert();
                } else {
                    $tag->update();
                }
                $tags = $tag->all();
            }

            /* $taille = intval($saisie);*/
        }

        //si le formulaire est valide, inseré les données

    }

    $tags = $tag->all();
    require_once('vue/tag_liste.php');
} else {
    $tags = $tag->all();
    require_once('vue/tag_liste.php');
}
