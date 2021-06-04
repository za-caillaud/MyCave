<?php

session_start();

require __DIR__ . '/contents/header.php';
?>

<div class="create">
    <form action="create_vins.php" method="post" enctype="multipart/form-data">
        <div>
            <h1>Add a new bottle</h1>
        </div>

        <div>
            <label for="name">name</label>
            <input type="text" name="name" id="input">
        </div>

        <div>
            <label for="year">year</label>
            <input type="number" name="year" id="input">
        </div>

        <div>
            <label for="grapes">grapes</label>
            <input type="text" name="grapes" id="input">
        </div>

        <div>
            <label for="country">country</label>
            <input type="text" name="country" id="input">
        </div>

        <div>
            <label for="region">region</label>
            <input type="text" name="region" id="input">
        </div>

        <div>
            <label for="text">descriptif</label><br />
            <textarea name="text" id="text" cols="30" rows="10"> </textarea><br>

        </div>
        <div>
            <input type="file" name="picture" value="upload file" />

        </div>

        <div>
            <input type="submit" id="btn" value=" Create" />
        </div>

    </form>
</div>
<?php require __DIR__ . '/contents/footer.php'; ?>