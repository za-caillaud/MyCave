<?php

session_start();

require __DIR__ . '/contents/header.php';
?>


<div class="signIn">
    <form action="signIn.php" method="post" enctype="multipart/form-data">

        <div>
            <label for="email">E-MAIL </label>
            <input type="email" id="email" name="email">
        </div>
        <br>
        <div>
            <label for="motDePasse">PASSWORD</label>
            <input type="password" id="motDePasse" name="motDePasse">
        </div>

        <br>
        <div class="button">
            <button type="submit" name="btn-signUp">SIGN IN</button>
        </div>

    </form>
</div>
<?php require __DIR__ . '/contents/footer.php'; ?>