<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4> Rencontres </h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active"> Rencontres </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      <?php foreach ($data as $equipe): ?>
        <?php endforeach  ?>
        <?php  if ( $equipe['statut_rencontre'] == 0):?>
  <table class="table table-bordered">
       
  <thead>
    <tr>
     
      <th scope="col"  class="text-center"></th>
      <th scope="col" class="text-center" > Equipes</th>
      <th scope="col"  class="text-center"></th>
    </tr>
  </thead>
  <?php foreach ($data as $equipe): ?>
    <?php  if ( $equipe['statut_rencontre'] == 0):?>
  <tbody>
    <tr>
     
      <td><div class="col-md-12 col-sm-12 col-12">
            <div class="info-box">
          
                <span class="info-box-icon bg-danger"><i class="fas fa-basketball-ball"></i></span>
            
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
                   
                        <span class="info-box-icon bg-danger"><i class="fas fa-basketball-ball"></i></span>
                     
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
    <tr>
    <?php  if ( $equipe['etat_rencontre'] != 0):?>
      <?php echo form_open('respocompet/save_results/'.$this->uri->segment(4))?>
     <th scope="col"  class="text-center">  <div class="col-12">
                      <input type="number" name= "score1" min="0" class="form-control form-control-border border-width-2" placeholder="Score 1">
                      </div></th>
     <th scope="col" class="text-center" >
  
    
      
        <input type="hidden" name= "id_poule" value="<?php echo $equipe['poule_id'] ?>">
                          <input type="hidden" name= "home" value="<?php  echo $equipe["equipe_id"];?> ">
                          <input type="hidden" name= "away" value="<?php  echo $equipe["equipe_id2"];?> "> 
                          <div class="col-12"> <input type="submit" value="Enregistrer le resultat" class="btn btn-outline-danger btn-sm" name="save">     </div>
   
         </th>
     <th scope="col"  class="text-center">
     <div class="col-12">
                      <input type="number" name= "score2" min="0" class="form-control form-control-border border-width-2" placeholder="Score 2"> 
                      </div>
     </th>
     <?php echo form_close() ;?>
     <?php  else:?>
      <td></td>
      <td>     <p  class="text-center" style="color: red;" >  <i class="icon fas fa-exclamation-circle"></i> En  attente </p>    </td>
      <td></td>
     <?php  endif; ?>
     </tr>
  </tbody>
  <?php  endif; ?>
  <?php endforeach  ?>
</table>
       
             
<?php  else : ?>

<h3  class="text-center"  style="margin-top: 15%;">   Aucun resultat n'est disponible pour le moment         </h3><br><br><br><br>


  &ensp;   &ensp;   &ensp;   &ensp;      <a href="<?php echo site_url();?>/respocompet/index" class="nav-link"><button class="btn btn-outline-success "><i class="fas fa-sign-out-alt"></i> Quitter</button></a>
<?php  endif; ?>
        
          
        
                    
                      
  
   
              </section>
    <!-- /.content -->
 
 

</div>
<!-- ./wrapper -->