<!DOCTYPE html>
	<html lang="fr" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href=<?php echo base_url('assets/img/fav.png');?>>
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Sport Event</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href=<?php echo base_url('assets/css/linearicons.css');?>>
			<link rel="stylesheet" href=<?php echo base_url('assets/css/font-awesome.min.css');?>>
			<link rel="stylesheet" href=<?php echo base_url('assets/css/bootstrap.css');?>>
			<link rel="stylesheet" href=<?php echo base_url('assets/css/magnific-popup.css');?>>
			<link rel="stylesheet" href=<?php echo base_url('assets/css/nice-select.css');?>>							
			<link rel="stylesheet" href=<?php echo base_url('assets/css/animate.min.css');?>>
			<link rel="stylesheet" href=<?php echo base_url('assets/css/owl.carousel.css');?>>			
			<link rel="stylesheet" href=<?php echo base_url('assets/css/jquery-ui.css');?>>			
			<link rel="stylesheet" href=<?php echo base_url('assets/css/main.css');?>>
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
          <style type="text/css">

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
          </style>
		</head>
		<body >	
        <header id="header" id="home">
	  		<div class="header-top">
	  			<div class="container">
			  		<div class="row">
			  			<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
						  <ul>
								<li><a href="https://web.facebook.com/univNdere/?_rdc=1&_rdr"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/search?q=univ-ndere"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.youtube.com/channel/UC6bML7CfxAPfJFVKycMjbxA"><i class="fa fa-youtube"></i></a></li>
							
			  				</ul>					
			  			</div>
			  			
			  		</div>			  					
	  			</div>
			</div>
		    <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="#"><img src="<?php echo base_url('assets\img\logo.png');?>" alt="" title="" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
					<li><a href="<?php echo site_url('principal/index');?>">Accueil</a></li>
					 
			          
					<li><a href="<?php echo site_url('principal/apropos');?>"> à propos </a></li>
					  <?php if(!$this->session->userdata('connexion')):?>				          					          		          
						<li><a href="<?php echo site_url();?>/test/login">se connecter</a></li>
					 
					  <?php endif;?>
					  <?php if($this->session->userdata('connexion')):?>				          					          		          
						<li class="menu-has-children"><a href="#" class="nav-link active"><?php echo ucfirst($this->session->userdata('user_name'));?></a> 
			            <ul>
						<li><a href="<?php echo site_url();?>/test/deconnexion">Se deconnecter</a></li>
						 	  <?php if( $this->session->userdata('rol')==='Responsable de competition') : ?>
		              		   <li><a href="<?php echo site_url();?>/respocompet/index">Retour au tableau de bord</a></li>		
							 <?php endif;?>	
							 <?php if( $this->session->userdata('rol')==='Responsable de classe') : ?>
		              		   <li><a href="<?php echo site_url();?>/respoclasse/index">Retour au tableau de bord</a></li>		
							 <?php endif;?>	
							 <?php if( $this->session->userdata('rol')==='Daza') : ?>
		              		   <li><a href="<?php echo site_url();?>/daza/accueil_controller/accueil">Retour au tableau de bord</a></li>		
							 <?php endif;?>	
							 <?php if( $this->session->userdata('rol')==='Administrateur') : ?>
		              		   <li><a href="<?php echo site_url();?>/superadmin/accueil_controller/accueil">Retour au tableau de bord</a></li>		
							 <?php endif;?>	
			            </ul>
			          </li>				
					
					  <?php endif;?>	          					          		          
			          
			        </ul>
			      </nav><!-- #nav-menu-container -->		    				
		    	</div>
		    </div>
		  </header><!-- #header -->
			  
			<!-- start banner Area -->
			<section class="banner-area relative" id="home" 
    style="background: url(<?php echo base_url('/assets/img/banner-bg.jpg');?>) right;
    background-size: cover;">
				<div class="overlay overlay-bg"></div>
				<div class="container">				
				<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Calendrier de disponibilités des stades			
							</h1>	
							<p class="text-white link-nav"><a href="#">Accueil </a>  <span class="lnr lnr-arrow-right"></span>calendrier</p>
						</div>	
				</div>
			</section>
			<!-- End banner Area -->
	<!-- Start post-content Area -->
	<section class="post-content-area">
				<div class="container" style="width: 100%">
								<div class="col-lg-3  col-md-3 meta-details">
									<ul class="tags">
										
									</ul>
									<div class="user-details row">
															
									</div>
								</div>
									
								  <br> <br> 
							          
      <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Planning</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class=" mb-3">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><b>Carte</b></h3>  
          
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
                    <div class="external-event bg-danger"> période occupé</div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><b>Stades enregistrés</b> </h3>
                </div>
                <div class="card-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <ul>
				       <?php
				            foreach ($result as $rows) 
				            {
				          ?> 
                      <li><label><?php echo $rows['nom_stade'].' '.$rows['lieu_stade']; ?></label></li>
                  <?php } ?>
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
                                   
									<small> <a href="<?php echo site_url('principal/index');?>" class="primary-btn float-right"> <b style="color: black;">Retour</b> </a></small>
								</div>
							</div>
						</div>
					
					</div>
				</div>	
			</section>
			<!-- End post-content Area -->







			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  	<script src=<?php echo base_url('assets/js/vendor/jquery-2.2.4.min.js');?>></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src=<?php echo base_url('assets/js/vendor/bootstrap.min.js');?>></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src=<?php echo base_url('assets/js/easing.min.js');?>></script>			
			<script src=<?php echo base_url('assets/js/hoverIntent.js');?>></script>
			<script src=<?php echo base_url('assets/js/superfish.min.js');?>></script>	
			<script src=<?php echo base_url('assets/js/jquery.ajaxchimp.min.js');?>></script>
			<script src=<?php echo base_url('assets/js/jquery.magnific-popup.min.js');?>></script>	
    		<script src=<?php echo base_url('assets/js/jquery.tabs.min.js');?>></script>						
			<script src=<?php echo base_url('assets/js/jquery.nice-select.min.js');?>></script>	
			<script src=<?php echo base_url('assets/js/owl.carousel.min.js');?>></script>									
			<script src=<?php echo base_url('assets/js/mail-script.js');?>></script>	
			<script src=<?php echo base_url('assets/js/main.js');?>></script>	
			
			
	
	
