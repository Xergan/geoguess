<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Login</title>

    <meta content="PHP - Login" property="og:title" />
    <meta content="Site de test." property="og:description" />
    <meta content="#c5a4ff" data-react-helmet="true" name="theme-color" />

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav class="nav-bar">
            <div class="title-container">
                <h1>Connexion</h1>
            </div>
        </nav>
    </header>

    <section class="login" id="login">
        <div class="paragraph-box">
            <h4> Veuillez vous connecter pour accéder aux ressources.</h4>
            <form class="Login" action="login_handler.php" method="post">
                <div>
                    <label for="login">Login:</label>
                    <input type="text" id="login" name="login" maxlength="50" required
                        pattern="([0-9A-Za-z _]+)|(^([0-9A-Za-z]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,})$)">
                </div>
                <div>
                    <label for="password">Mot de passe:</label>
                    <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Doit contenir au moins un chiffre, une lettre majuscule et minuscule, et au moins 8 caractères">
                </div>
                <div>
                    <input type="submit" value="Connexion">
                    <button class="inscription-button"
                        onclick="window.location.href = 'inscription.php';">S'inscrire</button>
                </div>
            </form>
        </div>
    </section>

    <footer>
        <div>Harshot Games © 2024</div>
    </footer>
</body>

</html>