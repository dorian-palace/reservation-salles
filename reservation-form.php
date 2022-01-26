<?php
session_start();
require 'app/resa_form.php';

if (isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['debut']) && isset($_POST['fin'])) {

    $now = new DateTime();
    $debut = (new DateTime($_POST['debut']))->format('Y-m-d H:i:s');
    $fin = (new DateTime($_POST['fin']))->format('Y-m-d H:i:s');
    $debut_int = intval((new DateTime($_POST['debut']))->format('H'));
    $fin_int = intval((new DateTime($_POST['fin']))->format('H'));
    $day = intval((new DateTime($_POST['debut']))->format('w'));
    $heure = $fin_int - $debut_int;

    if ($debut_int >= 8 && $fin_int <= 19) {

        if ($heure == 1) {

            if ($debut >= $now) {

                if ($day <= 5) {

                    if (isset($_POST['submit'])) {

                        $titre = $_POST['titre'];
                        $description = $_POST['description'];
                        $id_utilisateur = $_SESSION['id'];
                        $resa = new Form_reservation($titre, $description, $debut, $fin, $id_utilisateur);

                        if ($resa->envent_exist($debut)) {

                            $resa->reserve($titre, $description, $debut, $fin, $id_utilisateur);
                        } else {
                            $msg = 'La date de reservation n\'est pas disponnible';
                        }
                    }
                } else {
                    $msg =  'Nous sommes fermer le week-end';
                }
            } else {
                $msg =  'Date invalide';
            }
        } else {
            $msg =  'Vous pouvez reserver uniquement 1 heure';
        }
    } else {
        $msg =  'Nous sommes ouvert uniquement de 8 heures a 19 heures veuillez saisir une heure valide';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reservation</title>
</head>

<body>
    <?php include('element/header.php'); ?>

    <form action="#" method="post" id="form_reservation">
        <?php if (isset($msg)) {
            echo $msg;
        } ?><br><br>
        <input type="text" placeholder="titre" name="titre"><br /><br />
        <input type="text" placeholder="description" name="description"><br /><br />
        <input type="datetime-local" placeholder="date_de_debut" name="debut"><br /><br />
        <input type="datetime-local" placeholder="date_de_fin" name="fin"><br /><br />
        <input type="submit" name="submit">
    </form>
</body>

</html>