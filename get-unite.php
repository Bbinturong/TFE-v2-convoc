<?php 
  
    session_start();
    require "db_connect.php";

    $sql = 'SELECT unite_name FROM connect';
     $preparedStatement = $connexion->prepare($sql);
     $preparedStatement->execute();

     $ola = $preparedStatement->fetch();

     echo json_encode( $ola);

?>