<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Notre site</h4>
								<ul>
									<li><a href="#">Campus info</a></li>
									<li><a href="#">Ouverture :08:00</a></li>
									<li><a href="#">Fermeture :18:00</a></li>
									
								</ul>								
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Contact</h4>
								<ul>
							
                                 	<li><a href="#">Tel: +237 222 25 40 02</a></li>
									<li><a href="#">Fax: +237 222 25 40 01</a></li>
									<li><a href="#">B.P: 454 Ngaoundéré - Cameroun</a></li>
								
								</ul>								
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Site web-Email</h4>
								<ul>


									<li><a href="#">Url: www.univ-ndere.cm</a></li>
									<li><a href="#">E-mail : un@univ-ndere.cm</a></li>
									
								</ul>								
							</div>
						</div>
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Liens </h4>
								<ul>
									<li><a href="http://www.univ-ndere.cm/?page_id=271">Accessibilité</a></li>
									<li><a href="http://www.univ-ndere.cm/?page_id=286">Vie Associative</a></li>
									<li><a href="http://www.univ-ndere.cm/?page_id=284">MI – UNChat</a></li>
								</ul>								
							</div>
						</div>					
						<div class="col-lg-2 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h4>Réseaux sociaux</h4>
								<ul>
									<li><a href="https://web.facebook.com/univNdere/?_rdc=1&_rdr"><i class="fa fa-facebook"></i></a> &ensp;&ensp; Facebook</li>
									<li><a href="https://twitter.com/search?q=univ-ndere"><i class="fa fa-twitter"></i></a>&ensp;&ensp;Twitter</li>
									<li><a href="https://www.youtube.com/channel/UC6bML7CfxAPfJFVKycMjbxA"><i class="fa fa-youtube"></i></a>&ensp;&ensp;Youtube
							</li>
								
								</ul>								
							</div>
						</div>																		
												
					</div>
					<div class="footer-bottom row align-items-center justify-content-between">
						<p class="footer-text m-0 col-lg-6 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved    
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
						<div class="col-lg-6 col-sm-12 footer-social">
							
							
							
						</div>
					</div>						
				</div>
			</footer>	
			<!-- End footer Area -->	
<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src='<?php echo base_url('assets/dist/js/demo.js');?>'></script>
<!-- fullCalendar 2.2.5 -->
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/fullcalendar/main.js');?>"></script>
<!-- jQuery UI -->
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- Page specific script -->
<script src="<?php echo base_url('assets\plugins\fullcalendar\locales\fr-ch.js');?>"></script>

<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

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

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });
    var calendar = new Calendar(calendarEl, {
        locale: 'fr',
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: [
      //RECUPERATION DES RENCONTRE DE L'ANNÉE
      <?php
      //RECUPERE L'ID DE L'EQUIPE RENCONTRE
        $calender=$this->principal_model->calender_occupation();
        foreach ($calender as $calender)
        {
          $equipe2=$calender['equipe_id2'];
          $recup_equipe_adverse=$this->principal_model->get_equipe_adverse($equipe2);
          $annee=$calender["date_rencontre"];
          $format=date("Y-m-d",strtotime($annee));
          $heure_debut=$calender['debut_occupation'];
          $heure_fin=$calender['fin_occupation'];
      ?>
        {
          title          : '<?php echo $calender['nom_stade'].' '.$calender['lieu_stade'].'  '.$calender['nom'].' VS '.$recup_equipe_adverse ?>',
          start          : new Date("<?php echo $format.' '.$heure_debut ?>"),
          end            : new Date("<?php  echo $format.' '.$heure_fin ?>"),
          allDay         : false,
          textColor     : 'white',
          backgroundColor: '#dc3545', //Success (red)
          borderColor    : '#dc3545' //Success (red)
        },
      <?php } 
        $calend=$this->principal_model->calender_occup();
        foreach ($calend as $calend) 
        {
        $annee2=$calend["date_autre"];
        $heure_debut1=$calend['debut_occupation'];
      ?>
        {
          title          : '<?php echo $calend['nom_stade'].' '.$calend['lieu_stade'].'  '.$calend['nom_autre'] ?>',
          start          : new Date("<?php echo $annee2.' '.$heure_debut1 ?>"),
          allDay         : false,
          textColor     : 'white',
          backgroundColor: '#dc3545', //Success (red)
          borderColor    : '#dc3545' //Success (red)
        },
      <?php } ?>
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
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
        'color'           : 'white'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
      ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
</body>
</html>