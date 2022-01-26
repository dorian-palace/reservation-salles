<?php
session_start();
require 'app/resa_form.php';

$debut = (new DateTime($_POST['debut']))->format('Y-m-d H:i:s');
$fin = (new DateTime($_POST['fin']))->format('Y-m-d H:i:s');
$debut_int = intval((new DateTime($_POST['debut']))->format('H'));
$fin_int = intval((new DateTime($_POST['fin']))->format('H'));
$day = intval((new DateTime($_POST['debut']))->format('w'));

// varible fin = a variable debut +1
if ($debut_int >= 8 && $fin_int <= 19) {
    if ($day <= 5) {
        if (isset($_POST['submit'])) {

            if (isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['debut']) && isset($_POST['fin'])) {

                $titre = $_POST['titre'];
                $description = $_POST['description'];
                $id_utilisateur = $_SESSION['id'];
                $resa = new Form_reservation($titre, $description, $debut, $fin, $id_utilisateur);

                if ($resa->envent_exist($debut)) {

                    $resa->reserve($titre, $description, $debut, $fin, $id_utilisateur);
                } else {
                    echo 'non dispo';
                }
            }
        }
    } else {
        echo 'nous sommes fermer';
    }
} else {
    echo 'ta grand mere';
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
    <main><br /><br /><br /><br /><br />Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione earum quisquam suscipit nesciunt mollitia doloribus ducimus modi unde eaque aut sint ipsam a at sunt, rerum voluptatibus incidunt ad consectetur.</main>
    <form action="#" method="post" id="form_reservation">
        <input type="text" placeholder="titre" name="titre"><br /><br />
        <input type="text" placeholder="description" name="description"><br /><br />
        <input type="datetime-local" placeholder="date_de_debut" name="debut"><br /><br />
        <input type="datetime-local" placeholder="date_de_fin" name="fin"><br /><br />
        <input type="submit" name="submit">
    </form>
</body>

</html>