<?php   

    session_start();
    require "../db_connect.php";


    $sql = 'SELECT * FROM event WHERE id = :id';
     $preparedStatement = $connexion->prepare($sql);
     $preparedStatement->bindValue(':id',  $_GET["id"]);
     $preparedStatement->execute();
     $event_id = $preparedStatement->fetch();

     $_SESSION['event_id'] = $event_id['id'];

    $sql = 'SELECT * FROM section WHERE section_name = :section_name AND unite_name = :unite_name';
     $preparedStatement = $connexion->prepare($sql);
     $preparedStatement->bindValue(':section_name',  $event_id['event_section']);
     $preparedStatement->bindValue(':unite_name', $event_id['unite_name']);
     $preparedStatement->execute();
     $section_info = $preparedStatement->fetch();


    $sql = 'SELECT * FROM animateur WHERE anim_section = :section_name AND unite_name = :unite_name';
     $preparedStatement = $connexion->prepare($sql);
     $preparedStatement->bindValue(':section_name',  $event_id['event_section']);
     $preparedStatement->bindValue(':unite_name', $event_id['unite_name']);
     $preparedStatement->execute();
     $anim_info = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);

    $sql = 'SELECT * FROM item WHERE event_id = :event_id';
     $preparedStatement = $connexion->prepare($sql);
     $preparedStatement->bindValue(':event_id',  $event_id['id']);
     $preparedStatement->execute();
     $item_list = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);   
    

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
<header id="header" class="event-header <?= $section_info['section_color'].'-bg'; ?>">

    <a href="app.php">
    <img class='header-icon settings' src="../assets/icon/back.svg" alt="icone de paramètres">
    </a>

    <h1 class='section-name'> <?= $event_id['event_section']; ?> </h1>

    <div class='top-calendar-title'><h2 class='day-title'> Samedi <span class='day-title-number'> 17 </span> </h2><h3 class='month-title'>Novembre <span class='year-title'> 2016</span></h3></div>
    <!--ul class='top-calendar'>
    </ul-->
    
</header>
<!-- END HEADER -->


<!-- MODAL -->

<div class='modal'>

<h2 class='modal-title'> C'est dommage !</h2>

<form class='modal-form' action="absent.php" method="post" accept-charset="utf-8">
   
    <p class='form-baseline'> Qui ne participeras pas ?</p>
    <input class='' type="text" name="event_absent">
    <input type='submit' value="Prévenir" class='form-btn active' > 
    <p class='annuler'>Annuler</p>
</form>
    

</div>

<!-- END MODAL -->

<!-- MAIN -->
<main class='event-main'> 

<nav class='event-menu'>
    <ul class='clearfix'>
        <li class='nav-btn btn-info selected'><a  class=<?= $section_info['section_color'].'-nav'; ?>> <svg version="1.1" x="0px" y="0px"
     viewBox="0 0 464 464" enable-background=new 0 0 464 464">
