
function createCalendar(){

  // these are labels for the days of the week
cal_days_labels = ['Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa', 'Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa', 'Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa', 'Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa', 'Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa', 'Di'  ];

// these are human-readable month name labels, in order
cal_months_name = ['Janvier', 'Février', 'Mars', 'Avril',
                     'Mai', 'Juin', 'Juillet', 'Août', 'Septembre',
                     'Octobre', 'Novembre', 'Décembre'];

cal_months_labels = ['jan', 'fév', 'mar', 'avr',
                     'Mai', 'jui', 'jui', 'Aoû', 'Sep',
                     'Oct', 'Nov', 'Déc'];

// these are the days of the week for each month, in order
cal_days_in_month = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

  // this is the current date
  current_date = new Date(); 

  /* GET MOTNH + MONTH NAME */
  this.month = current_date.getMonth();
  var monthName = cal_months_name[this.month]
  this.year  = current_date.getFullYear();

  this.day = current_date.getDate();

  // get first day of month
  var firstDay = new Date(this.year, this.month, 1);
  var startingDay = firstDay.getDay();
  
  // find number of days in month
  var monthLength = cal_days_in_month[this.month];
  
  // compensate for leap year
  if (this.month == 1) { // February only!
    if((this.year % 4 == 0 && this.year % 100 != 0) || this.year % 400 == 0){
      monthLength = 29;
    }
  }

  $( ".top-calendar-title" ).prepend( "<h2 class='month-title'>" + monthName + "</h2><h3 class='year-title'> " + this.year +  "</h3>" );

    var dayNumber = 1; 

    /* STARTING DAY - 1 BECAUSE IT START ON SUNDAY */
    /*
  for (var i = startingDay; i < monthLength + startingDay; i++) {

    if (this.day == dayNumber) {

     $( ".top-calendar" ).append( "<li><p class='calendar-label'>" + cal_days_labels[i-1] + "</p><a class='calendar-number today'>"  + dayNumber + "</a></li>");


    } else { $( ".top-calendar" ).append( "<li><p class='calendar-label " + status + "'>" + cal_days_labels[i-1] + "</p><a class='calendar-number'>"  + dayNumber + "</a></li>");
}

    dayNumber++;

  }
  */

  //$( ".top-calendar" ).width( monthLength * 40 );

  for (var i = 0; i < 12; i++) {

    if (this.month == i) {

     $( ".top-calendar" ).append( "<li class='today'><a class='calendar-month-label'>"  + cal_months_labels[i] + "</a></li>");


    } else { $( ".top-calendar" ).append( "<li><a class='calendar-month-label'>"  + cal_months_labels[i] + "</a></li>");
}

    dayNumber++;

  }
   

}
