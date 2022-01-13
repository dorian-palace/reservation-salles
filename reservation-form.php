<?php
require 'bdd/bdd_log.php';
require 'bdd/requete.php';
//$req_from = new Form_resa();

if (isset($_POST['envoi_resa'])) {
    if (isset($_POST['titre_resa']) && isset($_POST['description_resa']) && isset($_POST['debut_resa']) && isset($_POST['fin_resa'])) {
        $id = $_SESSION['id'];
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $debut = $_POST['date_de_debut'];
        $fin = $_POST['date_de_fin'];

        $req->Reservation_form($id, $titre, $description, $debut, $fin);
    }
}
?>
<pre><?php var_dump($req); ?></pre>

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
        <input type="text" placeholder="titre" id="titre_resa"><br /><br />
        <input type="text" placeholder="description" id="description_resa"><br /><br />
        <input type="date" placeholder="date_de_debut" id="debut_resa"><br /><br />
        <input type="date" placeholder="date_de_fin" id="fin_resa"><br /><br />
        <input type="submit" id="envoi_resa">
    </form>
</body>

</html>