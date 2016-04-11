<?php
  require_once('class/class_db.php');
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  if(isset($_GET['name']) && ($_GET['firstname'] != '' && $_GET['name'] != '')) {
    $name = $_GET['name'];
    $firstname = $_GET['firstname'];
    $database = new Database();
    $database->open_db();
    $database->user_suggestion($name, $firstname);
    $database->close_db();
  } else {}
?>
