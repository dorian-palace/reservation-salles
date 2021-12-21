<?php

include_once('classes/db_register.php');
$obj = new Register();
if (isset($_POST['envoi'])) {

    $login = $_POST['login'];
    $password = $_POST['password'];
    $conf_password = $_POST['conf_password'];
    $user = $obj->Login_exist($login);

    if (!$user) {
        var_dump($user);    
        if ($password == $conf_password) {

            $register = $obj->UserRegister($login, $password);
            if ($register) {
                echo "Inscription reussis";
            } else {
                echo "Inscription échoué";
            }
        } else {
            echo "password correspond pas";
        }
    } else {
        $msg = 'Login déjà pris';
        echo $msg;
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

    <div class="form_inscription">
        <form action="" method="post">
            <input type="text" name="login" placeholder="login"><br /><br />
            <input type="password" name="password" placeholder="password"><br /><br />
            <input type="password" name="conf_password" placeholder="password"><br /><br />
            <input type="submit" name="envoi">
        </form>
    </div>

</body>

</html>