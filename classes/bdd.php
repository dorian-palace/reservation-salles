<?php

try{
    $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles','root','root');
    $bdd -> setAttribute(PDO::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
     date_default_timezone_set('Europe/Paris');

}

catch(PDOException $e){

    echo 'echec : ' .$e->getMessage();
}

?>