<g>
    <path d="M240,80.179v-0.984c18.235-3.717,32-19.878,32-39.195c0-22.056-17.944-40-40-40c-22.056,0-40,17.944-40,40
        c0,19.317,13.764,35.479,32,39.195v0.984C121.828,84.39,40,168.812,40,272c0,105.869,86.131,192,192,192s192-86.131,192-192
        C424,168.812,342.172,84.39,240,80.179z M208,40c0-13.233,10.767-24,24-24s24,10.767,24,24c0,10.429-6.689,19.321-16,22.624V48
        c0-4.418-3.582-8-8-8c-4.418,0-8,3.582-8,8v14.624C214.689,59.321,208,50.429,208,40z M232,448c-97.047,0-176-78.953-176-176
        S134.953,96,232,96s176,78.953,176,176S329.047,448,232,448z"/>
    <path d="M370.693,209.719c-1.812-4.029-6.545-5.827-10.577-4.015c-4.029,1.812-5.827,6.548-4.015,10.577
        C363.997,233.837,368,252.584,368,272c0,74.991-61.01,136-136,136c-74.991,0-136-61.009-136-136s61.009-136,136-136
        c12.85,0,25.562,1.788,37.782,5.315c4.241,1.224,8.678-1.223,9.904-5.468c1.225-4.245-1.224-8.679-5.469-9.904
        C260.556,121.999,246.352,120,232,120c-83.813,0-152,68.187-152,152s68.187,152,152,152c83.813,0,152-68.187,152-152
        C384,250.306,379.523,229.352,370.693,209.719z"/>
    <path d="M300.939,154.741c15.015,8.847,28.042,20.338,38.723,34.152c1.576,2.039,3.942,3.107,6.335,3.107
        c1.709,0,3.431-0.545,4.888-1.672c3.495-2.702,4.138-7.727,1.436-11.222c-11.93-15.43-26.484-28.265-43.258-38.15
        c-3.81-2.244-8.711-0.975-10.954,2.831C295.865,147.594,297.133,152.498,300.939,154.741z"/>
    <path d="M313.525,198.084c-0.006-0.138-0.016-0.275-0.03-0.413c-0.012-0.116-0.026-0.231-0.043-0.346
        c-0.02-0.142-0.044-0.283-0.072-0.424c-0.023-0.115-0.049-0.229-0.077-0.342c-0.033-0.135-0.069-0.269-0.109-0.403
        c-0.038-0.125-0.08-0.248-0.124-0.371c-0.042-0.117-0.084-0.234-0.132-0.35c-0.058-0.142-0.123-0.281-0.189-0.42
        c-0.031-0.065-0.055-0.132-0.089-0.197c-0.016-0.032-0.036-0.06-0.053-0.092c-0.076-0.144-0.16-0.284-0.244-0.424
        c-0.054-0.089-0.107-0.18-0.164-0.266c-0.084-0.126-0.175-0.248-0.266-0.37c-0.069-0.092-0.135-0.186-0.208-0.274
        c-0.085-0.104-0.177-0.203-0.268-0.303c-0.088-0.096-0.173-0.195-0.265-0.286c-0.083-0.083-0.173-0.161-0.26-0.241
        c-0.109-0.099-0.216-0.199-0.329-0.292c-0.081-0.066-0.167-0.127-0.251-0.191c-0.128-0.097-0.257-0.193-0.39-0.281
        c-0.082-0.054-0.167-0.104-0.252-0.155c-0.144-0.088-0.288-0.174-0.436-0.252c-0.031-0.016-0.058-0.036-0.089-0.052
        c-0.063-0.032-0.129-0.056-0.193-0.087c-0.14-0.067-0.281-0.132-0.425-0.191c-0.116-0.048-0.232-0.09-0.349-0.131
        c-0.123-0.044-0.246-0.086-0.371-0.124c-0.135-0.041-0.27-0.077-0.406-0.11c-0.112-0.028-0.224-0.053-0.337-0.076
        c-0.144-0.029-0.287-0.053-0.432-0.074c-0.113-0.016-0.225-0.03-0.339-0.042c-0.14-0.014-0.28-0.024-0.421-0.031
        c-0.123-0.006-0.245-0.009-0.369-0.009c-0.13,0-0.259,0.003-0.388,0.009c-0.134,0.006-0.268,0.016-0.402,0.03
        c-0.12,0.012-0.239,0.027-0.358,0.044c-0.138,0.02-0.275,0.043-0.412,0.071c-0.119,0.023-0.237,0.051-0.355,0.08
        c-0.131,0.032-0.261,0.067-0.391,0.106s-0.258,0.083-0.385,0.128c-0.112,0.04-0.224,0.081-0.335,0.126
        c-0.148,0.061-0.293,0.127-0.437,0.197c-0.061,0.03-0.124,0.052-0.185,0.083l-86.29,44.164c-4.371,1.966-8.398,4.722-11.889,8.212
        c-2.308,2.308-4.266,4.835-5.891,7.508c-0.188,0.276-0.367,0.562-0.523,0.868l-0.118,0.231c-0.561,0.994-1.083,2.004-1.553,3.033
        l-44.291,86.538c-0.035,0.068-0.06,0.139-0.093,0.207c-0.064,0.134-0.126,0.268-0.182,0.404c-0.05,0.121-0.094,0.242-0.137,0.364
        c-0.042,0.119-0.083,0.238-0.119,0.358c-0.042,0.137-0.078,0.275-0.112,0.413c-0.027,0.111-0.053,0.222-0.075,0.333
        c-0.029,0.144-0.053,0.287-0.074,0.431c-0.016,0.114-0.03,0.227-0.042,0.341c-0.014,0.139-0.024,0.277-0.03,0.416
        c-0.006,0.125-0.009,0.251-0.009,0.376c0,0.126,0.003,0.251,0.009,0.376c0.006,0.139,0.017,0.277,0.03,0.416
        c0.012,0.114,0.026,0.228,0.042,0.341c0.021,0.144,0.045,0.288,0.074,0.431c0.022,0.112,0.048,0.223,0.075,0.333
        c0.034,0.138,0.07,0.275,0.112,0.413c0.036,0.121,0.077,0.239,0.119,0.358c0.043,0.122,0.087,0.244,0.137,0.364
        c0.056,0.137,0.118,0.271,0.182,0.404c0.033,0.069,0.058,0.139,0.093,0.207c0.013,0.026,0.031,0.048,0.044,0.073
        c0.158,0.301,0.332,0.592,0.527,0.872c0.031,0.045,0.066,0.086,0.098,0.13c0.167,0.228,0.346,0.447,0.538,0.657
        c0.06,0.066,0.119,0.131,0.18,0.195c0.22,0.226,0.45,0.444,0.699,0.646c0.01,0.008,0.019,0.018,0.029,0.026
        c0.248,0.198,0.514,0.378,0.789,0.549c0.09,0.056,0.182,0.106,0.274,0.158c0.099,0.056,0.194,0.119,0.297,0.171
        c0.09,0.046,0.184,0.078,0.275,0.12c0.131,0.061,0.262,0.12,0.395,0.173c0.202,0.082,0.406,0.151,0.611,0.215
        c0.115,0.036,0.228,0.074,0.345,0.104c0.244,0.064,0.489,0.111,0.735,0.151c0.088,0.014,0.174,0.035,0.263,0.046
        c0.338,0.044,0.677,0.07,1.015,0.07c0.002,0,0.004,0,0.006,0s0.004,0,0.006,0c0.337,0,0.676-0.026,1.014-0.07
        c0.089-0.012,0.176-0.032,0.265-0.047c0.245-0.04,0.49-0.087,0.733-0.151c0.117-0.031,0.23-0.069,0.346-0.104
        c0.205-0.064,0.408-0.133,0.61-0.214c0.134-0.053,0.264-0.112,0.395-0.173c0.091-0.042,0.185-0.074,0.275-0.121l86.286-44.162
        c4.373-1.966,8.401-4.722,11.892-8.214c3.491-3.491,6.247-7.519,8.213-11.892l44.163-86.287c0.033-0.065,0.057-0.132,0.089-0.197
        c0.066-0.139,0.131-0.278,0.189-0.42c0.048-0.116,0.09-0.233,0.132-0.351c0.044-0.123,0.086-0.246,0.124-0.371
        c0.041-0.134,0.076-0.269,0.109-0.403c0.028-0.114,0.054-0.227,0.077-0.342c0.028-0.141,0.052-0.283,0.072-0.424
        c0.017-0.115,0.031-0.23,0.043-0.346c0.014-0.138,0.024-0.275,0.03-0.413c0.006-0.126,0.009-0.251,0.009-0.377
        C313.534,198.335,313.531,198.209,313.525,198.084z M252.623,284.292c-1.008,1.684-2.23,3.255-3.654,4.679
        c-1.421,1.421-2.989,2.642-4.67,3.648l-2.729,1.396C238.59,295.313,235.349,296,232,296c-6.411,0-12.438-2.496-16.971-7.029
        c-7.331-7.331-8.891-18.254-4.736-27.146l0.82-1.603c1.046-1.857,2.336-3.613,3.915-5.193c1.419-1.419,2.985-2.638,4.662-3.644
        l2.743-1.404c2.979-1.295,6.219-1.981,9.565-1.981c6.41,0,12.437,2.496,16.97,7.03c4.533,4.533,7.03,10.56,7.03,16.97
        c0,3.35-0.688,6.593-1.986,9.575L252.623,284.292z M203.716,300.284c3.165,3.165,6.771,5.726,10.675,7.643L176.87,327.13
        l19.215-37.542C197.972,293.452,200.509,297.077,203.716,300.284z M260.284,243.716c-3.165-3.165-6.771-5.726-10.674-7.643
        l37.521-19.204l-19.204,37.522C266.01,250.488,263.449,246.881,260.284,243.716z"/>
