<?php
  require_once('class/class_db.php');

  if(isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['id'])) {
    $database = new Database();
    $database->open_db();
    $result = $database->refuse_membershipDemand($_POST['id']);
    $database->close_db();
    header("Location: membershipDemand.php");
    exit();
  }
?>
