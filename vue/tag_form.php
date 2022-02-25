<?php
$action = "index.php?table=tag&op=update&id=$id";
$action1 = "index.php?table=tag&op=update&id=$id";

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



<form method="POST" action1="">
    Rechercher un mot : <input type="text" name="recherche">
    <input type="SUBMIT" value="Search!">
</form>