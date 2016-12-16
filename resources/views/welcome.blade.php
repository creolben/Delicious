<!DOCTYPE html>
<html>
<head>
   <!-- Custom styles for this template -->
     <link href="css/bootstrap.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="fullcalendar/dist/fullcalendar.css"/>
  <link rel="stylesheet" href="fullcalendar/dist/fullcalendar.print.css" media='print'/>
  <script src='fullcalendar/node_modules/jquery/dist/jquery.min.js'></script>
  <script src='js/jquery-ui-1.12.1.custom/jquery-ui.js'></script>
  <script src='fullcalendar/node_modules/moment/moment.js'></script>
  <script src='fullcalendar/dist/fullcalendar.js'></script> 
  <script src='js/jquery.pinto.js'></script>

</head>
<body>
    <div id='wrap'>

        <div id='external-events'>
            <h4>Draggable Events</h4>
            <div class='fc-event'>My Event 1</div>
            <div class='fc-event'>My Event 2</div>
            <div class='fc-event'>My Event 3</div>
            <div class='fc-event'>My Event 4</div>
            <div class='fc-event'>My Event 5</div>
            <p>
                <input type='checkbox' id='drop-remove' />
                <label for='drop-remove'>remove after drop</label>
            </p>
        </div>

    {!! $calendar->calendar() !!}
      {!! $calendar->script() !!}

        <div style='clear:both'></div>

    </div>
</body>
</html>