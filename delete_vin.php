<?php
session_start();

require('dbconnect.php');
$bdd = dbconnect();

if (isset($_GET['id'])) {
    if (is_numeric($_GET['id'])) {

        $req = $bdd->prepare('DELETE FROM vins WHERE id=' . $_GET['id']);
        $req->execute(array(
            'id' => $_GET['id']
        ));
    } else {
        echo 'erreur sur id';
?>
        <a href="./editionVinsHTML.php"> revenir sur page d'edition</a>
<?php die;
    }
}


header('Location: index.php');
exit;
