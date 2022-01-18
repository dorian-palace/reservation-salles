<?php
session_start();
require 'app/resa_form.php';

if (isset($_POST['submit'])) {

    if (isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['debut']) && isset($_POST['fin'])) {

        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $debut = $_POST['debut'];
        $fin = $_POST['fin'];
        $id = $_SESSION['id'];

        $resa_form = new Form_reservation($id,  $titre, $description, $debut, $fin);

        $resa_form->reserve();
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
    <main><br /><br /><br /><br /><br />Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione earum quisquam suscipit nesciunt mollitia doloribus ducimus modi unde eaque aut sint ipsam a at sunt, rerum voluptatibus incidunt ad consectetur.</main>
    <form action="#" method="post" id="form_reservation">
        <input type="text" placeholder="titre" name="titre"><br /><br />
        <input type="text" placeholder="description" name="description"><br /><br />
        <input type="date" placeholder="date_de_debut" name="debut"><br /><br />
        <input type="date" placeholder="date_de_fin" name="fin"><br /><br />
        <input type="submit" name="submit">
    </form>
</body>

</html>