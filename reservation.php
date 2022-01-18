<?php
session_start();

if(!isset($_SESSION['id'])){
    header('Location: connexion.php');
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

<?php include('element/footer.php'); ?>
    
</body>
</html>