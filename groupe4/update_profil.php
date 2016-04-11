<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once('class/class_db.php');
    require_once('class/class_physicalPerson.php');
    require_once('class/class_address.php');
    require_once('class/class_status.php');
    require_once('class/class_connection.php');

    /*
    * Checking all the fields
    */
    $id           = check_input($_POST['id']);
    $name         = check_input($_POST['name']);
    $firstname    = check_input($_POST['firstname']);
    $origine      = check_input($_POST['origine']);
    $gender       = check_input($_POST['gender']);
    $tel          = check_input($_POST['tel']);
    $address      = check_input($_POST['address']);
    $city         = check_input($_POST['city']);
    $postalCode   = check_input($_POST['postalCode']);
    $email        = check_input($_POST['email']);
    $profession   = check_input($_POST['profession']);
    $interests    = check_input($_POST['interests']);

    /*
    * Creating Physical Person
    */
    $physicalPerson = new PhysicalPerson($id, $name, $firstname, $origine, $gender, $tel, $email, $address, $postalCode, $city, $profession, $interests);

    /*
    * Sending informations to database
    */
    $database = new Database();
    $database->open_db();

    $database->update_physicalPerson($physicalPerson);
    header("Location: membershipUpdate.php");
    exit();

    $database->close_db();

    function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