</g></svg><p>infos</p></a></li>

        <li class='nav-btn btn-backpack'><a class=<?= $section_info['section_color'].'-nav'; ?>>
<svg version="1.1" x="0px" y="0px"
     viewBox="0 0 100 100" enable-background="new 0 0 100 100">
<g>
    <path d="M43.1,52.5h13.8c3.1,0,5.6-2.5,5.6-5v-2.8c0-3.1-2.5-5.6-5.6-5.6H43.1c-3.1,0-5.6,2.5-5.6,5.6v2.8
        C37.5,50,40,52.5,43.1,52.5z M41.3,44.7c0-1.3,0.6-1.9,1.9-1.9h13.8c1.2,0,1.9,0.6,1.9,1.9v2.8c0,1.3-0.6,1.9-1.9,1.9H43.1
        c-1.3,0-1.9-0.6-1.9-1.9V44.7z"/>
    <path d="M76.3,56.3H23.8c-1.9,0-3.8,1.3-3.8,3.1v30c0,1.9,1.9,3.8,3.8,3.8h52.5c1.9,0,3.8-1.9,3.8-3.8v-30
        C80,57.5,78.1,56.3,76.3,56.3z M23.8,89.4v-30h52.5v30H23.8z"/>
    <path d="M90.6,56.3h-3.8V21.9c1.3-1.9,1.9-3.8,1.9-5.6V6.9c0-3.8-3.1-6.9-6.9-6.9H18.1c-3.8,0-6.9,3.1-6.9,6.9v8.8
        c0,1.9,0.6,4.4,1.9,5.6v35H9.4c-1.9,0-3.1,1.3-3.1,3.1v30c0,1.9,1.9,3.8,3.8,3.8h3.8c0,3.8,3.1,6.9,6.9,6.9H80
        c3.8,0,6.9-3.1,6.9-6.9h3.8c1.9,0,3.8-1.9,3.8-3.8v-30C93.8,57.5,92.5,56.3,90.6,56.3z M90.6,59.4v5h-3.8v-5H90.6z M15,6.9
        c0-1.9,1.9-3.8,3.7-3.8h63.1c1.9,0,3.8,1.9,3.8,3.8v8.8c0,3.8-3.1,6.9-6.9,6.9h-1.9v-5c0-1.3-0.6-1.9-1.9-1.9h-6.9
        c-1.3,0-1.9,0.6-1.9,1.9v5H34.4v-5c0-1.3-0.6-1.9-1.9-1.9h-6.9c-1.3,0-1.9,0.6-1.9,1.9v5h-1.9c-3.8,0-6.9-3.1-6.9-6.9V6.9z
         M69.4,33.1h3.8v3.8h-3.8V33.1z M69.4,30v-3.8h3.8V30C73.1,30,69.4,30,69.4,30z M69.4,22.5v-3.1h3.8v3.7h-3.8V22.5z M27.5,33.1h3.8
        v3.8h-3.8V33.1z M27.5,30v-3.8h3.8V30C31.3,30,27.5,30,27.5,30z M27.5,22.5v-3.1h3.8v3.7h-3.8V22.5z M13.1,59.4v5H9.4v-5H13.1z
         M9.4,89.4V68.1h3.7v21.2C13.1,89.4,9.4,89.4,9.4,89.4z M83.1,93.1c0,1.9-1.9,3.8-3.8,3.8H20c-1.9,0-3.8-1.9-3.8-3.8V25
        c1.3,0.6,3.1,1.2,5,1.2h1.9V30c-1.3,0-1.9,0.6-1.9,1.9c0,1.3,0.6,1.9,1.9,1.9v5c0,1.3,0.6,1.9,1.9,1.9h6.9c1.3,0,1.9-0.6,1.9-1.9
        v-5.6c1.3,0,1.9-0.6,1.9-1.9c0-1.2-0.6-1.9-1.9-1.9v-3.1h31.9V30c-1.3,0-1.9,0.6-1.9,1.9c0,1.3,0.6,1.9,1.9,1.9v5
        c0,1.3,0.6,1.9,1.9,1.9h6.9c1.3,0,1.9-0.6,1.9-1.9v-5.6c1.2,0,1.9-0.6,1.9-1.9c0-1.2-0.6-1.9-1.9-1.9v-3.1h1.9c1.9,0,3.8-0.6,5-1.3
        C83.1,25,83.1,93.1,83.1,93.1z M86.9,89.4V68.1h3.8v21.2C90.6,89.4,86.9,89.4,86.9,89.4z"/>
    <path d="M70,68.8h1.2c1.3,0,1.9-0.6,1.9-1.9c0-1.8-1.3-1.9-2.5-1.9H29.4c-1.2,0-1.9,0.6-1.9,1.9s0.6,1.9,1.9,1.9h36.9H70z"/>
    <path d="M60.3,77.2h1.3c1.2,0,1.9-0.6,1.9-1.9c0-1.8-1.3-1.9-2.5-1.9H39.1c-1.3,0-1.9,0.6-1.9,1.9s0.6,1.9,1.9,1.9h17.4H60.3z"/>
