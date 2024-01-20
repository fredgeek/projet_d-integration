
 <div class="content-wrapper">
<section class="content">
      <div class="container-fluid">

      <h3 style="text-align: 50px;">Mes compétitions </h3>
<?php foreach ($data as $compet): ?>
  
  <div class="col-md-9">
  <div class="card card-default collapsed-card">
          <div class="card-header">
          <b> <?php echo  $compet ['nom']; ?> </b> <?php echo  $compet ['type_competition']; ?> de <?php echo  $compet['nom_discipline']; ?> 
  <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
                 <!-- /.card-tools -->
              </div>
             
  <!-- /.card-header --> 
  <div class="card-body">
  <div class="alert alert-secondary alert-dismissible">
  
  <h6>Etablissement : <b> <?php echo  $compet ['nom_etablissement']; ?></b></h6>
                 
                 <p> <b>Du:</b><?php 
                  $date = new DateTime( $compet ['date_debut']);
                  echo $date->format("d-M-Y"); ?>
                 
                 <b> au </b> <?php 
                  $date = new DateTime(  $compet ['date_fin']);
                  echo $date->format("d-M-Y");?> </p>
                
                 <p> <b> discipline :</b><?php echo  $compet['nom_discipline']; ?> </p> 
                 <p> <b> annee académique :</b><?php echo  $compet['annee']; ?> </p> 
                
              
                 
               
   </div> <a href="<?php echo site_url("/respocompet/rencontre_dispo");?>/compet/<?php echo $compet ['id_competition'] ;?>/discipline/<?php echo $compet ['id_discipline'] ;?>">
               <div class="callout callout-secondary">
                  

                  <p>Rencontres</p>
                </div>
    
              </div>
              </a>
              <!-- /.card-body -->
              <div class="card-footer">
              <b >  editée le :</b> <?php 
              $date = new DateTime($compet ['creer_le']);
              echo $date->format("d-M-Y"); ?>
              </div>
  </div>
  </div>
 
  <?php endforeach; ?>
 </div>

<!-- /.containe-fluid -->
</section>
 </div>
 <!-- /.content-wrapper -->

