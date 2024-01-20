
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <section class="content">
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Organigramme</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">  </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
    <div class="card card-secondary card-outline">   
    <!-- /.content-header -->
      <div class="container-fluid">
      <?php foreach ($data as $phase): ?>
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h4><?php echo $phase['nom_phase']; ?></h4>
        
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> <!-- /.content-header -->
      <p>  Date :<?php 
      $date = new DateTime($phase['date_debut']);
      echo $date->format("d-M-Y"); 
      ?> </p>
        <div class="row">
        <?php foreach ($data2 as $poule): ?>
         
          <?php if( $poule['phase_id'] == $phase['id_phase']):?>
              <div class="col-md-4">
                      <div class="card card-secondary ">
                        <div class="card-header">
                           <div class="row">
                          <h3 class="card-title"><?php echo $poule['nom_poule']; ?></h3>
                          <?php if( $phase['nom_phase']=="Eliminatoire"):?>
                           &ensp;&ensp;&ensp;&ensp;<small><i onclick="delete_poule( <?php echo $poule['id'];  ?> )" class="fas fa-trash"></i></small>
                         
                           <?php  endif ;?>
                           </div>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                            </button>
                          </div>
                          <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                       
                         <div class="card-body">
                           <div class="container">
                         <?php $i = 0;
                          foreach ($data5 as $key=>$equipe): ?>
                         <?php if( $poule['id'] == $equipe['id_poule'] && $equipe['equipe_id']== $equipe['id_equipe'] ):?>
                          <div class="col-sm-12">
                         <?php echo $equipe['nom'];  
                         $i++;
                  
                           
                         ?> 
                        
                         </div>
                         <?php  endif ;?>
                         <?php endforeach; ?>
                         <?php if( $i<=1 && ($phase['nom_phase']!="Eliminatoire")):?>
                          <div class="col-sm-12">
                        <a href="<?php echo site_url("/respocompet/add_equipe");?>/poule/<?php echo $poule['id'];?>/phase/<?php echo $poule['phase_id'];?>/phase-poule/L-I-K-E">
                        <i class="fas fa-plus"></i> Ajouter des équipes</a>
                        </div>
                        <?php   elseif($i<=3 && ($phase['nom_phase']=="Eliminatoire")):?>
                          <div class="col-sm-12">
                        <a href="<?php echo site_url("/respocompet/add_equipe");?>/poule/<?php echo $poule['id'];?>/phase/<?php echo $poule['phase_id'];?>/phase-poule/L-I-K-E">
                        <i class="fas fa-plus"></i> Ajouter des équipes</a>
                        </div>
                        <?php   else :?>

                        <?php   endif ;?>
                        </div>
                        </div>
                         <!-- /.card-body -->
                         <div class="card-footer">
                          <a href="<?php echo site_url("/respocompet/edit_rencontre");?>/poule/<?php echo $poule['id'];?>/phase/<?php echo $poule['phase_id'];?>/compet/<?php echo $poule['competition_id'];?>/nbre_equipe/<?php echo $i;?>">
                           <div>
                            Definir les dates de rencontre
                           </div></a>
                      </div>
                      <!-- /.card --> 
                      </div>
                      </div>
                    
                     
                        <?php   endif ;?>
         
          <?php endforeach; ?> 
          <!-- /.col -->
         </div>
   
     <div class="d-flex flex-row-reverse bd-highlight">
     <small><button  onclick="delete_phase(<?php echo $phase['id_phase']; ?> )"   class="btn  btn-outline-info btn-xs">   Supprimer la phase ?</button> </small>  
    </div>
        
          <!--/ row---->
          <?php endforeach; ?> 
        
        
         <br><br>
         
            


</section>
 <!-- Main content -->
 <section class="content">
     
</section>
    <!-- /.content -->

  </div>
  <script>
  


</script>
<script type="text/javascript">
    

    
</script>
<script>
$(document).ready(function(){
  $("#echo").click(function(){
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
     // timer: 3000,
    });
  });
});

function delete_poule(id) {
  Swal.fire({
            title: 'Voulez-vous vraiment supprimer ce groupe ?',
            showCancelButton: true,
            confirmButtonText: `supprimer`,
            cancelButtonText:'Annuler',
            confirmButtonColor: '#d33',
            
            }).then((result) => {
            /* Read more about isConfirmed */
            if (result.isConfirmed) {
                $.ajax({
                    url : "<?php echo site_url('respocompet/delete_poule')?>",
                        type: "POST",
                        data: {id:id},
                        success: function(data)
                        {
                            location.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            Swal.fire('la suppression a échoué ', '', 'danger')
                        }
                    });
            } 
    
            });
}
function delete_phase(id) {
  Swal.fire({
            title: 'Voulez-vous vraiment supprimer cette phase ?',
            showCancelButton: true,
            confirmButtonText: `supprimer`,
            cancelButtonText:'Annuler',
            confirmButtonColor: '#d33',
            
            }).then((result) => {
            /* Read more about isConfirmed */
            if (result.isConfirmed) {
                $.ajax({
                    url : "<?php echo site_url('respocompet/delete_phase')?>",
                        type: "POST",
                        data: {id:id},
                        success: function(data)
                        {
                            location.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            Swal.fire('la suppression a échoué ', '', 'danger')
                        }
                    });
            } 
    
            });
}

</script>
  

  

