<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Interface </title>
  <!-- Google Font: Source Sans Pro -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href=<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css');?>>
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href=<?php echo base_url('assets/dist/css/adminlte.min.css');?>>
   <!-- fullCalendar -->
   <link rel="stylesheet" href=<?php echo base_url('assets/plugins/fullcalendar/main.css');?>>
  <!-- Ajax -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <style>
.texte
{
  font-size: 20px;
}

.fc .fc-daygrid-day.fc-day-today 
{
      background-color: #ffc107;
}
.fc-daygrid-dot-event,
  .fc-daygrid-dot-event.fc-event-mirror {
    background: yellow;
    font-weight: bold;
    height: 50px;
  }
/* --- the dot style of event --- */
/* --- the dot style of event --- */
.fc-daygrid-dot-event {
  display:inline-grid;
  align-items: center;
  padding: 2px 0

}
.fc-daygrid-dot-event .fc-event-title {
    flex-grow: 1;
    flex-shrink: 14;
    min-width: 0; /* important for allowing to shrink all the way */
    overflow: hidden;
    font-weight: bold;
  }
.fc-daygrid-dot-event:hover,
  .fc-daygrid-dot-event.fc-event-mirror {
    background: rgba(0, 0, 0, 0.1);
  }
.fc-daygrid-dot-event.fc-event-selected:before {
    /* expand hit area */
    top: -10px;
    bottom: -10px;
  }
  .fc-daygrid-event {
    position: relative;
    height: 100%;
    white-space: normal;
    border-radius: 3px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    font-size: .85em;
    font-size: var(--fc-small-font-size, .85em);
}
:root {
  --fc-daygrid-event-dot-width: 15px;
}
.fc-event-title-container
{
  font-weight: bold;
}
.fc .fc-timegrid-slot
{
  font-weight: bold;
}
.sidebar
{
  position: fixed;
}
.progress-bar 
{
  height: 8px;
  background: yellow;
  position: fixed;
  width: 0%;
}
.bg-warnin
{
  background-color: yellow;
}
.text-warnin
{
  background-color: yellow;
}
</style>
  
</head>

