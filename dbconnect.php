<?php

//Appel a la base de donnée MYSQL
function dbconnect()
{
    try {
        $bdd = new PDO('mysql:host=sql11.freemysqlhosting.net;dbname=sql11416830;charset=utf8', 'sql11416830', 'tAidF6GWV6');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
}
