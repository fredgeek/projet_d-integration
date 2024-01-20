<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3> Rencontres  </h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active"> Rencontres/modifier </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
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
    <?php  if ($equipe['statut_rencontre']==1):?>
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
          </div> 
        </td>

          <td class="text-center"> 
          <?php echo  $equipe['nom_phase'] ?> <br>

     <b style='font-size:20px ;' > <?php echo  $equipe['resultat_equipe1']  ?></b>&ensp;  &ensp; &ensp; &ensp;
     <b style='font-size:20px ;'>  <?php echo  $equipe['resultat_equipe2']  ?> </b> <br>
          Terminée <br>
       <b> Date: </b><?php echo $equipe['date_rencontre']?>
              </td>
              <td>
              <div class="col-md-12 col-sm-12 col-12">
            <div class="info-box">
           
              <span class="info-box-icon bg-secondary"><i class="fas fa-basketball-ball"></i></span>
               <div class="info-box-content">
              <span class="info-box-number"> <?php echo  $equipe['nom_equipe2']  ?> </span>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

              </td>
    </tr>
   
    <?php echo form_open('respocompet/update_score/'.$this->uri->segment(3))?>
   
    <tr>
     
     <th scope="col"  class="text-center">  <div class="col-12">
                      <input type="number" name= "score1" min="0" class="form-control form-control-border border-width-2"  value="<?php echo  $equipe['resultat_equipe1']  ?>">
                      </div></th>
     <th scope="col" class="text-center" > <input type="hidden" name= "id_poule" value="<?php echo $equipe['poule_id'] ?>">
                          <input type="hidden" name= "home" value="<?php  echo $equipe["equipe_id"];?> ">
                          <input type="hidden" name= "away" value="<?php  echo $equipe["equipe_id2"];?> "> 
                          <div class="col-12"> <input type="submit" value="Valider la modification" class="btn btn-outline-danger btn-sm" name="save">     </div> </th>
     <th scope="col"  class="text-center">
     <div class="col-12">
                      <input type="number" name= "score2" min="0" class="form-control form-control-border border-width-2"  value="<?php echo  $equipe['resultat_equipe2']  ?>"> 
                     </div>
     </th>
   </tr>
   <?php echo form_close() ;?>
   
 
 <?php  endif;?> 
  </tbody>
  
  <?php endforeach  ?>
</table>
     </section>
    <!-- /.content -->
 
 

</div>
<!-- ./wrapper -->

