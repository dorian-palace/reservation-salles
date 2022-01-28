<?php
session_start();
require_once('bdd/login.php');
require_once('bdd/user.php');
require('element/header.php');

if (isset($_SESSION['id'])) {
    header('Location: index.php');
}

if (isset($_POST['deco'])) {
    include('element/deconnexion.php');
}

if (isset($_POST['login']) and isset($_POST['password'])) {

    if (!empty($_POST['login']) and !empty($_POST['password'])) {

        $login = $_POST['login'];
        $password = $_POST['password'];
        $log = new Login($login, $password);
        $userinfo = Login::Connexion($_POST['login'], $_POST['password']);
        $_SESSION['login'] = $userinfo['login'];
        $_SESSION['id'] = $userinfo['id'];

        if (password_verify($_POST['password'], $userinfo['password'])) {

            $msg2 =  'vous êtes connecté';
        } else {

            $msg =  'identifiant ou mot de pass incorrect';
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
    <title>Connexion</title>
</head>

<body class="body_connexion">



    <main class="main2">

        <form class="formulaire2" action="#" method="post">

            <div class="connecter">

                <?php if (isset($userinfo['id'])) { ?>

                    <h1> Bienvenue <?php echo  $userinfo['login'] ?> </h1>
                <?php } ?>
            </div>
            <h1>Se connecter</h1>

            <?php if (isset($msg)) {
            ?> <h4 id="msg"> <?php echo $msg ?> </h4>
            <?php } ?>

            <?php if (isset($msg2)) {
            ?> <h4 id="msg2"> <?php echo $msg2 ?> </h4>
            <?php } ?>

            <div class="input">
                <input type="text" name="login" require placeholder="Nom d'utilisateur" /></br></br>
                <input type="password" name="password" require placeholder="Mot de passe" /></br>
            </div>

            <p class="inscription">
                Je n'ai pas de compte. J'en <a href="inscription.php">céer un</a>
            </p>
            <div class="connexion_log">

                <?php if (!isset($_SESSION['id'])) { ?>


                    <input type="submit" name="valider" value="Se connecter" />

                <?php } else {
                    header("refresh:2;url=reservation-form.php");                    ?>

                    <input type="submit" name="deco" value="Se déconnecter" id="deco_boutton" />

                <?php } ?>


            </div>

        </form>

    </main>



    <?php include("element/footer.php"); ?>
</body>

</html>