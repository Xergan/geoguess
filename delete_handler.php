<?php
session_start();
if (!isset($_SESSION['userinfo'])) {
    header('Location: index.php');
    exit();
}

define('SERVER', "127.0.0.1");
define('LOGIN', "root");
define('MDP', "");
define('BDD', "site_log_test");

try {
    //On crée un objet $conn qui représente la connexion au SGBD
    $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . BDD, LOGIN, MDP);
    //On crée un rapport d’erreur et on définit le mode d'erreur de PDO sur Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Supprimer le compte
    $delete = $conn->prepare("DELETE FROM members WHERE user = :login OR email = :login");
    $delete->bindParam(':login', $_SESSION['userinfo']['user']);
    $delete->execute();
    header('Location: delete_session.php');
    exit();

} //fin du try
//On capture les exceptions si une exception est lancée et on affiche les informations relatives à celle-ci
catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>