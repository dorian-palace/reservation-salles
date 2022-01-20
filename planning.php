<?php
session_start();
require('app/month.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/calendar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>planning</title>
</head>

<body>
    <?php
    $month = new Month($_GET['month'] ?? null, $_GET['year'] ?? null);
    // ?? null Si c'est définit ça prend la valeur de $_GET sinon ça prend la valeur null
    $start = $month->getStartingDay()->modify('last monday');
    // include('element/header.php'); 
    ?>
    
    <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
        <h1><?= $month->toString(); ?></h1>
        <div>
            <a href="planning.php?month=<?= $month->previousMonth()->month; ?>&year=<?= $month->previousMonth()->year; ?>" class="btn btn-primary">&lt;</a>

            <a href="planning.php?month=<?= $month->nextMonth()->month; ?>&year=<?= $month->nextMonth()->year; ?>" class="btn btn-primary">&gt;</a>

        </div>
    </div>

    <table class="calendar__table calendar__table--<?= $month->getWeeks(); ?>weeks">
        <?php for ($i = 0; $i < $month->getWeeks(); $i++) : ?>
            <tr>
                <?php
                foreach ($month->days as $k => $day) :
                    $date = (clone $start)->modify("+" . ($k + $i * 7) . "days")
                ?>
                    <td class="<?= $month->withinMonth($date) ? '' : 'calendar__othermonth'
                                //; 
                                ?>">
                        <?php if ($i === 0) : ?> <div class="calendar__weekday"><?= $day ?></div>
                        <?php endif; ?>
                        <div class="calendar__day"><?= $date->format('d'); ?></div>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endfor; ?>
    </table>

</body>

</html>