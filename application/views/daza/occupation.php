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
  <link rel="stylesheet" href=<?php echo base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');?>>
<link rel="stylesheet" href=<?php echo base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');?>>
<link rel="stylesheet" href=<?php echo base_url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css');?>>
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
.autocomplete-items div {
  cursor: pointer;
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color:#007bff; 
}
.autocomplet-items div {
  cursor: pointer;
}

/*when hovering an item:*/
.autocomplet-items div:hover {
  background-color:#007bff; 
}
.erreur
{
  color: #dc3545;
  font-size: 20px;
}
.into
{
  color: #343a40;
}
.success
{
  font-size: 20px;
  color: #4CAF50;
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
.orange
{
  background-color: #FF9F55;
  border-radius: 5px 5px 5px 5px;
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
.collapsible {
  color: #444;
  cursor: pointer;
  outline: none;
  font-size: 15px;
  transition: 0.9s;

}

.activer, .collapsible:hover {
  background-color: #ccc; 
}
.content {
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.6s ease-out;
  background-color: transparent;
}
.modal-header
{
  background-color: #FF9F55;
}
.btn
{
  float: right;
}
.vide
{
  font-size: 25px;
  font-weight: bold;
  width: 100%;
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
.mod
{
  width: 45%;
}
.texte
{
  font-size: 20px;
}
.card-title
{
  font-size: 25px;
}
.card
{
  display: inline-block;
}
.fa-lock
{
  color: #6610f2;
  font-size: 18px;
}
.ajou
{
  background-color: #FF9F55;
}
.collapsible:after {
  content: '\002B';
  float: right;
}

.activer:after {
  content: "\2212";
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
  background-color: #4CAF50;
  color: #fff;
  font-size: 17px;
  border-radius: 0px 0px 0px 0px;
}
.btne:hover
{
  background-color: #4CAF50;
  color: #fff;
  font-size: 17px;
  border-radius: 0px 0px 0px 0px;
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
<body class="hold-transition sidebar-mini layout-fixed" >
 <!--MODAL -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Ajouter un évènement</h5>
                  <button type="button" class="close false" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?= site_url('daza/Occupation_controller/occupation') ?>" method="post">
                      <div class="form-group autocomplete">
                          <label for="exampleInputEmail1">Evenement</label>
                          <input type="text" class="form-control" aria-describedby="emailHelp" name="event" value="<?= set_value('event') ?>">
                          <?= form_error('event') ?>
                        </div>
                       
                      <div class="form-group">
                        <?php
                          $recup=$this->db->query('select nom_stade from stade where etat_stade=0');
                        ?>
                          <label for="exampleInputEmail1">Stade</label>
                          <select class="form-control" name="stade">
                            <?php
                              foreach ($recup->result() as $recup) 
                              {
                            ?>
                            <option value="<?php echo $recup->nom_stade ?>">
                                <?php echo $recup->nom_stade ?>    
                            </option>
                            <?php
                              }
                             ?>
                          </select>
                        </div>
                      <div class="form-group">
                        <?php
                          $lieu=$this->db->query('select lieu_stade from stade where etat_stade=0');
                        ?>
                          <label for="exampleInputEmail1">Localisation</label>
                          <select class="form-control" name="lieu">
                            <?php
                              foreach ($lieu->result() as $lieu) 
                              {
                            ?>
                            <option value="<?php echo $lieu->lieu_stade ?>">
                                <?php echo $lieu->lieu_stade ?>    
                            </option>
                            <?php
                              }
                             ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Annee academique</label>
                          <select class="form-control" name="annee">
                            <option value=<?php echo $result ?>>
                                <?php echo $result ?>    
                            </option>
                          </select>
                        </div>

                      <div class="form-group">
                          <label for="exampleInputEmail1">Date</label>
                          <input type="date" class="form-control" aria-describedby="emailHelp" name="dates" value="<?= set_value('dates') ?>">
                          <?= form_error('dates') ?>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Heure debut</label>
                          <input type="time" class="form-control" aria-describedby="emailHelp" name="heure_debut" value="<?= set_value('heure_debut') ?>">
                          <?= form_error('heure_debut') ?>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Heure de fin</label>
                          <input type="time" class="form-control" aria-describedby="emailHelp" name="heure_fin" value="<?= set_value('heure_fin') ?>">
                          <?= form_error('heure_fin') ?>
                        </div>
                      <button type="submit" class="btn btn-success btne">Ajouter</button>
                </div>
                </form>
              </div>
          </div>
    </div>
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
              <li class="nav-item" style="background-color: #212529;">
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
      
    <p class="card card-body vide"> GESTIONS DES EVENEMENTS
    <button type="button" class="btn ajou" data-toggle="modal" data-target="#staticBackdrop"> 
                <h3 class="card-title"><b>
                  <i class="fas fa-edit"></i>
                  Ajouter un évènement</b>
                </h3>
    </button></p>  
        <?php echo $data; ?>
        <?= form_error('event') ?>
        <?= form_error('dates') ?>
        <?= form_error('heure_debut') ?>
        <?= form_error('heure_fin') ?>
    <div class="card-body">

  <table id="example1" class="table table-bordered table-hover">
        <thead>
          <th>ID</th>
          <th>EVENEMENTS</th>
          <th>STADE</th>
          <th>DATE</th>
          <th>HEURE</th>
          <th></th>
          <th></th>
          <th></th>
        </thead>
        <?php $i=0;
                  $recup_annee=$this->daza_model->get_annee_encours();
                  //RECUPERE L'ID AUTRE  DE LA TABLE ANNEE_AUTRE
                  $recup_id_autre=$this->daza_model->get_id_autre_annee($recup_annee);
                  foreach ($recup_id_autre as $annee_autre) 
                  {
                    $i++
                ?> 
                <tr>
                  <td><label><?php echo $i ?></label></td>
                  <td><label><?php echo $annee_autre['nom_autre'] ?></label></td>
                  <td><label><?php echo $annee_autre['nom_stade'].' '.$annee_autre['lieu_stade'] ?></label></td>
                  <td><label><?php echo $annee_autre['date_autre'] ?></label></td>
                  <td><label><?php echo $annee_autre['debut_occupation'].' - '.$annee_autre['fin_occupation'] ?></label></td>
                   <?php if ($annee_autre['statut_autre']==1) 
                        { ?>
                      <td>
                        <div class="icon-bar">
                           <button class="orange bg-light" data-toggle="tooltip" title="modification impossible evenement cloturé"><i class="fa fa-pen"></i></button>
                        </div>       
                      </td>
                      <td>
                        <div class="icon-bar">
                           <button class="orange bg-light" disabled=""><i class="fa fa-trash" >
                          </i></button>
                        </div>       
                      </td>
                      <td>
                        <div class="icon-bar">
                           <label class="erreur">cloturé..</label>
                        </div>       
                      </td>
                        <?php }else{ ?>
                  <td>
              <button class="collapsible orange" data-toggle="tooltip" title="modifier"><i class="fa fa-pen"></i></button>
              <div class="content">
                <form action="<?= site_url('daza/Occupation_controller/update_occupation?id=').$annee_autre['id_occupation']  ?>" method="post">
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">event</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" aria-describedby="emailHelp" name="new_event" value="<?php echo $annee_autre['nom_autre'] ?>" required=""><?= form_error('new_event') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                        <?php
                          $recup=$this->db->query('select nom_stade from stade where etat_stade=0');
                        ?>
                          <label for="staticEmail" class="col-sm-2 col-form-label">Stade</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="new_stade">
                              <?php
                                foreach ($recup->result() as $recup) 
                                {
                              ?>
                              <option value="<?php echo $recup->nom_stade ?>">
                                  <?php echo $recup->nom_stade ?>    
                              </option>
                              <?php
                                }
                               ?>
                            </select>
                          </div>
                        </div>
                      <div class="form-group row">
                        <?php
                          $lieu=$this->db->query('select lieu_stade from stade where etat_stade=0');
                        ?>
                          <label for="staticEmail" class="col-sm-2 col-form-label">Lieu</label>
                          <div class="col-sm-8">
                              <select class="form-control" name="new_lieu">
                                <?php
                                  foreach ($lieu->result() as $lieu) 
                                  {
                                ?>
                                <option value="<?php echo $lieu->lieu_stade ?>">
                                    <?php echo $lieu->lieu_stade ?>    
                                </option>
                                <?php
                                  }
                                 ?>
                              </select>
                            </div>
                        </div>
                    <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">date</label>
                      <div class="col-sm-8">
                        <input type="date" class="form-control" aria-describedby="emailHelp" name="new_date" value="<?php echo $annee_autre['date_autre'] ?>" required=""><?= form_error('new_date') ?>
                      </div>
                    </div>
                     <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">debut
                        </label>
                        <div class="col-sm-8">
                          <input type="time" class="form-control" aria-describedby="emailHelp" name="new_debut" value="<?= $annee_autre['debut_occupation'] ?>" required=""><?= form_error('new_debut') ?>
                        </div>
                      </div>
                      <div class="form-group row">
                      <label for="staticEmail" class="col-sm-2 col-form-label">fin</label>
                      <div class="col-sm-8">
                        <input type="time" class="form-control" aria-describedby="emailHelp" name="new_fin" value="<?php echo $annee_autre['fin_occupation'] ?>" required=""><?= form_error('new_fin') ?>
                      </div>
                    </div>
                      <button type="submit" class="btn btn-success btne" id="modifie">
                         modifier
                       </button>
                </form>
            </div>
          </td>
          <td>
            <div class="icon-bar">
               <button onclick="supp(<?php echo $annee_autre['id_autre']; ?>)" data-toggle="tooltip" title="supprimer" class="orange"><i class="fa fa-trash" >
              </i></button>
            </div>       
          </td>
          <td>
            <div class="icon-bar">
               <button onclick="clos(<?php echo $annee_autre['id_autre']; ?>)" data-toggle="tooltip" title="cloturer une occupation" class="orange"><i class="fas fa-lock" >
              </i></button>
            </div>       
          </td>
        <?php } ?>
        </tr>
        <?php } ?> 
      </table>
  </div>
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
 // $(document).ready(function(){
 // $('button').click( function(){
 function clos(id){
  
    Swal.fire({
            title: 'Voulez-vous vraiment clôturé cet évènement ?',
            showCancelButton: true,
            confirmButtonText: `clôturé`,
            cancelButtonText:'Annuler',
            confirmButtonColor: '#4CAF50',
            cancelButtonColor: '#dc3545',
            
            }).then((result) => {
            /* Read more about isConfirmed */
            if (result.isConfirmed) {
                $.ajax({
                    url : "<?php echo site_url('daza/Occupation_controller/close_occupation')?>",
                        type: "POST",
                      data: {id:id},
                        success: function(data)
                        {
                            //if success reload ajax table
                            location.reload();
                            Swal.fire('<label class="success">évènement clôturé</label>');
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            Swal.fire('la suppression a échoué ', '', 'danger')
                        }
                    });
            } 
            });

  }
//});
//});

            

</script>
<script>
 // $(document).ready(function(){
 // $('button').click( function(){
 function supp(id){
  
    Swal.fire({
            title: 'Voulez-vous vraiment supprimer cet évènement ?',
            showCancelButton: true,
            confirmButtonText: `supprimer`,
            cancelButtonText:'Annuler',
            confirmButtonColor: '#4CAF50',
            cancelButtonColor: '#dc3545',
            
            }).then((result) => {
            /* Read more about isConfirmed */
            if (result.isConfirmed) {
                $.ajax({
                    url : "<?php echo site_url('daza/Occupation_controller/delet_occupation')?>",
                        type: "POST",
                      data: {id:id},
                        success: function(data)
                        {
                            //if success reload ajax table
                            location.reload();
                            Swal.fire('<label class="success">Suppression reussi</label>');
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            Swal.fire('la suppression a échoué ', '', 'danger')
                        }
                    });
            } 
            });

  }
//});
//});

            

</script>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("activer");
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
      "buttons": ["colvis"]
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
