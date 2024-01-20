
<div class="content-wrapper"  id="with_or_without_print" >
<section class="content">

<div class="row">
  <div class="col-md-12">
    <div class="card card-default">
      <div class="card-header">
      </div>
      <!-- /.card-header -->
      <div class="card-body">
    <div class="row">
      
    <div class="col-md-6">
        <div class="alert alert-secondary ">
          <h5><i class="icon fas fa-info"></i> Informations</h5>
          <?php    foreach ($poule_phase as $data1): ?>
 phase : <?php echo $data1['nom_phase'] ?><br>
 
 Date debut : <?php
  $date = new DateTime( $data1['date_debut'] );
  echo $date->format("d-M-Y"); ?><br>
 <?php endforeach; ?>  
 <?php echo $data1['nom_poule'] ?><br>

 
        </div>
        </div>
        <div class="col-md-6">
        <div class="alert alert-secondary ">
          <h5>   <?php  $nbre_equipe =0;   ?>
           Equipes
          </h5>
         
          <?php foreach ($poule_equipe as $poule):  $nbre_equipe++ ?> 
        <?php  echo   $nbre_equipe. "-" .$poule['nom']; ?><br>
         <?php    endforeach  ?> 
  <?php ?> 
       </div>
       </div>
       </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </div>
  <!-- /.col -->
</div>

<div class="col-sm-12 ">
  <table class="table table-bordered">
       
  <thead>
    <tr>
     
      <th scope="col"  class="text-center"></th>
      <th scope="col" class="text-center" > Equipes</th>
      <th scope="col"  class="text-center"></th>
    </tr>
  </thead>
  <?php foreach ($data as $equipe): ?>
   
  <tbody>
    <tr>
     
      <td><div class="col-md-12 col-sm-12 col-12">
            <div class="info-box">
          
              <span class="info-box-icon bg-secondary"><i class="fas fa-basketball-ball"></i></span>
              
              <div class="info-box-content">
                <span class="info-box-text"> </span>
                <span class="info-box-number"><?php echo  $equipe['nom_equipe1']  ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div> </td>
          <td class="text-center"> 
            <?php echo  $equipe['nom_phase']  ?> <br>
             <b>  Contre  </b><br>
             <?php  if ( $equipe['nom_phase'] =='Eliminatoire'):?>
              Journee : <b><?php echo  $equipe['Journee'] ?></b> <br> 
              <?php  endif; ?>
            <small><b>Date :</b>&ensp;</small><?php echo  $equipe['date_rencontre'] ?>  
            </td>
              <td> <div class="col-md-12 col-sm-12 col-12">
                    <div class="info-box">
                      <span class="info-box-icon bg-secondary"><i class="fas fa-basketball-ball"></i></span>
                      <div class="info-box-content">
                      <span class="info-box-number"> <?php echo  $equipe['nom_equipe2']  ?>  </span>
                        </span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
              </td>
    </tr>
    <?php  if ($equipe['statut_rencontre']==0):?>
    <?php echo form_open('respocompet/save_results/'.$this->uri->segment(3))?>
   
    <tr>
     
     <th scope="col"  class="text-center">  <div class="col-12">
                      <input type="number" name= "score1" min="0" class="form-control form-control-border border-width-2" placeholder="Score 1">
                      </div></th>
     <th scope="col" class="text-center" > <input type="hidden" name= "id_poule" value="<?php echo $equipe['poule_id'] ?>">
                          <input type="hidden" name= "home" value="<?php  echo $equipe["equipe_id"];?> ">
                          <input type="hidden" name= "away" value="<?php  echo $equipe["equipe_id2"];?> "> 
                          <div class="col-12"> <input type="submit" value="Enregistrer" class="btn btn-outline-secondary btn-sm" name="save">     </div> </th>
     <th scope="col"  class="text-center">
     <div class="col-12">
                      <input type="number" name= "score2" min="0" class="form-control form-control-border border-width-2" placeholder="Score 2"> 
                      </div>
     </th>
   </tr>
   <?php echo form_close() ;?>
   <?php  else:?>  
    <?php  if ($equipe['statut_rencontre']==1):?>
     <th scope="col" class="text-center" >
                          
            <div class="col-12"><a href="<?php echo  site_url('respocompet/result/'.$this->uri->segment(4)) ;?>"><button type="submit"  class="btn btn-outline-danger btn-sm" name="save"><i class="fas fa-edit"></i> Modifier </button> </a>  </div> </th>
     <td scope="col">
    
      
        <P  id='enregistrer' class="text-center" style="color: red;"> <i class="icon fas fa-exclamation-circle"></i>  Résultat enregistré </P>
                  
                    <script>
                       $( "#enregistrer" ).fadeOut( 100000 );
                    </script> 
     </td>
  <th>  <div class="col-12">  <a href="<?php  echo site_url('/respocompet/organigramme_dispo/'.$this->uri->segment(4)) ;?>">  <button  class="btn btn-outline-info btn-sm" ><i class="fas fa-sign-out-alt"></i>Retour</button></a></div>
</div> </th>
  <?php endif;?> 
 <?php  endif;?> 
  </tbody>
  
  <?php endforeach  ?>
</table>
<br>


<br><br>
<!-- /.row -->
</section>
    <!-- /.content -->
</div>