<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark sticky-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <i><b>
      <li class="nav-link d-none d-sm-inline-block texte" >
      <a href="<?php echo site_url();?>/principal/index" class="nav-link">Accueil</a>
      </li>
      </b></i>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <?php if($this->session->userdata('connexion')):?>    
        <i class="fa fa-user nav-link active " aria-hidden="true"></i>                                                
        <li class="nav-item d-none d-sm-inline-block">  <a href="#" class="nav-link active"><?php echo ucfirst($this->session->userdata('user_name'));?></a>  </li>
        <li class="nav-item d-none d-sm-inline-block">  
           <a href="<?php echo site_url();?>/test/deconnexion"  data-toggle="tooltip" title="se deconnecter ?"  class="nav-link">  <i class="fas fa-sign-out-alt nav-link active "></i></a>  </li>
         
           <?php endif;?> 
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SPORT EVENT</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline">
      </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline">
      </div>

      <!-- Sidebar Menu -->
            <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-header" style="font-size: 20px;">MENU</li>
          <li class="nav-item menu-open">
          <li class="nav-item">
            <a href="<?php echo site_url('daza/Annee_controller/annee_academique') ?>" class="nav-link">
              
              <i class="fa fa-fw fa-wrench" aria-hidden="true"> </i>
              <p>
                 Annee Academique
              </p>
            </a>
          </li>
          <li class="nav-item">
                <a href="<?php echo site_url('daza/Autorise_competition_controller/autorisation_competition') ?>" class="nav-link">
              <i class="fa fa-fw fa-wrench" aria-hidden="true"> </i>
              <p>
                 Competitions
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('daza/Autorisation_controller/autorise_rencontre') ?>" class="nav-link">
              <i class="fa fa-fw fa-wrench" aria-hidden="true"> </i>
              <p>
                 Rencontres
              </p>
            </a>
          </li>
              <li class="nav-item">
                <a href="<?php echo site_url('daza/Occupation_controller/occupation') ?>" class="nav-link">
              <i class="fa fa-fw fa-plus-circle" aria-hidden="true"> </i>
              <p>
                 Occupations
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('daza/Stade_controller/stade') ?>" class="nav-link">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
                Stade
              </p>
            </a>
          </li>
            <li class="nav-item">
              <a href="<?php echo site_url('daza/Allcompetition_controller/Allcompetition') ?>" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>Calendrier-competition</p>
              </a>
            </li> 
            <li class="nav-item" style="background-color: #212529;">
              <a href="<?php echo site_url('daza/Calendar_controller/calendar_competition') ?>" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>Calendrier - rencontre</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="<?php echo site_url('daza/Alloccupation_controller/Alloccupation') ?>" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>Calendrier-occupation</p>
              </a>
            </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
      <div class="header">
              <div class="progress-container sticky-top">
               <div class="progress-bar" id="myBar"></div>
          </div>  
        </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Planning</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Planning</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><b>Carte</b></h3>
                  
          
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
                    <div class="external-event bg-success">Quelques jours</div>
                    <div class="external-event bg-info">1 à 3 semaines</div>
                    <div class="external-event bg-warning">1 à 2 mois</div>
                    <div class="external-event bg-warnin">1 à 2 mois</div>
                    <div class="external-event bg-danger"> Evenements clôturés </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Suivez le planning </h3>
                </div>
                <div class="card-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <ul class="fc-color-picker" id="color-chooser">
                      <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-info" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                      <!--<li><a class="text-warnin" href="#"><i class="fas fa-square"></i></a></li>-->
                      <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                    </ul>
                  </div>
                  <!-- /input-group -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
   <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer  navbar navbar-expand navbar-dark">
    <strong>Copyright  &copy; 2021 </strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    
    </div>
  </footer>

        <script type="text/javascript">
        document.write("<center><font size=+3 style='color:white;'>");
        var day = new Date();
        var hr = day.getHours();
        if (hr >= 0 && hr < 12) {
          document.getElementById("salut").innerHTML = "Good Morning! ";
        } else if (hr == 12) {
          document.getElementById("salut").innerHTML=" Good Noon!";
        } else if (hr >= 12 && hr <= 17) {
          document.getElementById("salut").innerHTML=" Good Afternoon!";
        } else {
          document.getElementById("salut").innerHTML=" Good Evening!";
        }
        document.write("</font></center>");
    </script>
        <script>
// When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunctio()};

function myFunctio() {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  document.getElementById("myBar").style.width = scrolled + "%";
}
</script>
    <script src=<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>></script>
<!-- Bootstrap -->
<script src=<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>></script>
<!-- jQuery UI -->
<script src=<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js');?>></script>
<!-- AdminLTE App -->
<script src=<?php echo base_url('assets/dist/js/adminlte.min.js');?>></script>
<!-- fullCalendar 2.2.5 -->
<script src=<?php echo base_url('assets/plugins/moment/moment.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/fullcalendar/main.js');?>></script>
<!-- AdminLTE for demo purposes -->
<script src=<?php echo base_url('assets//dist/js/demo.jss');?>></script>
<script src=<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>></script>
<!-- Bootstrap -->
<script src=<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>></script>
<!-- jQuery UI -->
<script src=<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js');?>></script>
<!-- AdminLTE App -->
<script src=<?php echo base_url('assets/dist/js/adminlte.min.js');?>></script>
<!-- fullCalendar 2.2.5 -->
<script src=<?php echo base_url('assets/plugins/moment/moment.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/fullcalendar/main.js');?>></script>
<!-- AdminLTE for demo purposes -->
<script src=<?php echo base_url('assets//dist/js/demo.jss');?>></script>
<!-- Page specific script -->
<script>
  
    
  $(function () {


    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------
    var events = <?php echo json_encode($data) ?>;
    var calendar = new Calendar(calendarEl, {
      
      locale: 'fr',
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: events,
      
      
    });
    calendar.setOption('locale', 'fr-ch');
   

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
     // ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
</body>
</html>

  <!-- /.content-wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->

</body>
</html>
