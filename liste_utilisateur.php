<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" media="screen" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">


    <title>My Cave</title>
</head>

<body>
    <div class="all">
        <header>
            <!-- Navbar bootstrap -->
            <nav class="navbar navbar-expand-lg navbar-dark ">

                <a class="navbar-brand" href="./index.php"><img src="./assets/img/imgCave/logo-large.png" alt="logo mycave"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#bottles">Our wines</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signUp">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./signIn.html">Sign In</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <table>
                <tr>
                    <td>id</td>
                    <td>Nom</td>
                    <td>Prénom</td>

                    <td>email</td>
                    <td>Editer</td>
                </tr>

                <?php
                try {
                    $bdd = new PDO('mysql:host=localhost;dbname=cave;charset=utf8', 'root', '');
                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }

                $reponse = $bdd->query('SELECT id, nom, prenom,  email  FROM user');

                while ($donnees = $reponse->fetch()) {
                ?>


                    <tr>
                        <td><?php echo $donnees['id']; ?></td>

                        <td><?php echo $donnees['nom']; ?></td>
                        <td><?php echo $donnees['prenom']; ?></td>

                        <td><?php echo $donnees['email']; ?></td>

                        <td><a href="edition.php?id=<?php echo $donnees['id']; ?>">Editer</a></td>


                    </tr>
                <?php
                }

                $reponse->closeCursor(); // Termine le traitement de la requête

                ?>
            </table>
</body>

</html>