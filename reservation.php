<?php
session_start();
require('app/events.php');
require('parametre/setting.php');
// if (!isset($_SESSION['id'])) {
//     header('Location: connexion.php');
// }
$events = new Events();
$res = $events->getUser_event(); 
if (!isset($_GET['id'])) {
    e404();
}
try {

    $event = $events->find($_GET['id']);
} catch (\Exception $e) {
    e404();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
</head>

<body>
    <?php include('element/header.php'); ?>
    <h1><?= $event['titre']; ?></h1>

    <ul>
        <li>Date: <?= (new Datetime($event['debut']))->format('d/m/Y'); ?></li>
        <li>Heure de démarrage: <?= (new Datetime($event['debut']))->format('H:i'); ?></li>
        <li>Heure de fin: <?= (new Datetime($event['fin']))->format('H:i'); ?></li>
    </ul>

    <ul>
        <li>Description:<br> <?= htmlentities($event['description']); ?></li>
        <li>Réserver par: <?= $res['login']; ?></li>
    </ul>

    <?php include('element/footer.php'); ?>

</body>

</html>