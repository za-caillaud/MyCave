<?php
session_start();

require('dbconnect.php');
$bdd = dbconnect();


$req = $bdd->prepare('DELETE FROM vins WHERE id=' . $_GET['id']);
$req->execute(array(
    'id' => $_GET['id']
));

header('Location: index.php');
exit;
