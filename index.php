<?php

require_once('modele/connect_bdd.php');

$basedir = dirname($_SERVER['PHP_SELF']);
$baseURI = 'http://localhost/' . $basedir . '/';
require_once('vue/head.php');

/*resetDb();*/

$table = $_GET['table'] ?? '';
$id = ($_GET['id'] ?? -1);
$op = $_GET['op'] ?? '';
$note = $_GET['name'] ?? '';

if ($table === 'tag' || $table === '') {
  require('modele/Tag.php');
  $tag = new Tag();
  require('controler/TagControler.php');
}


require_once('vue/foot.php');
