
$( function() {
    $( "#date" ).datepicker();
    $('#time').timepicker({
        timeFormat: 'h:mm p',
    interval: 60,
    minTime: '8',
    maxTime: '10:00pm',
    defaultTime: '8',
    startTime: '08:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
    });

  } );
