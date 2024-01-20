
<div class="content-wrapper"  id="with_or_without_print" >
<section class="content">


<h3>Rencontres et dates</h3>

            
<div class="row">
  <div class="col-md-12">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">
        <i class="fas fa-info-circle"></i></i>
          Details
          <?php    foreach ($data as $d): ?>
   
          <?php endforeach; ?>
        </h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
    <div class="row">
    <div class="col-md-6">
        <div class="alert alert-secondary ">
          <h5><i class="icon fas fa-info"></i>Groupe Info</h5>
          <?php    foreach ($poule_phase as $data): ?>
            <br>
 phase : <?php echo $data['nom_phase'] ?><br>
 
 Date debut : <?php
                          $date = new DateTime($data['date_debut'] );
                          echo $date->format("d-M-Y");  ?><br>
 <?php endforeach; ?>
   
 <?php echo $data['nom_poule'] ?><br>
 
 
        </div>
        </div>
        <div class="col-md-6">
        <div class="alert alert-secondary ">
          <h5>   <?php  $nbre_equipe =0;    ?>
           Equipes
          </h5>
         
          <?php foreach ($poule_equipe as $poule):  $nbre_equipe++ ?> 
  <?php  echo   $nbre_equipe. "-" .$poule['nom']; ?><br>
    <?php  $members[]= $poule['nom']; ?>
  <?php    endforeach  ?> 
  <?php 

  /// fonction qui simule les rencontres /////
  ///                                    /////
 
 
  function scheduler ( $teams ){
    if ( count ( $teams )% 2 != 0 ){
        array_push ( $teams , "  REPOS" );
    }
    $away = array_splice ( $teams ,( count ( $teams )/ 2 ));
    $home = $teams ;
    for ( $i = 0 ; $i < count ( $home )+ count ( $away )- 1 ; $i ++){
        for ( $j = 0 ; $j < count ( $home ); $j ++){
            if (( $i % 2 != 0 ) && ( $j % 2 == 0 )){
            $schedule [ $i ][ $j ][ "Home" ]= $away [ $j ];
            $schedule [ $i ][ $j ][ "Away" ]= $home [ $j ];
            } else {
            $schedule [ $i ][ $j ][ "Home" ]= $home [ $j ];
            $schedule [ $i ][ $j ][ "Away" ]= $away [ $j ];
            }
        }
        if( count ( $home )+ count ( $away )- 1 > 2 )
		
		{
            $var = array_splice ( $home , 1 , 1 );
            
        array_unshift ( $away , array_shift (  $var));
		
		
        array_push ( $home , array_pop ( $away ));
        
        }
    }
    return $schedule ;
}
 
 
$schedule = scheduler($members);
 

?> 
       </div>
       </div>
       </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </div>
  <!-- /.col -->

  <div class="col-md-12">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-calendar"></i>
          <h5>Rencontres</h5>
        </h3>
      </div>
      <!-- /.card-header -->
      
      <div class="card-body">
        <div class="callout callout-info">
        <div class="row"> 
        <div  class="col-md-6 ">
        <?php if(!$this->session->flashdata('existant')):?> <?php echo form_open('respocompet/save_rencontre') ;?> 
          <?php endif;?>
              <?php foreach ($schedule AS $round => $games): ?>

                <?php  foreach ($games AS $play): ?> 
                <table  class="table">     
                  <b>Equipes</b> <br>
                   <?php if ( $data['nom_phase']=='Eliminatoire'): ?>
                  <code> Journée </code> <?php echo $round+1;?>
                 
                  <?php ?>
                  <?php else :?>
                  <b> <code> <?php  echo $data['nom_phase'];?></code></b>  <?php  $round+1;?>
                  <?php endif; ?>
                 <br><br>
                 <tbody>
                    <tr>
                    <td><b><?php  echo $play["Home"];?></b></td>
                    <td><b><code>Contre</code></b></td>
                    <td><b> <?php  echo $play["Away"] ?></b></td>
                    </tr>
                  </tbody>
                 
                 
                </table>
                          <input type="hidden" name= "id_poule[]" value="<?php echo $data['id'] ?>">
                          <input type="hidden" name= "home[]" value="<?php  echo $play["Home"];?> ">
                          <input type="hidden" name= "away[]" value="<?php  echo $play["Away"];?> ">
                          <input type="hidden" name= "journee[]" value="<?php  echo ($round+1);?> ">
                          <input type="hidden" name= "phase_discipline[]" value="<?php echo $id ?>">
                          <?php if(!$this->session->flashdata('existant')):?>
                          <div class="row">
                          <div class="col-3"> </div>
                          
                            <div class="col-6">
                            <b> stade:</b>
                            <select name="stade[]" id="" class="form-control form-control-border border-width-2" >
                                <?php    foreach ($stade as $s): ?>
                                <option value="<?php echo $s['id_stade'] ?>"><?php echo $s['nom_stade'] ?>--<?php echo $s['lieu_stade'] ?> </option>
                                <?php endforeach; ?>
                              </select>
                              <input type ="datetime-local"   name = "date_rencontre[]" 
                              min= "<?php echo $data['date_debut']  ?>T00:00" 
                              max="<?php echo $d['date_fin'] ?>T00:00" class="form-control form-control-border border-width-2" >
                              </div>
                              </div> <br><br>
                            <?php endif;?>
                  <?php endforeach; ?>
              
              <?php endforeach; ?> 
              <?php if(!$this->session->flashdata('existant')):?>
                <input type="submit" value="Enregistrer" class="btn btn-block btn-outline-secondary btn-sm" name="save" class="btn-btn-default">
         </form>
         <?php endif;?>
         <?php if($this->session->flashdata('existant')):?>
          <?php echo form_open('respocompet/update_rencontre/'. $existant) ;?>  
       
           <div class="row">
                          <div class="col-3"> </div>
                          
                            <div class="col-6">
                            <b> stade:</b>
                            <select name="stade" id="" class="form-control form-control-border border-width-2" >
                                <?php    foreach ($stade as $s): ?>
                                <option value="<?php echo $s['id_stade'] ?>"><?php echo $s['nom_stade'] ?>--<?php echo $s['lieu_stade'] ?> </option>
                                <?php endforeach; ?>
                              </select>
                            <b> Date:</b>
                      
                            <input type ="datetime-local"   name = "date_rencontre"  
                              min= "<?php echo $data['date_debut']  ?>T00:00" 
                              max="<?php echo $d['date_fin'] ?>T00:00" class="form-control form-control-border border-width-2" >
                              </div>
                              </div> <br><br>
        <input type="submit" value="Modifier" class="btn btn-block btn-outline-secondary btn-sm" name="save" class="btn-btn-default">
       
        </form>
          <?php endif;?>
         
        </div>
        <!-- /col -->
        <div  class="col-md-6 ">
        <?php if($this->session->flashdata('existant')):?>
       <div class="col-md-6 " ></div>
     <div class="alert alert-success alert-dismissible"id='enregistrer'>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <h5><i class="icon fas fa-check"></i> </h5>
                     <?php echo $this->session->flashdata('existant');?>
                    </div> 
                    <script>
                       $( "#enregistrer" ).fadeOut( 8000 );
                    </script> 
     
<?php endif;?> 
        </div>
        <!-- col -->
         </div>
        </div>
        <div class="callout callout-info">
         NB :
        </div>
        
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>

<!-- /.row -->
</section>
    <!-- /.content -->
     
    <script type="text/javascript">
  var d = new Date();
  var elem = document.getElementById("timelocal[]"); 
  elem.value = d.toISOString().slice(0,16);
</script>
</div>