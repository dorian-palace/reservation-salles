<?php
try {
    include_once('classes/db_register.php');
    $obj = new Register();
    if (isset($_POST['login'])) {

        $login = $_POST['login'];
        $password = $_POST['password'];
        $user = $obj->Login($login, $password);

        if ($user) {        

        if ($_POST['envoi']) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $conf_password = $_POST['conf_password'];

            if ($password == $conf_password) {
                $login = $obj->UserExist($login);
                if (!$login) {
                    $register = $obj->UserRegister($login, $password);
                    if ($register) {
                        echo "Inscription reussis";
                    } else {
                        echo "Inscription échoué";
                    }
                } else {
                    echo "login déjà pris";
                }
            } else {
                echo "password correspond pas";
            }
        }
    }
} else {
    echo "echec";
}
} catch (PDOException $e) {

    echo 'echec : ' . $e->getMessage();
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
            <input type="text" name="login" value="login"><br /><br />
            <input type="password" name="password" value="password"><br /><br />
            <input type="password" name="conf_password" value="password"><br /><br />
            <input type="submit" name="envoi">
        </form>
    </div>

</body>

</html>