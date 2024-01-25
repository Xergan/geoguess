<?php
session_start();
if (!isset($_SESSION['userinfo'])) {
    header('Location: index.php');
    exit();
}

define('SERVER', "mysql-xergan.alwaysdata.net");
define('LOGIN', "xergan");
define('MDP', "/Admin1234");
define('BDD', "xergan_geoguez");

if (isset($_POST['answer'])) {
    

} else {
    header('Location: quiz.php');
    exit();
}

try {
    //On crée un objet $conn qui représente la connexion au SGBD
    $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . BDD, LOGIN, MDP);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $check = $conn->prepare("SELECT * FROM members WHERE user = :user OR email = :email");
    $check->bindParam(':user', $user);
    $check->bindParam(':email', $email);
    $check->execute();

    if ($check->rowCount() > 0) {
        // L'utilisateur existe déjà
        echo "<script>alert('L\'utilisateur existe déjà.')
        window.location.href = 'inscription.php';</script>";
        exit();
    } else {
        // L'utilisateur n'existe pas, on peut continuer l'inscription
        $insert = $conn->prepare("INSERT INTO members(user, email, password) VALUES(:user, :email, :password, :score)");
        $insert->bindParam(':user', $user);
        $insert->bindParam(':email', $email);
        $insert->bindParam(':password', $password);
        $insert->execute();
        $_SESSION['user'] = $user;
        echo "<script>alert('Vous êtes inscrit.')
        window.location.href = 'accueil.php';</script>";
        exit();
    }
}

//fin du try
//On capture les exceptions si une exception est lancée et on affiche les informations relatives à celle-ci
catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>