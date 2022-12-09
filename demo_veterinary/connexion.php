<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8;', 'root');
if (isset($_POST['envoi'])) {
    if (!empty($_POST['pseudo']) AND !empty($_POST['mdp'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);

        $recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
        $recupUser->execute(array($pseudo, $mdp));

        if ($recupUser->rowCount() > 0) {
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $recupUser->fetch()['id'];
            echo $_SESSION['id'];
        } else {
            echo "Votre mot de passe ou pseudo est incorrect";
        }
    } else {
        echo "Veuillez compléter tous les champs...";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <style>
        body {
            background-color: skyblue;
        }

        h2 {
            color: white;
            font-size: 5em;
        }

        .password {
            margin-right: 1em;
        }
    </style>
</head>
<body>
    <h2 align="center">Se connecter</h2>
    <br><br>
    <form method="POST" action="" align="center">
        <div class="user">
            <label>Utilisateur : </label>
            <input type="text" name="pseudo" autocomplete="off">
        </div>
        <br><br>
        <div class="password">
            <label>Mot de passe : </label>
            <input type="password" name="mdp" autocomplete="off">
        </div>
        <br><br>
        <input type="submit" name="envoi">
    </form>
</body>
</html>