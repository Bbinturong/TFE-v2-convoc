<?php 
  
  session_start();
  require "db_connect.php";

 $error = [];

/* Retirer tout les espace en trop et retirer toutes les balises HTML  */
$mdp = trim(strip_tags($_POST["mdp"]));


 /* Verification de l'envoi du FORM */
 /* $_POST = l'envoi du formulaire et toutes ses clefs */
 if ( !empty($_POST) ) {

    $sql = 'SELECT * FROM connect WHERE unite_name = :unite_name';
     $preparedStatement = $connexion->prepare($sql);
     $preparedStatement->bindValue(':unite_name', $_SESSION['unite_name']);
     $preparedStatement->execute();
     $unite_name = $preparedStatement->fetch();
 /* On filtre la variable email selon le filtre FILTER_VALIDATE_EMAIL */
  if (empty($mdp)) {
   $error["mdp_empty"] = "Veuillez inscrire un mot de passe";

  } elseif ($mdp == $unite_name['mdp_anim']) {
    header("location:anim/app.php");
  } elseif ($mdp == $unite_name['mdp_parent']) {
    header("location:parent/app.php");
  } else {

   $error["false"] = "Le mot de passe n'est pas correct";
  }

}

/* Montre les erreurs sous chaque input */
function showError($array, $err){
  if ($array[$err] != "") {
    
   return "<p class='alert'>". $array[$err] . "</p>";
  }
}


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
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <style type="text/css" media="screen">
      html, body {

    position: relative;
    overflow: hidden;
      }
    </style>

</head>
<body>

<!-- HEADER -->
<header id="header" class="mdp-header">

<img class='header-logo' src="assets/img/logo-co.png" alt="logo-convoc">
<h1 class='mdp-unite-name'> <?php echo $_SESSION['unite_name']; ?> </h1>
    
</header>
<!-- END HEADER -->

<!-- MAIN -->
<main class='mdp-main'> 

<form class='mdp-form' method="post" action="">

<p class='form-baseline'> Mot de passe </p>
<input id='password' type="password" name="mdp" pattern="[0-9]*" inputmode="numeric">

  <?= showError($error, "false"); ?>
  <?= showError($error, "mdp_empty"); ?>

    <input value="Continuer" class='form-btn' >  

    <p class='btn-baseline'> Veuillez remplir les champs d'abords</p>
    </input>


</form>


</main>
<!-- END MAIN -->

<footer class='log-footer'>

<a class='inscription-link' href="index.php"> retour </a>
    
</footer>


<script type="text/javascript">

$('#password').focusout(function() {
    if ($(this).val().length === 0) { 
        console.log('test');
    } else {
        $( ".form-btn" ).attr( "type", "submit" ).addClass('active');
    }
});

 /* IF CICK ON THE MAIN BUTTON AND NO-ACTIVE IS SET */
    $(".form-btn").click(function(){ 
        /* CHECK THE MAIN BTN */
        var active = $( ".form-btn" ).hasClass( "active" );

        if (!active) {

            $( ".btn-baseline" ).addClass("show-baseline");
        setTimeout( function(){ $( ".btn-baseline" ).removeClass("show-baseline"); }, 1500);
        }
        
    }); 


</script>
</body>
</html>