          
          
         
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
                 
               
   </div>  
             <?php if( $compet ['etat_competition']== 0): ?>
				<a href="<?php echo site_url("/respocompet/voir_organigramme");?>/compet/<?php echo $compet ['id_competition'] ;?>/discipline/<?php echo $compet ['id_discipline'] ;?>"> 
               <div class="callout callout-secondary">
                  

                  <p style="color: red;"> En attente de validation  </p>
                </div>
				</a>
              <?php else: ?> 
                <a href="<?php echo site_url("/respocompet/voir_organigramme");?>/compet/<?php echo $compet ['id_competition'] ;?>/discipline/<?php echo $compet ['id_discipline'] ;?>">
                 <div class="callout callout-secondary">
                  

                  <p> Consuter l'organigramme</p>
                </div>
    
             
              </a>
              <?php endif; ?>
              <!-- /.card-body -->
              <div class="card-footer">
              <b >  editée le :</b> <?php 
              $date = new DateTime($compet ['creer_le']);
              echo $date->format("d-M-Y"); ?>
              </div>
  </div>
  </div>
 