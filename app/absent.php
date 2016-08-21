<?php 
  
  session_start();
  require "db_connect.php";

  $sql = 'INSERT INTO absent(absent_info, event_id)
		VALUES(:absent_info, :event_id)';
    $preparedStatement = $connexion->prepare($sql);

    $preparedStatement->bindValue(':absent_info', $_POST["event_absent"]);

    $preparedStatement->bindValue(':event_id', $_SESSION['event_id']);
    $preparedStatement->execute();

    header('location:event.php?id='. $_SESSION['event_id']);

?>