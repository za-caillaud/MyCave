<?php

$errors = [];
$data = [];
$user = [];

require('dbconnect.php');
$bdd = dbconnect();


$reponse = $bdd->query('SELECT email, mdp FROM user');


if (!empty($_POST)) {
    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $data['email'] = strip_tags($_POST['email']);
    } else {
        $errors['email'] = "pas d'email";
    }
}

$req = $bdd->prepare('SELECT * FROM user WHERE email=:email');
$req->execute($data);
$user = $req->fetch(PDO::FETCH_ASSOC);

if (!empty($_POST['email']) && !empty($_POST['motDePasse'] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {


    if (!empty($user)) {
        if (password_verify($_POST['motDePasse'], $user['mdp'])) {
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['admin'] = $user['admin'];

            echo 'vous êtes connecté';

            // pour être regireger sur la page d'accueil 
            header('location: index.php');
        } else {
            echo "invalide mot de passe ou email";
        }
    }
} else {
    $errors['user'] = 'Mauvais identifiant ou mot de passe';
}



if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error;
    }
    die;
}
