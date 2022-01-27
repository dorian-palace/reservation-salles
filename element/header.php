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
            color: black;
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


        <li><a href="profil.php">Profil</a></li>
        <li><a href="reservation-form.php">Réservation</a></li>
        <li><a href="planning.php">Planning</a></li>
        <li><a href="inscription.php">Inscription</a></li>
        <li style="float:right"><a class="active" href="connexion.php">Connexion</a></li>
    </ul>



</body>

</html>