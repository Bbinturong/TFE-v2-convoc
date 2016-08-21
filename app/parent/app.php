<?php 
  
  session_start();
  require "../db_connect.php";

  $sql = 'SELECT count(*) FROM event WHERE unite_name = :unite_name';
     $preparedStatement = $connexion->prepare($sql);
     $preparedStatement->bindValue(':unite_name', 'admin');
     $preparedStatement->execute();
     $number_of_rows = $preparedStatement->fetchColumn(); 

  $sql = 'SELECT * FROM event WHERE unite_name = :unite_name';
     $preparedStatement = $connexion->prepare($sql);
     $preparedStatement->bindValue(':unite_name', 'admin');
     $preparedStatement->execute();
     $event_info = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);   
?>

<!DOCTYPE html>
<html>
<head>

    <title> Convoc </title>
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
<header id="header" class="main-header">

    <a href="param.php"><img class='header-icon settings' src="../assets/icon/settings.svg" alt="icone de paramètres"></a>

    <h1 class='unite-name'> <?= $_SESSION['unite_name']; ?> </h1>

    <div class='top-calendar-title'></div>
    <ul class='top-calendar'>
    </ul>
    
</header>
<!-- END HEADER -->

<!-- MAIN -->
<main class='main'> 

<?php 
    if ($number_of_rows == 0) {
        include 'no-data.php';
    } foreach($event_info as $row) {

    $sql = 'SELECT * FROM section WHERE section_name = :section_name';
       $preparedStatement = $connexion->prepare($sql);
       $preparedStatement->bindValue(':section_name',  $row['event_section']);
       $preparedStatement->execute();
       $section_id = $preparedStatement->fetch();  

        echo "

        <section class='event day " . $row['event_section'] . "  " . $row['event_type'] . "'>
        <a class='event-link' href='event.php?id=" . $row['id'] . ".html''>
            <div class='top-bar " . $section_id['section_color'] . '-bg' . " '>
                <h2 class='date-day'>samedi</h2>
                <h2 class='date-number'>17</h2>    
            </div>

            <div class='info'>

                <h3 class='day-title'>" . $row['event_title'] . "</h3>
                <p class='section-baseline'> " . $row['event_section'] . " </p>

                <p class='info-baseline info-hour'><span class='hour-start'>" . $row['event_hour_start'] . "</span> <span class='hour-end'>" . $row['event_hour_end'] . "</span></p>
                <p class='info-baseline info-location'> " . $row['event_place'] . "</p> 
            
            </div>   
        </a>
        </section>

        ";
        }

?>


</main>
<!-- END MAIN -->


<script type="text/javascript">
createCalendar();

$(".top-calendar-title").click(function(){ 
        
        $( ".top-calendar" ).toggleClass("show-calendar");
}); 

$(".top-calendar li").click(function(){ 
        
        $( ".top-calendar" ).toggleClass("show-calendar");
});

$('.top-calendar li').click(function(){

    $('.top-calendar li').not(this).each(function(){
        $(this).removeClass('today');
    });
    $(this).addClass('today');

    var index = $(this).index();

    $('.month-title').html(cal_months_name[index]);
})

</script>
</body>
</html>