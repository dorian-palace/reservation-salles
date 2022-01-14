<?php
include('bdd/login.php');
session_start();

$login = $_POST['login'];
$password = $_POST['password'];
$log = new Login($login, $password);

if (isset($_SESSION['id'])) {
}

if (isset($_POST['deco'])) {
    include('element/deconnexion.php');
}


if (isset($_POST['login']) and isset($_POST['password'])) {

    if (!empty($_POST['login']) and !empty($_POST['password'])) {

        $userinfo = Login::Connexion($_POST['login'], $_POST['password']);
        var_dump($userinfo);

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
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>

<body>
    <?php include('element/header.php'); ?>



    <main class="main2">

        <form class="formulaire2" action="#" method="post">


            <h1>Se connecter</h1>

            <?php if (isset($msg)) {
            ?> <h4 id="msg"> <?php echo $msg ?> </h4>
            <?php } ?>

            <?php if (isset($msg2)) {
            ?> <h4 id="msg2"> <?php echo $msg2 ?> </h4>
            <?php } ?>

            <div class="input">
                <input type="text" name="login" require placeholder="Nom d'utilisateur" />
                <input type="password" name="password" require placeholder="Mot de passe" />
            </div>

            <p class="inscription">
                Je n'ai pas de compte. J'en <a href="inscription.php">céer un</a>
            </p>
            <div align="center">

                <?php if (!isset($_SESSION['id'])) { ?>


                    <input type="submit" name="valider" value="Se connecter" />

                <?php } else { ?>

                    <input type="submit" name="deco" value="Se déconnecter" id="deco_boutton" />

                <?php } ?>

            </div>

        </form>

    </main>

    <div class="connecter">

        <?php if (isset($userinfo['id'])) { ?>

            <h1> Bienvenue <br /> <?php echo  $userinfo['login'] ?> </h1>
        <?php } ?>
    </div>

    <?php include("element/footer.php"); ?>
</body>

</html>