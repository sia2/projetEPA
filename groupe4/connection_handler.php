<?php
    session_start();

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once('class/class_db.php');
    require_once('class/class_connection.php');

    /*
    * Checking all the fields
    */
    $pseudo     = check_input($_POST['pseudo']);
    $password   = check_input($_POST['password']);

    /*
    * Sending informations to database
    */
    $database = new Database();
    $database->open_db();
    if($database->check_account($pseudo, $password) == 0) {
        $_SESSION['pseudo']           = $pseudo;
        $_SESSION['password']         = $password;
        $_SESSION['status']           = $database->get_status($pseudo, $password);
        $_SESSION['membership'] = $database->get_membership($pseudo, $password);
        $_SESSION['membershipDemand'] = $database->get_membershipDemand($pseudo, $password);
        $database->close_db();
        header("Location: connected.php");
        exit();
    } else {
        $database->close_db();
        $_SESSION['failedConnection'] = 'Mauvais identifiants';
        header("Location: index.php");
        exit();
    }

    function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
