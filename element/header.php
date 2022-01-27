<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">

<head>
    <style>
        ul {
            list-style-type: none;

            margin: -0.5%;
            padding: 10px;
            margin-top: -0.5%;
            overflow: hidden;
            background-color: red;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 10px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: pink;
        }

        .active {
            background-color: pink;
        }
    </style>
</head>

<body>

    <ul class="ul_header">
        <li><a href="index.php">Accueil</a></li>

        <?php if (!isset($_SESSION['id'])) { ?>
          
            <li style="float:right"><a class="active" href="connexion.php">Connexion</a></li>
            <li><a href="inscription.php">Inscription</a></li>

        <?php }  ?>
          <?php if(isset($_SESSION['id'])){  ?>
            <li style="float:right"><a class="active" href="element/deconnexion.php">Deconnexion</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="reservation-form.php">Réservation</a></li>
            <li><a href="planning.php">Planning</a></li>
        <?php }  ?>
    </ul>



</body>

</html>