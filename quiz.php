<?php
session_start();
if (!isset($_SESSION['userinfo'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Accueil</title>

    <meta content="PHP - Accueil" property="og:title" />
    <meta content="Site de test." property="og:description" />
    <meta content="#c5a4ff" data-react-helmet="true" name="theme-color" />

    <link rel="stylesheet" href="style.css">
    <script src="functions.js"></script>
</head>

<body>
    <header>
        <nav class="nav-bar">
            <div class="title-container">
                <h1>Espace Membres</h1>
            </div>

            <ul class="nav-container-right">
                <button onclick="confirmDelete()">Supprimer le compte</button>
                <button class="button" onclick="window.location.href = './delete_session.php'">Déconnexion</button>
            </ul>
        </nav>
    </header>

    <section class="profil" id="profil">
        <div class="paragraph-box">
            <h1>Profil</h1>
            <br>
            <h4> Bienvenue
                <?php echo $_SESSION['userinfo']['user']; ?> !
            </h4>
            <br>
            <h4> Avatar :</h4>
            <img <?php if (file_exists("Ressources/Images/" . $_SESSION['userinfo']['user'] . ".png")) {
                echo "src='Ressources/Images/" . $_SESSION['userinfo']['user'] . ".png', style='width: 100px; height: 100px'";
            } else {
                echo "src='Ressources/Images/blank.png' style='width: 100px; height: 100px'";
            } ?>
                alt="Avatar" class="avatar" id="avatar" onclick="document.getElementById('fileToUpload').click();">
            <br>
            <form action="upload_handler.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload" accept="image/png, image/jpeg"
                    style="display: none;">
                <input type="submit" value="Changer d'avatar" name="submit">
            </form>

            <br>
        </div>

    </section>

    <footer>
        <div>Harshot Games © 2024</div>
    </footer>
</body>

</html>