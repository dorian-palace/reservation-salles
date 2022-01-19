<?php
session_start();
require('app/month.php');


$month = new Month($_GET['month'] ?? null, $_GET['year'] ?? null);
// ?? null Si c'est définit ça prend la valeur de $_GET sinon ça prend la valeur null
$start = $month->getStartingDay()->modify('last monday');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/calendar.css">
    <title>planning</title>
</head>

<body>
    <?php include('element/header.php'); ?>
    <main>
        <h1 align="center">Planning</h1>
        <h1><?= $month->toString(); ?></h1>


        <table class="calendar__table calendar__table--<?= $month->getWeeks(); ?>weeks">
            <?php for ($i = 0; $i < $month->getWeeks(); $i++) : ?>
                <tr>
                    <?php foreach ($month->days as $k => $day) : ?>
                        <td>
                            <div class="calendar__weekday"><?= $day ?></div>
                            <div class="calendar__day"><?= (clone $start)->modify("+$k days")->format('d'); ?></div>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endfor; ?>
        </table>
    </main>

</body>

</html>