<?php 

        foreach($event_info as $row) {

    $sql = 'SELECT * FROM section WHERE section_name = :section_name';
       $preparedStatement = $connexion->prepare($sql);
       $preparedStatement->bindValue(':section_name',  $row['event_section']);
       $preparedStatement->execute();
       $section_id = $preparedStatement->fetch();  

        echo "

        <section class='event day " . $row['event_section']. "  " . $row['event_type'] . "'>
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