</g>
</svg>
 <p>sac à dos</p></a></li>
        <li class='nav-btn btn-contact'><a class=<?= $section_info['section_color'].'-nav'; ?>><svg version="1.1" viewBox="0 0 464 464" enable-background="new 0 0 464 464">
<g>
    <path d="M316,160V24c0-13.233-10.767-24-24-24s-24,10.767-24,24v136H148c-17.645,0-32,14.355-32,32v240c0,17.645,14.355,32,32,32
        h168c17.645,0,32-14.355,32-32V192C348,174.355,333.645,160,316,160z M284,24c0-4.411,3.589-8,8-8s8,3.589,8,8v136h-16V24z
         M332,432c0,8.822-7.178,16-16,16h-16v-16c0-4.418-3.582-8-8-8s-8,3.582-8,8v16H148c-8.822,0-16-7.178-16-16V192
        c0-8.822,7.178-16,16-16h136v224c0,4.418,3.582,8,8,8s8-3.582,8-8V176h16c8.822,0,16,7.178,16,16V432z"/>
    <path d="M208,192c-33.084,0-60,26.916-60,60s26.916,60,60,60s60-26.916,60-60S241.084,192,208,192z M208,296
        c-24.262,0-44-19.738-44-44s19.738-44,44-44s44,19.738,44,44S232.262,296,208,296z"/>
    <path d="M228,244c-4.418,0-8,3.582-8,8c0,6.617-5.383,12-12,12s-12-5.383-12-12s5.383-12,12-12c4.418,0,8-3.582,8-8s-3.582-8-8-8
        c-15.439,0-28,12.561-28,28s12.561,28,28,28s28-12.561,28-28C236,247.582,232.418,244,228,244z"/>
    <path d="M248,328h-4c-4.418,0-8,3.582-8,8s3.582,8,8,8h4c2.168,0,4,1.832,4,4v64c0,2.168-1.832,4-4,4h-80c-2.168,0-4-1.832-4-4v-64
        c0-2.168,1.832-4,4-4h44c4.418,0,8-3.582,8-8s-3.582-8-8-8h-44c-11.028,0-20,8.972-20,20v64c0,11.028,8.972,20,20,20h80
        c11.028,0,20-8.972,20-20v-64C268,336.972,259.028,328,248,328z"/>
    <path d="M316,192c-4.418,0-8,3.582-8,8v16c0,4.418,3.582,8,8,8s8-3.582,8-8v-16C324,195.582,320.418,192,316,192z"/>
    <path d="M316,240c-4.418,0-8,3.582-8,8v16c0,4.418,3.582,8,8,8s8-3.582,8-8v-16C324,243.582,320.418,240,316,240z"/>
