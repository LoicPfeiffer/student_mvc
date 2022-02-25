<?php
$bdd = new PDO($dsn = 'mysql:host=localhost;dbname=student;', 'Loic', 'abc');
$allusers = $bdd->query('SELECT * FROM student ORDER BY id DESC');
if (isset($_GET['r']) and !empty($_GET['r'])) {
    $recherche = htmlspecialchars($_GET['r']);
    $allusers = $bdd->query('SELECT firstname FROM student WHERE firstname LIKE "%' . $recherche . '%" ORDER BY id DESC');
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Recherche BDD</title>
</head>

<body>

    <form methode="GET">
        <input type="recherche" name="r" placeholder="Rechercher un Utilisateur">
        <input type="submit" name="Envoyer">
    </form>

    <section class="afficher_utilisateur">
        <?php
        if ($allusers->rowCount() > 0) {
            while ($student = $allusers->fetch()) {
        ?>
                <p><?= $student['firstname']; ?></p>
            <?php
            }
        } else {
            ?>
            <p>Aucun Utilisateur trouvé</p>
        <?php

        }
        ?>

    </section>

</body>

</html>