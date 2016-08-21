<?php 
  
  session_start();
  require "db_connect.php";

  $sql = 'SELECT unite-name FROM connect';
     $preparedStatement = $connexion->prepare($sql);
     $preparedStatement->execute();
     $ip_used = $preparedStatement->fetch();

?>

<!DOCTYPE html>
<html>
<head>

    <title> Convoc - Connexion </title>
    <meta charset="UTF-8" />

    <!-- META -->
    <meta name="description" content="Convoc - Votre convocation en ligne"/>
    <meta name="keywords" content="convocation, convoc, scout, scouting, baladin, louveteau, éclaireur, pionnier, routier, app, mobile, mobile app, ux, dashboard, timeline, agenda, calendar"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Mattelet Bruno">

    <!-- OG -->
    <meta property="og:title" content="Convoc"/>
    <meta property="og:description" content="Votre convocation en ligne"/>
    <meta property="og:email" content="bruno.mattelet@gmail.com"/>
    <meta property="og:image" content="assets/img/convoc-og.jpg"/>

    <!-- ICON -->
    <link rel="icon" type="image/png" href="assets/img/convoc-icon.png" />

    <!-- MOBILE ICON -->
    <link href="assets/img/convoc-mobile.jpg" rel="apple-touch-icon" />
    <link href="assets/img/convoc-mobile.jpg" rel="apple-touch-icon" sizes="76x76" />
    <link href="assets/img/convoc-mobile.jpg" rel="apple-touch-icon" sizes="120x120" />
    <link href="assets/img/convoc-mobile.jpg" rel="apple-touch-icon" sizes="152x152" />
    <link href="assets/img/convoc-mobile.jpg" rel="apple-touch-icon" sizes="180x180" />
    <link href="assets/img/convoc-mobile.jpg" rel="icon" sizes="192x192" />
    <link href="assets/img/convoc-mobile.jpg" rel="icon" sizes="128x128" />

    <!-- JQUERY -->
    <script type="text/javascript" src="assets/js/jquery-1.11.3.js"></script>   

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/login-style.css">

    <!-- SELECT 2 -->
    <link href="assets/css/select2.css" rel="stylesheet" />
    <script src="assets/js/select2.min.js"></script>

</head>
<body>

<!-- HEADER -->
<header id="header" class="">

<div class='logo-container'>
<img class='img-logo' src="assets/img/logo-co.png" alt="logo-convoc">
<h1 class='text-logo'>nvoc</h1>
<div>
    
</header>
<!-- END HEADER -->

<!-- MAIN -->
<main  class='log-main'> 

<form class='log-form' method="post" action="mdp.html">

<p class='form-baseline'> Choisis ton unité </p>
<select name="unite-name">
<option> </option>
</select>

    <input value="Continuer" class='form-btn'>  </input>

</form>

</main>
<!-- END MAIN -->

<footer>

<a class='inscription-link' href="#"> Inscris ton unité</a>
    
</footer>


<script type="text/javascript">

$(document).ready(function(){


var data = [{ id: 0, text: 'enhancement' }, { id: 100, text: 'bug' }, { id: 2, text: 'duplicate' }, { id: 3, text: 'invalid' }, { id: 44, text: 'wontfix' } , { id: 100, text: 'bug' }, { id: 2, text: 'duplicate' }, { id: 3, text: 'invalid' }, { id: 44, text: 'wontfix' }];

  $('select').select2({
    data: data
});

  $( "select option:selected" ).each(function() {
      if($(this).is(':selected')){$( ".form-btn" ).attr( "type", "submit" ).addClass('active');}
    });

    });
    // DOCUMENT READY END 

</script>
</body>
</html>