</g></svg> <p>contact</p></a></li>
    </ul>
</nav>

<section class='event-main-info'>

        <h2 class='event-title'> <?= $event_id['event_title']; ?> </h2>
        <p class='info-baseline info-hour'><span class='hour-start'><?= $event_id['event_hour_start']; ?></span> <span class='hour-end'><?= $event_id['event_hour_end']; ?></span></p>
        <p class='info-baseline info-location'> <?= $event_id['event_place']; ?></p>  

</section>

<section class='event-info info visible'>

<h3 class='event-info-title'> infos </h3>

<p><?= $event_id['event_description']; ?></p>
    
</section>

<section class='event-info backpack'>

<h3 class='event-info-title'> Sac à dos </h3>

<fieldset class="item-list"> 
  <ul> 
  <?php 

    if (empty($item_list)) {
            
        echo "Ne prépare rien, tes chefs s'en occupe.";
    } else {
    $i = 0;
    foreach($item_list as $row) {

        echo "

        <li><label for='item" . $i ."'></label><input type='checkbox'  id='item" . $i ."' value='in' /> <div class='check'></div> <p class='fake-label'>" . $row['item_name'] ."</p></li> 

        ";
        $i++;
        }
    }

?>
  </ul> 
</fieldset> 
    
</section>


<section class='event-info contact' >

