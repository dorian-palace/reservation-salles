<?php
require('bdd/user.php');
require('element/header.php');

$inscription = new User();

if (isset($_POST['envoi'])) {

  if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['conf_password'])) {

    $login = $_POST['login'];
    $password = $_POST['password'];
    $conf_password = $_POST['conf_password'];

    if ($inscription->Login_exist($login)) {

      if ($password == $conf_password) {

        $inscription->Inscription($login, $password);
        $msg = 'Bienvenue !';
      }
    } else {
      $msg = 'inscription échouer';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Inscription</title>
</head>

<body>

  <div class="form_inscription">
    <form action="" method="post">
      <?php if (isset($msg)) {
        echo $msg;
      } ?>
      <br /><br />
      <input type="text" name="login" placeholder="login"><br /><br />
      <input type="password" name="password" placeholder="password"><br /><br />
      <input type="password" name="conf_password" placeholder="password"><br /><br />
      <input type="submit" name="envoi">
    </form>
  </div>

  <?php include('element/footer.php'); ?>
</body>

</html>