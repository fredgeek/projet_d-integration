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
              <li class="breadcrumb-item active"> Resultat </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
      <?php foreach ($data as $equipe): ?>
        <?php endforeach  ?>
       
  <table class="table table-bordered">
       
  <thead>
    <tr>
     
      <th scope="col"  class="text-center"></th>
      <th scope="col" class="text-center" > Equipes</th>
      <th scope="col"  class="text-center"></th>
    </tr>
  </thead>
  <?php foreach ($data as $equipe): ?>
    <?php  if ( $equipe['statut_rencontre'] == 1):?>
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
          <?php echo  $equipe['nom_phase'] ?> <br>

    <b style='font-size:20px ;' > <?php echo  $equipe['resultat_equipe1']  ?></b>&ensp;  &ensp; &ensp; &ensp;
     <b style='font-size:20px ;'>  <?php echo  $equipe['resultat_equipe2']  ?> </b> <br>
        Terminée <br>
       <b> Date: </b><?php echo $equipe['date_rencontre']?>
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
    <tr>
    <?php  if ($equipe['statut_rencontre']==1):?>
     <th scope="col" class="text-center" >
                          
            <div class="col-12"><a href="<?php echo  site_url('respocompet/result/'.$this->uri->segment(3)) ;?>"><button type="submit"  class="btn btn-outline-danger btn-sm" name="save"><i class="fas fa-edit"></i> Modifier </button> </a>  </div> </th>
     <td scope="col">
    
      
        <P  id='enregistrer' class="text-center" style="color: red;"> <i class="icon fas fa-exclamation-circle"></i>  Résultat enregistré </P>
                  
                    <script>
                       $( "#enregistrer" ).fadeOut( 100000 );
                    </script> 
     </td>
  <th>  <div class="col-12">  <a href="<?php  echo site_url('/respocompet/competition_dispo/'.$this->session->userdata('id_user')) ;?>">  <button  class="btn btn-outline-info btn-sm" ><i class="fas fa-sign-out-alt"></i>Retour</button></a></div>
</div> </th>
  <?php endif;?> 
     </tr>
  </tbody>
  <?php  endif; ?>
     
  <?php endforeach  ?>
</table>
       

        
                    
                      
  
   
              </section>
    <!-- /.content -->
 
 

</div>
<!-- ./wrapper -->