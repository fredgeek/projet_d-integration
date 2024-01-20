<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Interface </title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href=<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css');?>>
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href=<?php echo base_url('assets/dist/css/adminlte.min.css');?>>
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href=<?php echo base_url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css');?>>
  <!-- Toastr -->
  <link rel="stylesheet" href=<?php echo base_url('assets/plugins/toastr/toastr.min.css');?>>
   <!-- DataTables -->
   <link rel="stylesheet" href=<?php echo base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');?>>
  <link rel="stylesheet" href=<?php echo base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');?>>
  <link rel="stylesheet" href=<?php echo base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css');?>>
  <!-- fullCalendar -->
  <link rel="stylesheet" href=<?php echo base_url('assets/plugins/fullcalendar/main.css');?>>
<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
 <style>
  .content-wrapper
{
  background-color: white;
}
.fa-trash
{
  color: #dc3545;
  font-size: 18px;
}
.fa-pen
{
  color:#343a40;
  font-size: 18px;
}
.sidebar
{
  position: fixed;
}


.progress-bar 
{
  height: 8px;
  background: #FF9F55;
  position: fixed;
  width: 0%;
}
/* The actual timeline (the vertical ruler) */
.timelinee {
  position: relative;
  max-width: all;
  margin: 0 auto;
}

/* The actual timeline (the vertical ruler) */
.timelinee::after {
  content: '';
  position: absolute;
  width: 6px;
  background-color: white;
  border: 4px solid #FF9F55;
  top: 0;
  bottom: 0;
  left: 50%;
  margin-left: -3px;
}

/* Container around content */
.containere {
  padding: 10px 40px;
  position: relative;
  background-color: inherit;
  width: 50%;
}

/* The circles on the timeline */
.containere::after {
  content: '';
  position: absolute;
  width: 35px;
  height: 35px;
  right: -19px;
  background-color: white;
  border: 4px solid #212529;
  top: 15px;
  border-radius: 50%;
  z-index: 1;
}

/* Place the container to the left */
.lefte {
  left: 0;
}


/* Place the container to the right */
.righte {
  left: 50%;
  top: -408px;
}

/* Add arrows to the left container (pointing right) */
.lefte::before {
  content: " ";
  height: 0;
  position: absolute;
  color: red;
  top: 22px;
  width: 0;
  z-index: 1;
  right: 30px;
  border: medium solid red;
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent white;
}

/* Add arrows to the right container (pointing left) */
.righte::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 25px;
  width: 0;
  z-index: 1;
  left: 30px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
}

/* Fix the circle for containers on the right side */
.righte::after {
  left: -16px;
}

/* The actual content */
.contente {
  padding: 20px 30px;
  background-color:#f8f9fa;
  position: relative;
  border-radius: 6px;
}

/* Media queries - Responsive timeline on screens less than 600px wide */
@media screen and (max-width: 600px) {
  /* Place the timelime to the left */
  .timelinee::after {
  left: 31px;
  }
  
  /* Full-width containers */
  .containere {
  width: 100%;
  padding-left: 70px;
  padding-right: 25px;
  }
  
  /* Make sure that all arrows are pointing leftwards */
  .containere::before {
  left: 60px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
  }

  /* Make sure all circles are at the same spot */
  .lefte::after, .righte::after {
  left: 15px;
  }
  
  /* Make all right containers behave like the left ones  #e9ecef;*/

  .righte {
  left: 0%;
  top: 3px;

  }
}
.calendrier
{
  font-size: 18px;
}
.annee
{
  font-size: 15px;
}
.erreur
{
  background-color: #dc3545;
}
.success
{
  color: #4CAF50;
  font-size: 20px;
}
.carre
{
  background-color:#FF9F55;
  border-radius: 15px 15px 15px 15px;
  border: 5px solid white;
}

.vide
{
  font-size: 25px;
  font-weight: bold;
  background-color: #f8f9fa;
  border-radius: 15px 15px 15px 15px;
}
.texte
{
  font-size: 20px;
}
.collapsible {
  width: 100%;
  border: none;
  cursor: pointer;
  text-align: left;
  outline: none;
  font-size: 15px;
    background-color:#FF9F55;
  border: 5px solid white;
}

.collapsible:after {
  content: '\002B';
  float: right;
}

.active:after {
  content: "\2212";
}

