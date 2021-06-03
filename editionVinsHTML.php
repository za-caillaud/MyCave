<?php

session_start();

require __DIR__ . '/contents/header.php';

require('dbconnect.php');
$bdd = dbconnect();

$getId = (int)htmlspecialchars($_GET['id']);

$reponse = $bdd->query('SELECT id, name, year, grapes, country, region, text, picture  FROM vins WHERE vins.id=' . $getId)->fetch(PDO::FETCH_ASSOC);


?>



<div class="update">

    <form action="editionVins.php" method="POST" enctype="multipart/form-data">
        <div>

            <input type="hidden" name="id" id="input" value="<?php echo $reponse['id'] ?>">
        </div>
        <div>
            <label for="name">name</label>
            <input type="text" name="name" id="input" value="<?php echo $reponse['name'] ?>">
        </div>

        <div>
            <label for="year">year</label>
            <input type="number" name="year" id="input" value="<?php echo $reponse['year'] ?>" min="1920" max="2021">
        </div>

        <div>
            <label for="grapes">grapes</label>
            <input type="text" name="grapes" id="input" value="<?php echo $reponse['grapes'] ?>">
        </div>

        <div>
            <label for="country">country</label>
            <input type="text" name="country" id="input" value="<?php echo $reponse['country'] ?>">
        </div>

        <div>
            <label for="region">region</label>
            <input type="text" name="region" id="input" value="<?php echo $reponse['region'] ?>">
        </div>

        <div>
            <label for="text">descriptif</label><br />
            <textarea name="text" id="text" cols="30" rows="10"><?php echo $reponse['text'] ?> </textarea><br>
            <br>
        </div>
        <div>
            <img src="./assets/img/imgCave/<?php echo $reponse['picture']; ?>" alt="bottle">
        </div>

        <div>
            <input type="file" name="picture" value="upload file" />

        </div>


        <input type="submit" id="btn" value="  UPDATE  " />

        <!-- ****************************************DELETE******************************************* -->

        <div id="delete">

            <h4>Voulez-vous SUPPRIMER définitivement cet article ?</h4>

            <div class="button-container">
                <a class="oui" href="./delete_vin.php?id=<?= $reponse['id']; ?>">Oui</a>
                <a class="non" href="#">Non</a>



            </div>
        </div>



    </form>
</div>

<?php require __DIR__ . '/contents/footer.php'; ?>