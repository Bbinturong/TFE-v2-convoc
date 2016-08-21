<?php 
  
  session_start();
  require "../db_connect.php";

  $sql = 'SELECT * FROM section WHERE unite_name = :unite_name';
     $preparedStatement = $connexion->prepare($sql);
     $preparedStatement->bindValue(':unite_name', 'admin');
     $preparedStatement->execute();
     $section_info = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['unite_name'] = 'admin';  

?>

<!DOCTYPE html>
<html>
<head>

    <title> event </title>
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
    <meta property="og:image" content="../assets/img/convoc-og.jpg"/>

    <!-- ICON -->
    <link rel="icon" type="image/png" href="../assets/img/convoc-icon.png" />

    <!-- MOBILE ICON -->
    <link href="../assets/img/convoc-mobile.jpg" rel="apple-touch-icon" />
    <link href="../assets/img/convoc-mobile.jpg" rel="apple-touch-icon" sizes="76x76" />
    <link href="../assets/img/convoc-mobile.jpg" rel="apple-touch-icon" sizes="120x120" />
    <link href="../assets/img/convoc-mobile.jpg" rel="apple-touch-icon" sizes="152x152" />
    <link href="../assets/img/convoc-mobile.jpg" rel="apple-touch-icon" sizes="180x180" />
    <link href="../assets/img/convoc-mobile.jpg" rel="icon" sizes="192x192" />
    <link href="../assets/img/convoc-mobile.jpg" rel="icon" sizes="128x128" />

    <!-- JQUERY -->
    <script type="text/javascript" src="../assets/js/jquery-1.11.3.js"></script>   

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

    <!-- JS -->
    <script type="text/javascript" src="../assets/js/top-calendar.js"></script>  

</head>
<body>

<!-- HEADER -->
<header id="header" class="param-header">

    
    <a href="app.php"><img class='header-icon settings' src="../assets/icon/back.svg" alt="icone de paramètres"></a>

    <h1 class='section-name'> paramètres </h1>
</header>
<!-- END HEADER -->

<!-- MAIN -->
<main class='param-main'> 

<h1 class='param-unite_name'> <?= $_SESSION['unite_name']; ?> </h1>
<h2 class='form-title'>Afficher</h2>
<section class='param-section'>

<h3 class='param-section-title'> Sections </h3>

<ul class='param-list'>
<?php 
        
        $i = 0;
        foreach($section_info as $row) {

        echo "
        <li class=" . $row['section_color'] . "-param" . "> <p> " . $row['section_name']. " </p> <div class='custom-checkbox'>
  <input class='custom-checkbox-input' type='checkbox' id='custom-checkbox-discovery". $i ."'/>
  <label class='custom-checkbox-label' for='custom-checkbox-discovery". $i ."'>
    <label class='custom-checkbox-label-aux' for='custom-checkbox-discovery". $i ."'>
  </label>
</div> </li>
        ";

        $i++; 
        }

?>

</ul>
    

</section>

<section class='param-section'>

<h3 class='param-section-title'> Type d'activités </h3>

<ul class='param-list'>
    <li> <p> Réunion </p> <div class='custom-checkbox'>
  <input class='custom-checkbox-input' type='checkbox' id='custom-checkbox-discovery-reunion'/>
  <label class='custom-checkbox-label' for='custom-checkbox-discovery-reunion'>
    <label class='custom-checkbox-label-aux' for='custom-checkbox-discovery-reunion'>
  </label> </li>
    <li> <p> Soirée </p> <div class='custom-checkbox'>
  <input class='custom-checkbox-input' type='checkbox' id='custom-checkbox-discovery-soiree'/>
  <label class='custom-checkbox-label' for='custom-checkbox-discovery-soiree'>
    <label class='custom-checkbox-label-aux' for='custom-checkbox-discovery-soiree'>
  </label></li>
    <li> <p> Camp </p><div class='custom-checkbox'>
  <input class='custom-checkbox-input' type='checkbox' id='custom-checkbox-discovery-camp'/>
  <label class='custom-checkbox-label' for='custom-checkbox-discovery-camp'>
    <label class='custom-checkbox-label-aux' for='custom-checkbox-discovery-camp'>
  </label></li>
    <li> <p> Pas de réunion </p> <div class='custom-checkbox'>
  <input class='custom-checkbox-input' type='checkbox' id='custom-checkbox-discovery-nothing'/>
  <label class='custom-checkbox-label' for='custom-checkbox-discovery-nothing'>
    <label class='custom-checkbox-label-aux' for='custom-checkbox-discovery-nothing'>
  </label></li>
  <li> <p>Privé </p> <div class='custom-checkbox'>
  <input class='custom-checkbox-input' type='checkbox' id='custom-checkbox-discovery-private'/>
  <label class='custom-checkbox-label' for='custom-checkbox-discovery-private'>
    <label class='custom-checkbox-label-aux' for='custom-checkbox-discovery-private'>
  </label></li>
</ul>
    

</section>

<h2 class='form-title'>Paramètres de l'application</h2>
<section class='param-section'>

<h3 class='param-section-title'> Notifications </h3>

<ul class='param-list'>
    <li> <p> Notifications Push </p> <div class='custom-checkbox'>
  <input class='custom-checkbox-input' type='checkbox' id='custom-checkbox-discovery-notif'/>
  <label class='custom-checkbox-label' for='custom-checkbox-discovery-notif'>
    <label class='custom-checkbox-label-aux' for='custom-checkbox-discovery-notif'>
  </label> </li>
</ul>

<h3 class='param-section-title'> Autre </h3>

<ul class='param-list'>
  <li> <p> Voir événements passé </p> <div class='custom-checkbox'>
  <input class='custom-checkbox-input' type='checkbox' id='custom-checkbox-discovery-past'/>
  <label class='custom-checkbox-label' for='custom-checkbox-discovery-past'>
    <label class='custom-checkbox-label-aux' for='custom-checkbox-discovery-past'>
  </label> </li>
</ul>
    
    

</section>
<img class='param-logo' src="../assets/img/param-logo.png" alt="logo-convoc">
<p class='param-logo-baseline'>Convoc v1.0.0</p>
<p class='param-logo-baseline tiny'>Made by Bruno Mattelet </p>
<a href="../" class='form-btn active'>Changer d'unité</a>

</main>
<!-- END MAIN -->


<script type="text/javascript">  

</script>
</body>
</html>