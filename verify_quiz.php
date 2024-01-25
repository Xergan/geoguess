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

if (isset($_POST['guess']) and isset($_SESSION['answer'])) {
    try {
        //On crée un objet $conn qui représente la connexion au SGBD
        $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . BDD, LOGIN, MDP);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Assuming $user represents the current user
        $user = $_SESSION['userinfo']['username'];
        $attempts = $_SESSION['userinfo']['attempts'];

        if ($_POST['guess'] == $_SESSION['answer']) {
            // Prepare a query to increase the user's score
            $scoreToAdd = max(50, 1000 / $attempts);

            $updateScore = $conn->prepare("UPDATE members SET score = score + $scoreToAdd WHERE user = :user");
            $updateScore->bindParam(':user', $user);
            $updateScore->execute();
        }

        header('Location: quiz.php');
        exit();

    } //fin du try
    //On capture les exceptions si une exception est lancée et on affiche les informations relatives à celle-ci
    catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

} else {
    header('Location: quiz.php');
    exit();
}

?>