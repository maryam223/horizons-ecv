<!DOCTYPE html>
<html>
<head>
    <title>Agenda</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale-all.min.js" integrity="sha512-L0BJbEKoy0y4//RCPsfL3t/5Q/Ej5GJo8sx1sDr56XdI7UQMkpnXGYZ/CCmPTF+5YEJID78mRgdqRCo1GrdVKw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round"
      rel="stylesheet">
</head>
<body>

@include('menu')
    
<div class="calendar-container" style="height:100vh">
    <h1>Agenda</h1>
    <div id='calendar'></div>
</div>

<!-- day click dialog-->
<div id="dialog" style="display:none;">
    <div id="dialog-body">
        <form id="dayClick" method="post" action="{{route('eventStore')}}">
            @csrf
            <div class="form-group">
                <label>Titre de l'événement</div>
                <input type="text" class="form-control" name="title" placeholder="Ajouter un titre">
            </div>
            <div class="form-group">
                <label>Date Début/Heure</label>
                <input type="datetime-local" class="form-control" id="start" name="start" placeholder="Date Début/Heure">
            </div>
            <div class="form-group">
                <label>Date Fin/Heure</label>
                <input type="datetime-local" class="form-control" id="end" name="end" placeholder="Date Fin/Heure">
            </div>
            <div class="form-group">
                <input type="checkbox" value="1" name="allDay">Toute la journée
                <input type="checkbox" value="0" name="allDay">Partie de la journée
            </div>
            <div class="form-group">
                <label>Couleur du fond</label>
                <input type="color" class="form-control" name="color">
            </div>
            <div class="form-group">
                <label>Couleur du texte</label>
                <input type="color" class="form-control" name="textColor">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Ajouter un événement</button>
            </div>
    </div>
</div>


<!-- day click dialog end -->
<div style="height:100px;"></div>
</body>
<script type="text/javascript">
  
jQuery(document).ready(function ($) {

    function convert(str){
        const d = new Date(str);
        let month = '' + (d.getMonth() + 1);
        let day = '' + d.getDate();
        let year = '' + d.getFullYear();
        if(month.length < 2) month = '0' + month;
        if(day.length < 2) day = '0' + day;
        let hour = '' + d.getUTCHours();
        let minutes = '' + d.getUTCMinutes();
        let seconds = '' + d.getUTCSeconds();
        if(hour.length < 2) hour = '0' + hour;
        if(minutes.length < 2) minutes = '0' + minutes;
        if(seconds.length < 2) seconds = '0' + seconds;
        return [year, month,day].join('-') + ' ' + [hour,minutes].join(':');
    };
      
    /*------------------------------------------
    --------------------------------------------
    Get Site URL
    --------------------------------------------
    --------------------------------------------*/
    var SITEURL = "{{ url('/') }}";
    
    /*------------------------------------------
    --------------------------------------------
    CSRF Token Setup
    --------------------------------------------
    --------------------------------------------*/
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      
    /*------------------------------------------
    --------------------------------------------
    FullCalender JS Code
    --------------------------------------------
    --------------------------------------------*/
    var calendar = $('#calendar').fullCalendar({
                    editable: true,
                    header:{
                        left:'prev,next today',
                        center:'title',
                        right:'month,agendaWeek,agendaDay'
                    },
                    events: SITEURL + "/fullcalender",
                    displayEventTime: false,
                    editable: true,
                    longPressDelay: 0,
                    firstDay: 1,
                    locale: 'fr',
                    height: window.innerHeight,
                    selectable: true,
                    selectHelper: true,
                    dayClick:function(date, event, view){
                        $('#start').val(convert(date));
                        $("#dialog").dialog({
                            title:'Ajouter un événement',
                            width:600,
                            height:600,
                            modal:true,
                            show:{effect:'clip', duration:350},
                            hide:{effect:'clip', duration:250}
                        })
                        var eventSource = calendar.getEventSourceById(id);
                    }    
                });
 
    });
      
    /*------------------------------------------
    --------------------------------------------
    Toastr Success Code
    --------------------------------------------
    --------------------------------------------*/
    function displayMessage(message) {
        toastr.success(message, 'Event');
    } 
    
</script>
  
</body>
</html>