.contenter {
  max-height: 0;
  width: 100%;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: transparent;
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
            <a href="<?php echo site_url('daza/accueil_controller/accueil') ?>" class="nav-link">
               <i class="fas fa-columns"></i>
               <p>
                 Tableau de bord
               </p>
              </a>
            
            </i>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('daza/Annee_controller/annee_academique') ?>" class="nav-link">
              
              <i class="fa fa-fw fa-wrench" aria-hidden="true"> </i>
              <p>
                 Annee Academique
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link">
            <i class="fa fa-fw fa-wrench"></i>
              <p>
                  Gestions demandes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('daza/Autorisation_controller/autorise_rencontre') ?>" class="nav-link">
                  
                  <i class="far fas fa-share" aria-hidden="true"></i>
                  <p>Demandes rencontres</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('daza/Autorise_competition_controller/autorisation_competition') ?>" class="nav-link">
              <i class="fa fa-fw fa-wrench" aria-hidden="true"> </i>
              <p> Demandes competitions</p>
                </a>
              </li>
             
            </ul>
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
                Gestions stades
              </p>
            </a>
          </li>
            <li class="nav-item">
              <a class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>Calendrier</p>
                              <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('daza/Calendrier_controller/calendrier') ?>" class="nav-link">
                  
                  <i class="far fas fa-share" aria-hidden="true"></i>
                  <p>Occupations des stades</p>
                </a>
              </li>
              <li class="nav-item" style="background-color: #212529;">
                <a href="<?php echo site_url('daza/Calendar_controller/calendar_competition') ?>" class="nav-link">
                  <i class="far fas fa-users" aria-hidden="true"></i>
                  <p>Rencontres encours</p>   
                </a>
              </li>
             
            </ul> 
          </li>
            <li class="nav-item">
              <a href="<?php echo site_url('daza/Alloccupation_controller/Alloccupation') ?>" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>Tous les évènements</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="<?php echo site_url('daza/Allcompetition_controller/Allcompetition') ?>" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>Toutes les competitions</p>
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
    <ul class="card card-body vide"> CALENDRIER DES RENCONTRES ENCOURS </ul> 
    <div class="content">
  <?Php
      $i=0;
        //RECUPERE L'ID DE L'EQUIPE RENCONTRE
        $recup_id_equip_ren=$this->Daza_model->get_id_equipe_rencontre_ok();
        foreach ($recup_id_equip_ren as $equipe_rencontre)
         {
          //RECUPERE L'EQUIPE ADVERSE
          $equipe2=$equipe_rencontre['equipe_id2'];
          $recup_equipe_adverse=$this->Daza_model->get_equipe_adverse($equipe2);

          $id_phase_discipline=$equipe_rencontre['id_phase_discipline'];
          //RECUPERE L'ID DISCIPLINE DE LA TABLE PHASE_DISCIPLINE
          $recup_id_discipline=$this->Daza_model->get_id_discipline($id_phase_discipline);
          foreach ($recup_id_discipline as $phase_discipline) 
          {
            $id_discipline=$phase_discipline['discipline_id'];
            //RECUPERE L'ID_COMPETITION DE LA TABLE COMPETITION_DISCIPLINE
            $recup_id_competition=$this->Daza_model->get_id_competition_discipline($id_discipline);
            foreach ($recup_id_competition as $competition_discipline) 
            {
              $id_competition=$competition_discipline['id_compet'];
              //RECUPERE L'ID DE L'ANNEE NON CLOTURÉ
              $recup_id_annee=$this->Daza_model->get_id_annee_no_close($id_competition);
              foreach ($recup_id_annee as $annee_competition) 
              {
                //echo $annee_competition['annee'];
                  //RECUPERE LE NOM DE L'ETABLISSEMENT
              $recup_id_etablissement=$this->Daza_model->get_id_etablissement($id_competition);
                  foreach ($recup_id_etablissement as $competition_etablissement) 
                  {
                    $originaldate=$equipe_rencontre['date_rencontre'];
                    $format=date("m-d-y",strtotime($originaldate));
                    $date_debut=$format.' '.$equipe_rencontre['debut_occupation'];
                    $i++;
?>
 <div class="timelinee" id="timelin">
    <?php 
    if($i % 2==0)
    {
      echo '<div class="containere righte">';
    } else
    {
      echo '<div class="containere lefte">';
    }
    ?>
    <div class="contente card">
      <table class="table" id="myTable">
      <label class=" annee "><?php echo $competition_discipline['nom'].' '.$competition_etablissement['sigle']?></label>
      <label class="success"> <?php echo $equipe_rencontre['date_rencontre'].' '.$equipe_rencontre['debut_occupation'] ?></label>
      <tbody>
         <tr>
          <th scope="row">STADE</th>
          <td>
            <label class="float-right">
              <?php echo $equipe_rencontre['nom_stade'].' '.$equipe_rencontre['lieu_stade'] ?>
              </label>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <button class="collapsible" data-toggle="tooltip" title="plus d'informations"><label>
                          <?php echo $phase_discipline['nom_phase'] ?>
                          </label></button>
              <div class="contenter">
                   <table width="100%" class="table">
                      <tr>
                       </tr>
                     <th scope="row">DISCIPLINE</th>
                    <td>
                      <label class="float-right">
                        <?php echo $phase_discipline['nom_discipline'] ?>
                        </label>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row" align="center">RENCONTRE</th>
                      <td>
                        <label class="annee float-right">
                          <?php echo $equipe_rencontre['nom'].' Vs '.$recup_equipe_adverse;  
                            ?>
                          </label>
                      </td>
                    </tr>
                </table>
            </div>
          </td>
        </tr>
      <tr>
        <td colspan="2"><label id="demo<?php echo $equipe_rencontre['id_rencontre'] ?>"></label>
<script>
  setInterval('recuperedate("<?php echo $date_debut ?>","<?php echo $equipe_rencontre['id_rencontre']?>")',1000);
</script></td>
      </tr>
        <tr>
          <td colspan="2">
              <input type="submit" class="btn btn-danger float-right" value="Reporter" name="reporter" onclick="supp(<?php echo $equipe_rencontre['id_equip_rencontre'] ; ?>)">
          </td>
        </tr>
      </tbody>
</table>
    </div>
  </div>
</div>
    <?php
      } 
      }
      }
      }      
      }
   ?>
</div>
</div>
<script>
 // $(document).ready(function(){
 // $('button').click( function(){
 function supp(id){
  
    Swal.fire({
            title: 'Voulez-vous vraiment reporter cette rencontre ?',
            showCancelButton: true,
            confirmButtonText: 'Reporter',
            cancelButtonText:'Annuler',
            confirmButtonColor: '#4CAF50',
            cancelButtonColor: '#dc3545',
            
            }).then((result) => {
            /* Read more about isConfirmed */
            if (result.isConfirmed) {
                $.ajax({
                    url : "<?php echo site_url('daza/Calendar_controller/reporte_rencontre')?>",
                        type: "POST",
                      data: {id:id},
                        success: function(data)
                        {
                          //if success reload ajax table
                            location.reload();
                            Swal.fire('<label class="success">rencontre reportée avec succes</label>');
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            Swal.fire('l\'autorisation a échoué ', '', 'danger')
                        }
                    });
            } 
            });

  }
//});
//});

            

</script>
            <script>
              function recuperedate(datee, idd)
              {
                // Set the date we're counting down to
              var countDownDate = new Date(datee).getTime();

              // Update the count down every 1 second
              var x = setInterval(function() {

                // Get todays date and time
                var now = new Date().getTime();
                  
                // Find the distance between now and the count down date
                var distance = countDownDate - now;
                  
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                  
                // Output the result in an element with id="demo"
               var v= document.getElementById("demo"+idd).innerHTML = "il reste <font size=+1 style='color: #dc3545;'>" + days + "</font>jours<font size=+1 style='color: #dc3545;'> " + hours + "</font>heures <font size=+1 style='color: #dc3545;'> " + minutes + "</font>minutes <font size=+1 style='color: #dc3545;'>" + seconds + "</font>secondes";
                  
                // If the count down is over, write some text 
                if (distance < 0) {
                  clearInterval(x);
                  document.getElementById("demo"+idd).innerHTML = "<font size=+1 style='color: #dc3545;'><b>EXPIRED</b></font>";
                }
              }, 1000);

              }
              </script> 
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
  
</div>
  <script>
function myFunction() {
  var line,input, filter, table, tr, td, i, txtValue;
  line = document.getElementById("timelin")
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 1; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
  
  </div>
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
  <!-- /.content-wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src=<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>></script>

<script src=<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>></script>

<!-- AdminLTE App -->
<script src=<?php echo base_url('assets/dist/js/adminlte.min.js');?>></script>
<!-- OPTIONAL SCRIPTS -->
<script src=<?php echo base_url('assets/plugins/chart.js/Chart.min.js');?>></script>
<!-- AdminLTE for demo purposes -->
<script src=<?php echo base_url('assets/dist/js/demo.js');?>></script>

<!-- chagement dynamique -->
<script src=<?php echo base_url('assets/dist/js/secteur.js');?>></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src=<?php echo base_url('assets/dist/js/pages/dashboard3.js');?>></script>

<!-- Select2 -->
<script src=<?php echo base_url('assets/plugins/select2/js/select2.full.min.js');?>></script>
<!-- Bootstrap4 Duallistbox -->
<script src=<?php echo base_url('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js');?>></script>
<!-- InputMask -->
<script src=<?php echo base_url('assets/plugins/moment/moment.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/inputmask/jquery.inputmask.min.js');?>></script>
<!-- date-range-picker -->
<script src=<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js');?>></script>
<!-- bootstrap color picker -->
<script src=<?php echo base_url('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js');?>></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src=<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');?>></script>
<!-- Bootstrap Switch -->
<script src=<?php echo base_url('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js');?>></script>
<!-- BS-Stepper -->
<script src=<?php echo base_url('assets/plugins/bs-stepper/js/bs-stepper.min.js');?>></script>
<!-- dropzonejs -->
<script src=<?php echo base_url('assets/plugins/dropzone/min/dropzone.min.js');?>></script>
<!-- SweetAlert2 -->
<script src=<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js');?>></script>
<!-- Toastr -->
<script src=<?php echo base_url('assets/plugins/toastr/toastr.min.js');?>></script>

<!-- DataTables  & Plugins -->
<script src=<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/jszip/jszip.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/pdfmake/pdfmake.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/pdfmake/vfs_fonts.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js');?>></script>
<script src=<?php echo base_url('assets/ckeditor/ckeditor.js');?>></script>


<!-- Page specific script -->
<script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- Bootstrap 4 -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script>
  
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});

</script>
</body>
</html>
