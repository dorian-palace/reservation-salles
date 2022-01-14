<?php
require('bdd/user.php');
session_start();

$user = new User();

if (!isset($_SESSION['id'])) {

    header('Location: connexion.php');
    exit();
}

if (isset($_SESSION['id'])) {
    $user->Profil_login();


    if (isset($_POST['newlogin']) and $_POST['newlogin'] != $user->login) {
        $login = $_POST['newlogin'];
        $user->Profil_update($login);
    }


    if (isset($_POST['newmdp ']) and !empty('newmdp') and isset($_POST['newmdp2']) and !empty($_POST['newmdp'])) {
        $user->Password_update($password, $conf_password);
        //     $newmdp = $_POST['newmdp'];
        //     $newmdp2 = $_POST['newmdp2'];
        //     $newmdp = password_hash($newmdp, PASSWORD_BCRYPT);
        //     $newmdp2 = password_hash($newmdp2, PASSWORD_BCRYPT);

        //     if ($newmdp == $newmpd2) {

        //         $insertmdp = $bdd->prepare('UPDATE utilisateur SET password=? WHERE id=?');
        //         $insertmdp->execute(array($newmdp, $_SESSION['id']));

        //         $msg = 'Mot de passe modifié';
        //     }
        // } else {
        //     $msh = 'Mot de passe incorrect';
        // }
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
    <pre><?php var_dump($_SESSION); ?></pre>
    <main class="main2">

        <form classe="Formulaire2" action="#" method="post">

            <?php if (isset($msg)) {
                echo $msg;
            } ?>

            <h2 id="h2_profil"> Modification de mon profil</h2>

            <div class="input">

                <input type="text" name="newlogin" placeholder="nom d'utilisateur" value="<?php echo $userinfo['login'] ?>">
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