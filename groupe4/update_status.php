<?php
  require_once('class/class_db.php');

  if(isset($_POST['id']) && isset($_POST['newStatus'])) {
    $database = new Database();
    $database->open_db();
    $result = $database->update_status_from_id($_POST['id'], $_POST['newStatus']);
    if($_POST['newStatus'] == 'Inscrit') {
      $result = $database->remove_membership($_POST['id']);
    }
    $database->close_db();
    header("Location: membershipGestion.php");
    exit();
  }
?>
