<?php
require('bdd_log.php');

class User
{


    public function Profil_login()
    {

        $req = Database::connexion_db()->prepare("SELECT * FROM utilisateurs where id = ?");
        $req->execute(array($_SESSION['id']));
        $result = $req->fetch();
        return $result;
    }


    public function Profil_update($login)
    {

        $new_login = htmlspecialchars(trim($_POST['newlogin']));
        $req = Database::connexion_db()->prepare("UPDATE utilisateurs SET login = ? WHERE id = ?");
        $req->execute(array($new_login, $_SESSION['id']));

        return $req;
    }

    public function Password_update($password, $conf_password)
    {
        $password = $_POST['newmdp'];
        $conf_password = $_POST['newmdp2'];

        $password = password_hash($password, PASSWORD_BCRYPT);
        $conf_password = password_hash($conf_password, PASSWORD_BCRYPT);

        if ($password == $conf_password) {
            $req = Database::connexion_db()->prepare('UPDATE utilisateurs SET password = ? WHERE id = ?');
            $req->execute(array($password, $_SESSION['id']));
            return $req;
        }
    }
}
