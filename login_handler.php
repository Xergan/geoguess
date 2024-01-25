<?php
session_start();
define('SERVER', "mysql-xergan.alwaysdata.net");
define('LOGIN', "xergan");
define('MDP', "/Admin1234");
define('BDD', "xergan_geoguez");

try {
    //On crée un objet $conn qui représente la connexion au SGBD
    $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . BDD, LOGIN, MDP);
    //On crée un rapport d’erreur et on définit le mode d'erreur de PDO sur Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['login']) && isset($_POST['password'])) {

        // Sélectionner l'utilisateur dans la base de données
        $query = $conn->prepare("SELECT * FROM members WHERE user = :login OR email = :login");
        $query->bindParam(':login', $_POST['login']);
        $query->execute();
        $userinfo = $query->fetch(PDO::FETCH_ASSOC);

        // Vérifier le mot de passe
        if (password_verify($_POST['password'], $userinfo['password'])) {
            $_SESSION['userinfo'] = $userinfo;
            header('Location: accueil.php');
            exit();
        } else {
            echo "<script>alert('Mauvais identifiant ou mot de passe.')
            window.location.href = 'index.php';</script>";
            exit();
        }

    }

} //fin du try
//On capture les exceptions si une exception est lancée et on affiche les informations relatives à celle-ci
catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>