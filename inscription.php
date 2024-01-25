<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Inscription</title>

    <meta content="PHP - Inscription" property="og:title" />
    <meta content="Site de test." property="og:description" />
    <meta content="#c5a4ff" data-react-helmet="true" name="theme-color" />

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav class="nav-bar">
            <div class="title-container">
                <h1>Inscription</h1>
            </div>
        </nav>
    </header>

    <section class="inscription" id="inscription">
        <div class="paragraph-box">
            <h4> Inscrivez-vous pour accéder aux ressources.</h4>
            <br>
            <form class="Inscription" action="inscription_handler.php" method="post">
                <div>
                    <label for="user">Login:</label>
                    <input type="text" id="user" name="user" maxlength="30" required pattern="[0-9A-Za-z _]+"></td>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" maxlength="50" required
                        pattern="^[0-9A-Za-z]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$" />
                </div>
                <div>
                    <label for="password">Mot de passe:</label>
                    <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Doit contenir au moins un chiffre, une lettre majuscule et minuscule, et au moins 8 caractères">
                    </td>
                </div>
                <div>
                    <label for="password2">Confirmer le mot de passe:</label>
                    <input type="password" id="password2" name="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Doit contenir au moins un chiffre, une lettre majuscule et minuscule, et au moins 8 caractères">
                    </td>
                </div>
                <br>
                <div>
                    <input type="submit" value="Inscription">
                    <button class="login-button" onclick="window.location.href = 'index.php';">Retour vers
                        connexion</button>
                </div>
            </form>
    </section>

    <footer>
        <div>Harshot Games © 2024</div>
    </footer>
</body>

</html>