<?php
    session_start();

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once('class/class_db.php');
    require_once('class/class_membershipDemand.php');

    extract($_SESSION);

    $database = new Database();
    $database->open_db();
    $id = $database->get_id_from_account($user, $password);
    $result = $database->insert_membershipDemand(new membershipDemand($id));
    if(isset($_SESSION) && $result == 0) {
      $_SESSION['membershipDemand'] = 'exist';
    }
    $database->close_db();
    header("Location: connected.php");
    exit();

    exit();
?>
