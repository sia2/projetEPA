<?php
  require_once('class/class_db.php');

  if(isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['id'])) {
    $database = new Database();
    $database->open_db();
    $result = $database->remove_membership($_POST['id']);
    $database->update_status_from_id($_POST['id'], 'Inscrit');
    $database->close_db();
    header("Location: membershipGestion.php");
    exit();
  }
?>
