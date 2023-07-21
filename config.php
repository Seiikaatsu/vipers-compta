<?php 
    try 
    {
        $bdd = new PDO("mysql:host=127.0.0.1:3306;dbname=u303629564_vipers;charset=utf8", "u303629564_vipers_db", "1/3g[l3pLy*C");
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }