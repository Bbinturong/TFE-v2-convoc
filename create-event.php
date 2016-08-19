<!DOCTYPE html>
<html>
<head>

    <title> Convoc  </title>
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

    <!-- JQUERY UI -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">


</head>
<body>

<!-- HEADER -->
<header id="header" class="param-header">

    
    <a href="#"><img class='header-icon settings' src="assets/icon/back.svg" alt="icone de paramètres"></a>

    <h1 class='section-name'> Créer un événement </h1>
</header>
<!-- END HEADER -->

<!-- MAIN -->
<main> 

<form class='create_event-form' method="post" action="add-db.php">

<fieldset class='create_event-fieldset'>
    <legend>type d'événement</legend>


<h2 class='form-title'>type d'événement</h2>

<ul class='event_type-list clearfix'>
    <li>
        <input checked="true" id='reunion' name="event_type" type="radio" value='reunion'> 
        <label for="reunion"><img src="assets/icon/foulard.svg" alt=""> <p>Réunion</p></label>
    </li>
    <li>
        <input id='soiree' name="event_type" type="radio" value='soirée'> 
        <label for="soiree"><img src="assets/icon/bonfire.svg" alt=""><p>Soirée</p></label>
    </li>
    <li>
        <input id='camp' name="event_type" type="radio" value='camp'>  
        <label for="camp"><img src="assets/icon/tent.svg" alt=""><p>Camp</p></label>
    </li>
    <li>
        <input id='nothing' name="event_type" type="radio" value='nothing'> 
        <label for="nothing"><img src="assets/icon/nothing.svg" alt=""><p>Pas de réunion</p></label>
    </li>

</ul>

</fieldset>

<fieldset class='create_event-fieldset'>
    <legend>Infos principales</legend>

<h2 class='form-title'>Infos principales</h2>


<p class='form-baseline important'> Section</p>
<ul class='event_type-list section-list clearfix'>
    <li>
        <input required id='loup' name="event_section" type="radio" value='loup'> 
        <label for="loup"><div class='section_color-item'></div><p>Loup</p></label>
    </li>
    <li>
        <input id='ecl' name="event_section" type="radio" value='ecl'> 
        <label for="ecl"><div class='section_color-item'></div><p>Eclereus</p></label>
    </li>
    <li>
        <input id='bala' name="event_section" type="radio" value='bala'>  
        <label for="bala"><div class='section_color-item'></div><p>bala</p></label>
    </li>
    <li>
        <input id='pio' name="event_section" type="radio" value='pio'> 
        <label for="pio"><div class='section_color-item'></div><p>pio</p></label>
    </li>

</ul>


<p class='form-baseline important'> Titre</p>
<input required type="text" name="event_title">

<p class='form-baseline important'> Date</p>
<input required id='datepicker' type="datetime" name="event_date">

<p class='form-baseline important'> Heure de début</p>
<input required id='time' type="time" name="event_hour_start">

<p class='form-baseline'> Heure de fin</p>
<input id='time' type="time" name="event_hour_end">

<p class='form-baseline important'> Lieu</p>
<input required id='time' type="text" name="place">

</fieldset>

<fieldset class='create_event-fieldset'>
    <legend>Infos complémentaires</legend>

<h2 class='form-title'>Infos complémentaires</h2>


<p class='form-baseline important'> Déscription</p>
<input required type="textarea" rows="4" cols="50" name="event_title">

<p class='form-baseline important'> Date</p>
<input required id='datepicker' type="datetime" name="event_date">

<p class='form-baseline important'> Heure de début</p>
<input required id='time' type="time" name="event_hour_start">

<p class='form-baseline'> Heure de fin</p>
<input id='time' type="time" name="event_hour_end">

<p class='form-baseline important'> Lieu</p>
<input required id='time' type="text" name="place">

</fieldset>

    <input type='submit' value="Continuer" class='form-btn active'>  </input>
</form>

</main>
<!-- END MAIN -->

<footer>

    
</footer>


<script type="text/javascript">

$(document).ready(function(){

    $( function() {

    $( "#datepicker" ).datepicker({
  firstDay: 1,
  altField: "#datepicker",
  closeText: 'Fermer',
  prevText: 'Précédent',
  nextText: 'Suivant',
  currentText: 'Aujourd\'hui',
  monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
  monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
  dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
  dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
  dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
  weekHeader: 'Sem.',
  dateFormat: 'dd M y'});}); 


var data = [];

$.getJSON("get-unite.php").then(function( ajax_data ) {

    if (ajax_data) {
        console.log(ajax_data)
        data = ajax_data;
    }
});


  $( "select option:selected" ).each(function() {
      if($(this).is(':selected')){$( ".form-btn" ).attr( "type", "submit" ).addClass('active');}
    });

    });
    // DOCUMENT READY END 

</script>
</body>
</html>