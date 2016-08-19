<?php 
  
  session_start();
  require "db_connect.php";

    $sql = 'SELECT * FROM connect WHERE unite_name = :unite_name';
     $preparedStatement = $connexion->prepare($sql);
     $preparedStatement->bindValue(':unite_name', 'admin' );
     $preparedStatement->execute();
     $get_info = $preparedStatement->fetch();

     $_SESSION['unite_name'] = $get_info['unite_name'];
     header("location:mdp.php");
/*
if (empty($get_info)) { 
  header("location:lololo.php"); 
} else {
  header("location:mdp.php");
}
*/

?>