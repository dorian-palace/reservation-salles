<?php
require_once('bdd/user.php');
session_start();

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
        }
        else {
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
    <link rel="stylesheet" href="style.css">
    <title>Modifier profil</title>
</head>

<body>
    <?php include('element/header.php'); ?>
    <main class="main2">
        <a href=""></a>

        <form classe="Formulaire2" action="#" method="post">

            <?php if (isset($msg)) {
                echo $msg;
            } ?>

            <h2 id="h2_profil"> Modification de mon profil</h2>

            <div class="input">

                <input type="text" name="newlogin" placeholder="nom d'utilisateur" value="<?= $user->login; ?>">
                <input classe="input-profil" type="password" name='newmdp' placeholder="mot de passe">
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