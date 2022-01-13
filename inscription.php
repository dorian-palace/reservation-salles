<?php

include_once('classes/db_register.php'); //j'appel ma class pour l'inscription
$inscription = new Register(); //Création objet

if (isset($_POST['envoi'])) {

  $login = $_POST['login'];
  $password = $_POST['password'];
  $conf_password = $_POST['conf_password'];

  $user = $inscription->Login_exist($login); //$user = vérification si le login existe déjà en bdd

  if (!$user) { //si l'utilisateurs n'éxiste pas

    if ($password == $conf_password) { //si le password et la confirmation du password sont idendique

      $register = $inscription->UserRegister($login, $password); // j'appel ma class et crée mon utilisateurs

      if ($register) {
        $msg = "Inscription reussis";
      } else {
        $msg = "Inscription échoué";
      }
    } else {
      $msg = "password correspond pas";
    }
  } else {
    $msg = 'Login déjà pris';
  }
} else {
  //echo "echec";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription</title>
</head>

<body>
  <?php include('element/header.php'); ?>

  <div class="form_inscription">
    <form action="" method="post">
      <input type="text" name="login" placeholder="login"><br /><br />
      <input type="password" name="password" placeholder="password"><br /><br />
      <input type="password" name="conf_password" placeholder="password"><br /><br />
      <input type="submit" name="envoi">
    </form>
  </div>

  <?php include('element/footer.php'); ?>
</body>

</html>