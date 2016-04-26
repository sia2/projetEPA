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
    $pseudo       = check_input($_POST['pseudo']);
    $password     = check_input($_POST['password']);
    $name         = check_input($_POST['name']);
    $firstname    = check_input($_POST['firstname']);
    $origine      = check_input($_POST['origine']);
    $gender       = check_input($_POST['gender']);
    $tel          = check_input($_POST['tel']);
    $streetNumber = check_input($_POST['streetNumber']);
    $streetName   = check_input($_POST['streetName']);
    $city         = check_input($_POST['city']);
    $postalCode   = check_input($_POST['postalCode']);
    $email        = check_input($_POST['email']);
    $profession   = check_input($_POST['profession']);
    $interests    = check_input($_POST['interests']);

    /*
    * Creating Physical Person
    */
    $physicalPerson = new PhysicalPerson('', $name, $firstname, $origine, $gender, $tel, $email, $profession, $interests);

    /*
    * Creating Address
    */
    $address = new Address($physicalPerson->get_id(), $streetNumber, $streetName, $postalCode);

    /*
    * Creating Connection
    */
    $connection = new Connection($physicalPerson->get_id(), $pseudo, $password);

    /*
    * Creating Status
    */
    $status = new Status($physicalPerson->get_id(), 'Inscrit');

    /*
    * Sending informations to database
    */
    $database = new Database();
    $database->open_db();

    if($database->check_availability_account($physicalPerson, $connection) == 0) {
      if($database->insert_address($address) == 0) {
        if($database->insert_connection($connection) == 0) {
          if($database->insert_status($status) == 0) {
            if($database->insert_physicalPerson($physicalPerson) == 0) {
              header("Location: index.php");
              exit();
            } else {
            }
          } else {
            echo "13";
          }
        } else {
          echo "12";
        }
      } else {
        echo $database->insert_address($address);
      }
    }

    $database->close_db();

    function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
