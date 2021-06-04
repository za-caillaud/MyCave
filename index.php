<?php

session_start();

require('dbconnect.php');
$bdd = dbconnect();


$reponse = $bdd->query('SELECT id, name, year, grapes, country, region, text, picture  FROM vins')->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

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
                            <a class="nav-link" href="./signUpHTML.php">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./signInHTML.php">Sign In</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- PARTIE HOME PAGE -->

            <div class="bg-accueil">

                <h1>Welcome to My Cave</h1>
            </div>
        </header>


        <!-- *******************************************CARDS****************************************** -->
        <main>

            <div id="bottles">
                <br>
                <h2>Our wine collection</h2>

                <?= (isset($_SESSION['admin'])) && $_SESSION['admin'] == true ?  '<a href="./create_vinsHTML.php?id=' .  '"  id="addBottle"><button type="submit">Add new bottle</button></a>' : '' ?>

                <!-- Boucle for PHP qui va parcourir ton tableau ou ton objet $data
                pour chaque itération tu affiche ta div .card-->
                <?php
                foreach ($reponse as $bottle) {
                ?>
                    <div class="card mb-3" style="max-width: auto;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="./assets/img/imgCave/<?php echo $bottle['picture']; ?>" alt="bottle">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h3 class="card-title"><?php echo $bottle['name']; ?></h3>
                                    <p class="card-text"><?php echo $bottle['text']; ?></p>
                                    <p class="card-text"><small class="text-muted"><?php echo $bottle['grapes'];
                                                                                    echo " - ";
                                                                                    echo $bottle['year']; ?></small></p>
                                    <p class="card-text"><small class="text-muted"><?php echo $bottle['country'];
                                                                                    echo " - ";
                                                                                    echo $bottle['region']; ?></small></p>

                                    <?= (isset($_SESSION['admin'])) && $_SESSION['admin'] == true ?  '<a href="./editionVinsHTML.php?id=' . $bottle['id'] . '"><button type="submit">UPDATE</button></a>' : '' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="vide"></div>
        </main>
        <!-- **********************************footer*************************************** -->
        <footer>

            <h3> © 2021 - Développé par Z. Caillaud</h3>

        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src='./assets/js/bootstrap.min.js'></script>

</body>


</html>