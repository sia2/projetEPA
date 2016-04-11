<?php
  require_once('class/class_db.php');

  if(isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['id'])) {
    $database = new Database();
    $database->open_db();
    $result = $database->accept_membershipDemand($_POST['id']);
    $database->update_status_from_id($_POST['id'], 'Adherent');
    $database->close_db();
    header("Location: membershipDemand.php");
    exit();
  }
?>
