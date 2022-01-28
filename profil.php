<?php
session_start();
require_once('bdd/user.php');
require('element/header.php');

$user = new User();

if (!isset($_SESSION['id'])) {

    header('Location: connexion.php');
    exit();
}

if (isset($_SESSION['id'])) {

    if (isset($_POST['newlogin']) and $_POST['newlogin'] != $user->login) {
        $login = $_POST['newlogin'];
        $user->Profil_update($login);
    }

    if (isset($_POST['newmdp']) and isset($_POST['newmdp2'])) {

        $id = $_SESSION['id'];
        $password = $_POST['newmdp'];
        $conf_password = $_POST['newmdp2'];
        if ($password == $conf_password) {
            $user->Password_update($id, $password);
            $msg = 'Modification réussi';
        } else {
            $msg = 'Mot de passe incorrect';
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
    <title>Modifier profil</title>
</head>

<body class="body_profil" >
    <main class="main2">

        <form classe="Formulaire2" action="#" method="post">

            <?php if (isset($msg)) {
                echo $msg;
            } ?>

            <h1 id="h2_profil"> Modification de mon profil</h1>

            <div class="input">

                <input type="text" name="newlogin" placeholder="nom d'utilisateur" value="<?= $user->login; ?>"><br /><br />
                <input classe="input-profil" type="password" name='newmdp' placeholder="mot de passe"><br /><br />
                <input classe="input-profil" type="password" name='newmdp2' placeholder="Confirmer le   mot de passe">

            </div>

            <div class="modifier">
                <input id='modifier' type="submit" value="Modifier">

            </div>
        </form>
    </main>
    <?php include('element/footer.php'); ?>
</body>

</html>