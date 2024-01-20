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
  width: 27%;
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
.vide
{
  font-size: 25px;
  font-weight: bold;
  color:#FF9F55;
  background-color: #e9ecef;
  text-align: center;
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
.mod
{
  width: 45%;
}
.texte
{
  font-size: 20px;
}
.vid
{
  font-weight: bold;
  background-color: #e9ecef;
  border-radius: 15px 15px 15px 15px;
}
.column
{
  width: 50%;
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
      <!-- Sidebar Menu -->
            <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-header" style="font-size: 20px;">MENU</li>
          <li class="nav-item menu-open">
         <li class="nav-item">
            <a href="<?php echo site_url('superadmin/compte_controller/update_compte') ?>" class="nav-link">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
               Comptes
              </p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="<?php echo site_url('superadmin/parcours_controller/recuparcours') ?>" class="nav-link">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
                Parcours
              </p>
            </a>
          </li>
          <li class="nav-item" style="background-color: #212529;">
            <a href="<?php echo site_url('superadmin/Formulaire_controller/formulaire') ?>" class="nav-link">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
                Etablissement/ cycle/ filiere
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="far fas fa-list"></i>
                <p>Consulter</p>
            </a>
          </li>
            <li class="nav-item">
              <a href="<?php echo site_url('superadmin/Affiche_controller/cycle') ?>" class="nav-link">
                <i class="far fas fa-list-alt"></i>
                <p> Liste des cycles</p>
              </a>
            </li>
             <li class="nav-item">
              <a href="<?php echo site_url('superadmin/Affiche_controller/etablissement') ?>" class="nav-link">
                <i class="far fas fa-list-alt"></i>
                <p>Liste des etablissement</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url('superadmin/Affiche_controller/filiere') ?>" class="nav-link">
                <i class="far fas fa-list-alt"></i>
                <p>Liste des filieres</p>
              </a>
            </li>
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
    <ul class="card card-body vide"> FORMULAIRES </ul>  
    <div class="column mx-auto card card-body vid">
              <h3><i>Etablissement</i></h3>
              <?php echo $data; ?>
              <form action="<?php echo site_url('superadmin/Formulaire_controller/etablissement') ?>" method="post">
                <div class="row">
                    <div class="col-sm">
                      <input type="text" class="form-control" placeholder=" entrez le sigle" name="sigle" required="" value='<?= set_value('sigle') ?>' maxlength="8">
                      <?= form_error('sigle') ?>
                    </div>
                    <div class="col-sm">
                      <input type="text" class="form-control" placeholder=" entrez le nom de l'etablissement" name="nom" value='<?= set_value('nom') ?>' required="">
                      <?= form_error('nom') ?>
                    </div>
                    <div class="col-sm">
                      <input type="number" class="form-control" placeholder="contact" name="contact" value='<?= set_value('contact') ?>' required="">
                      <?= form_error('contact') ?>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2" name="ok_etab">Ajouter</button>
                </div>
            </form>
        </div><br>
        <!-- -->
          <div class="column mx-auto card card-body vid">
              <h3><i><b>Cycle<b></i></h3>
              <?php echo $data_cycle; ?>
              <form action="<?php echo site_url('superadmin/Formulaire_controller/cycle') ?>" method="post">
                <div class="form-group row">
                    <div class="col-sm">
                      <input type="text" class="form-control" placeholder="entrez le cycle"name="cycle1" value='<?= set_value('cycle1') ?>' required="">
                      <?= form_error('cycle1') ?>
                    </div>
                    <div class="col-sm">
                      <input type="text" class="form-control" placeholder="entrez le cycle" name="cycle2" value='<?= set_value('cycle2') ?>'>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2" name="ok_cycle">Ajouter</button>
                </div>
            </form>
        </div><br>
              <div class="column mx-auto card card-body vid">
              <h3><i>Filiere</i></h3>
              <?php echo $data_filiere; ?>
              <form action="<?php echo site_url('superadmin/Formulaire_controller/filiere') ?>" method="post">
                <div class="form-group row">
                    <div class="col-sm">
                      <input type="text" class="form-control" placeholder="entrez la filiere" name="filiere1" value='<?= set_value('filiere1') ?>' required="">
                      <?= form_error('filiere1') ?>
                    </div>
                    <div class="col-sm">
                      <input type="text" class="form-control" placeholder="entrez la filiere" name="filiere2" value='<?= set_value('filiere2') ?>'>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2" name="ok_filiere">Ajouter</button>
                </div>
            </form>
        </div>
        <!-- -->
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
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
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
