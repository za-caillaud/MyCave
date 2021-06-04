<?php

// On se connecte à MySQL
require('dbconnect.php');
$bdd = dbconnect();

$errors = [];
$datas = [];

if (!empty($_POST)) {


    if (!empty($_POST['name'])) {
        $datas['name'] = htmlspecialchars($_POST['name']);
    } else {
        $errors['name'] = "erreur sur name";
    }


    if (!empty($_POST['year'])) {
        $datas['year'] = htmlspecialchars($_POST['year']);
    } else {
        $errors['year'] = "erreur sur année";
    }

    if (!empty($_POST['grapes'])) {
        $datas['grapes'] = htmlspecialchars($_POST['grapes']);
    } else {
        $errors['grapes'] = "erreur sur grapes";
    }

    if (!empty($_POST['country'])) {
        $datas['country'] = htmlspecialchars($_POST['country']);
    } else {
        $errors['country'] = "erreur sur country";
    }

    if (!empty($_POST['region'])) {
        $datas['region'] = htmlspecialchars($_POST['region']);
    } else {
        $errors['region'] = "erreur sur region";
    }

    if (!empty($_POST['text'])) {
        $datas['text'] = htmlspecialchars($_POST['text']);
    } else {
        $errors['text'] = "erreur sur text";
    }

    if (!empty($_FILES)) {
        $dossier = './assets/img/imgCave';
        $fichier = $_FILES['picture']['name'];
        $taille_maxi = 1000000;
        $taille = filesize($_FILES['picture']['tmp_name']);
        $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.JPG', '.PNG');
        $extension = strrchr($_FILES['picture']['name'], '.');

        //Début des vérifications de sécurité...
        if (!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
            $errors['picture'] = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg....';
        }

        if ($taille > $taille_maxi) {
            $errors['picture-size'] = 'Le fichier est trop gros...';
        }

        if (!isset($errors['picture']) && !isset($errors['picture-size'])) //S'il n'y a pas d'erreur, on upload
        {
            //On formate le nom du fichier ici...
            $fichier = strtr(
                $fichier,
                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'
            );



            if (!is_dir($dossier)) {
                mkdir($dossier, 0755);
            }

            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

            if (move_uploaded_file($_FILES['picture']['tmp_name'], "$dossier/$fichier")) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            {
                $datas['picture'] = "$fichier";
                echo 'Upload effectué avec succès !';

                // pour être regireger sur la page d'accueil 
                header('location: index.php');
            } else //Sinon (la fonction renvoie FALSE).
            {
                echo 'Echec de l\'upload !';
            }
        }
    } else {
        $datas['picture'] = null;
    }

    // *****************************************************


}

if (!empty($errors)) {
    // je boucle sur mon tableau d'erreur et je les affiche tant qu'il y en a
    foreach ($errors as $error) {
        echo $error;
    }
    die;
}

$sql = "INSERT INTO vins(name, year, grapes, country, region, text, picture) VALUES(:name, :year, :grapes, :country, :region, :text, :picture)";

//je prépare ma requête sql
$req = $bdd->prepare($sql);
//j'exécute  ma requête

$req->execute($datas);