<h3 class='event-info-title'> Contact </h3>

<?php 

    foreach($anim_info as $row) {

        echo "

        <section class='contact-user clearfix'>

            <div class='contact-info'>
                <p class='contact-info-name'>" . $row['anim_name'] . "</p> 
                <p class='contact-info-totem'> " . $row['anim_totem'] . " </p> 
                <p class='contact-info-poste " . $section_info['section_color'].'-nav' . "'> " . $row['anim_poste'] . " </p> 
            </div>

            <div class='contact-number'>
                <a class='contact-number-phone' href='tel:" . $row['anim_tel'] . "'>" . $row['anim_tel'] . "</a>
                <a class='contact-number-mail' href='mailto:" . $row['anim_mail'] . "'>" . $row['anim_mail'] . "</a>
            </div>
    </section>

        ";
        }

?>

<a class='btn participate-btn'> Je ne participerai pas</a>
    
</section>

</main>
<!-- END MAIN -->


<script type="text/javascript">  

  $( document ).ready(function() {
    
    $('.nav-btn').click(function(){

        $('.nav-btn').not(this).each(function(){
            $(this).removeClass('selected');
        });
        $(this).addClass('selected');
    })

    $('.btn-contact').click(function(){

        $('.event-info').removeClass('visible');
        $('.event-info.contact').addClass('visible');
    })

    $('.btn-backpack').click(function(){

        $('.event-info').removeClass('visible');
        $('.event-info.backpack').addClass('visible');
    })

    $('.btn-info').click(function(){

        $('.event-info').removeClass('visible');
        $('.event-info.info').addClass('visible');
    })



    $('.participate-btn').click(function(){

        $('header').css( "opacity", ".5" );
        $('main').css( "opacity", ".5" );
        $('.modal').addClass('pop-up');
    })
    $('.modal-form .active').click(function(){

        $('header').css( "opacity", "1" );
        $('main').css( "opacity", "1" );
        $('.modal').removeClass('pop-up');
    })
    $('.modal-form .annuler').click(function(){

        $('header').css( "opacity", "1" );
        $('main').css( "opacity", "1" );
        $('.modal').removeClass('pop-up');
    })



});
/* END DOCUMENT READY */

</script>
</body>
</html>