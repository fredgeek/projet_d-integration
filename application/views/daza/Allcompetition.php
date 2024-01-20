<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><p><img src="<?php echo base_url('assets/img/image.jpg') ?>" class="rounded" alt="..." width="100px">Université de Ngaoundéré<center class="card card-body titre">CALENDRIER DES COMPETITIONS ANNEE ACADEMIQUE <?php echo $academique ?></center></p> </title>
<!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href=<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css');?>>
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href=<?php echo base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');?>>
<link rel="stylesheet" href=<?php echo base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');?>>
<link rel="stylesheet" href=<?php echo base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css');?>>
  <!-- Theme style -->
  <link rel="stylesheet" href=<?php echo base_url('assets/dist/css/adminlte.min.css');?>>
   <!-- fullCalendar -->
   <link rel="stylesheet" href=<?php echo base_url('assets/plugins/fullcalendar/main.css');?>>
  <!-- Ajax -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
 <style>
  .content-wrapper
{
  background-color: white;
}
.table 
{
  border: 3px solid #ddd;
}
.fa-trash
{
  color: #dc3545;
  font-size: 18px;
}

th, td 
{

  padding: 16px;
  width: 15%;
}
td
{
border: 3px solid #ddd;
}

tr:nth-child(even) 
{
  background-color: #f2f2f2;
border: 3px solid #ddd;
}
.fa-pen
{
  color:#343a40;
  font-size: 18px;
}
.false
{  font-size: 30px;
}
.false:hover
{
  background-color: red;
  color: white;
}
.btn
{
  float: right;
}
.titre
{
  font-size: 25px;
  font-weight: bold;
  color:#FF9F55;
  text-align: center;
}
.vide
{
  font-size: 25px;
  font-weight: bold;
  background-color: #f8f9fa;
  border-radius: 15px 15px 15px 15px;
}
.content {
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.6s ease-out;
  background-color: transparent;
}
.erreur
{
  color: #dc3545;
  font-size: 17px;
}
.success
{
  font-size: 20px;
  color: #4CAF50;
}
.progress-bar 
{
  height: 8px;
  background: #FF9F55;
  position: fixed;
  width: 0%;
}
.collapsible {
  color: #444;
  cursor: pointer;
  outline: none;
  font-size: 15px;
  transition: 0.9s;

}
.sidebar
{
  position: fixed;
}
.orange
{
  background-color: #FF9F55;
  border-radius: 5px 5px 5px 5px;
}
.recherche
{
  float: right;
}
.texte
{
  font-size: 20px;
}
.mod
{
  width: 33%;
}
.mode
{
  width: 37%;
}
.red
{
  color: #dc3545;
  font-weight: bold;
}
.entre
{
  background-color: #dc3545;
  color: white;
  border-radius: 5px 5px 5px 5px;
  font-weight: bold;
}
.btn
{
  font-weight: bold;
  color:black;
  font-size: 20px;
  background-color: #FF9F55;
  border-radius: 10px 10px 10px 10px;
}
.btn:hover
{
  font-weight: bold;
  color:black;
  font-size: 20px;
  background-color: #FF9F55;
  border-radius: 10px 10px 10px 10px;
}
.btne
{
  font-size: 17px;
  font-weight: bold;
  color:#FF9F55;
  background-color: #e9ecef;
  border-radius: 15px 15px 15px 15px;
}
.btne:hover
{
  font-size: 17px;
  font-weight: bold;
  color:#FF9F55;
  background-color: #e9ecef;
  border-radius: 15px 15px 15px 15px;
}
.input
{
  font-weight: bold;
  background-color: #e9ecef;
}
.input:hover
{
  background-color: #e9ecef;
  border-radius:15px 15px 15px 15px;
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
      <li class="nav-link d-none d-sm-inline-block texte">
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
              <li class="nav-item">
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
             <li class="nav-item" style="background-color: #212529;">
              <a href="<?php echo site_url('daza/Allcompetition_controller/Allcompetition') ?>" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>Toutes les competitions</p>
              </a>
            </li> 
            <li class="nav-item">
              <a>
            <form class="form-inline" method="post" action="<?php echo site_url('daza/Allcompetition_controller/allcompetition') ?>">
        <select class="custom-select my-3 input nav-link" name="annee" >
          <optgroup label="selectionner une annee">
          <?php foreach ($annee as $annee) 
          {
            ?>
          <option value="<?php echo $annee['annee'] ?>"><?php echo $annee['annee'] ?></option>
          <?php
          } 
          ?>
        </optgroup>
        </select>
      </li>
      <li class="nav-item">
        <button type="submit" class="btn nav-link btne" name="affiche" style="font-size: 17px; font-weight: bold; color:#FF9F55;">Afficher
        </button>
      </form>
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
      
    <ul class="card card-body vide"> CALENDRIER DES COMPETITIONS ANNEE ACADEMIQUE <?php echo $academique ?></ul>  
    <div class="card-body">
  <table id="example1" class="table table-bordered table-hover">
        <thead>
          <th>PERIODES</th>
          <th>EVENEMENTS</th>
          <th>ETABLISSEMENTS</th>
          <th>DISCIPLINES</th>
        </thead>
<?Php
    echo $vide;
      //RECUPERE LA COMPETITION (L'ID) D'UNE ANNEE NON CLOTURÉE
      $recup_id_competition=$this->Daza_model->get_all_competition_annee($id);
      foreach ($recup_id_competition as $recup_comp)
       {
          //VARIABLE QUI STOCKE L'id_competition DE LA TABLE ANNEE_COMPETITION
          $id_comp=$recup_comp['competition_id'];

          //POUR AFFICHER LE NOM ANNEE ET ETAT D'UNE COMPETITION
          $recup_competition=$this->Daza_model->get_nom_annnee_etat_comp1($id_comp);

          foreach ($recup_competition as $recup) 
          {

                //RECUPERE L'ID DE L'ETABLISSEMENT D'UNE COMPETITION D'UNE ANNEE
                $recup_id_etablissement=$this->Daza_model->get_etablissement_competition_annee($id_comp);
              foreach ($recup_id_etablissement as $recup_id_etab) 
              {
                 //RECUPERE LES DISCIPLINES D'UNE COMPETITION D'UNE ANNEE DONNÉ
                $recup_id_discipline=$this->Daza_model->get_discipline($id_comp);

               
?>          
        <tr>
          <td>
            <label><?php echo 'Du <label class="orange">'.$recup['date_debut'].' </label><br> Au <label class="orange"> '.$recup['date_fin'].'</label>' ?></label>
          </td>
          <td><label><?php echo $recup['nom'] ?></label></td>
          <td><label><?php echo $recup_id_etab['sigle'] ?></label></td>
          <td>
            <?php foreach ($recup_id_discipline as $recup_disc)  { ?>
               <label><?php echo $recup_disc['nom_discipline']  ?></label><br>
             </td>
             <?php
             }
               ?>
        </tr>
   <?php
    }
    }
    }
    ?>
    </table>
  </div>
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
  
</div>
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
<!-- Bootstrap 4 -->
<script src=<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>></script>
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
<script src=<?php echo base_url('plugins/datatables-buttons/js/buttons.colVis.min.js');?>></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "language":  {
"sEmptyTable":     "<label>Aucune donnée disponible dans le tableau</label>",
"sInfo":           "",
"sInfoEmpty":      " ",
"sInfoFiltered":   " ",
"sInfoThousands":  " ",
"sLengthMenu":     " ",
"sLoadingRecords": " ",
"sProcessing":     " ",
"sSearch":         "<label>Rechercher :</label>",
"sZeroRecords":    "<label>Aucun élément correspondant trouvé</label>",
"oPaginate": {
},

},
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["print","colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-5:eq(0)');
   
  });
</script>
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

<script>
  
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});

</script>
</script>
</body>
</html>
