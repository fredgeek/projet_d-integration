
<div class="content-wrapper">
<section class="content">
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Compétition(s) Invalide(s)</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          
            <ol class="breadcrumb float-sm-right">
           
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
      <div class="container-fluid">
      <div id="cherche">
<?php foreach ($data as $compet): ?>
  
  <div class="col-md-9">
  <div class="card card-default">
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
               <div class="callout callout-danger">
                  <h5> <b>  Motif d'invalidité</b> </h5>

                  <p> <?php echo  $compet['commentaire_competition']; ?></p>
                </div>
             
                <b>Reporter  :</b> <button type="button" onclick="modifier_compet( <?php echo $compet['id_competition'];  ?>,30 )" class="btn btn-outline-info" >1 mois plus tard</button>
                <button type="button" onclick="modifier_compet( <?php echo $compet['id_competition'];  ?>, 21 )" class="btn btn-outline-info" >3 semaines plus tard</button>
                <button type="button" onclick="modifier_compet( <?php echo $compet['id_competition'];  ?>,14)" class="btn btn-outline-info" >2 semaines plus tard</button>
                <button type="button" onclick="modifier_compet( <?php echo $compet['id_competition'];  ?>, 7 )" class="btn btn-outline-info" >1 semaine plus tard</button> <br>
                <button type="button" onclick="delete_compet( <?php echo $compet['id_competition'];  ?> )" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
              </div>
             
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
  </div>
  </div>
 
  <?php endforeach; ?>
  </div>

 </div>
<!-- /.containe-fluid -->
</section>
 </div>
 <!-- /.content-wrapper -->
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
function modifier_compet(id,time) {
  Swal.fire({
            title: 'Voulez-vous vraiment reporter cette Compétition  pour cette periode ?',
            showCancelButton: true,
            confirmButtonText: `Ok`,
            cancelButtonText:'Annuler',
            confirmButtonColor: 'blue',
            
            }).then((result) => {
            /* Read more about isConfirmed */
            if (result.isConfirmed) {
                $.ajax({
                    url : "<?php echo site_url('respocompet/reporter_compet')?>",
                        type: "POST",
                        data: {id:id, time:time},
                        success: function(data)
                        {
                            location.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            Swal.fire('l\'operation a échoué ', '', 'danger')
                        }
                    });
            } 
    
            });
}


function delete_compet(id) {
  Swal.fire({
            title: 'Voulez-vous vraiment supprimer cette Compétition ?',
            showCancelButton: true,
            confirmButtonText: `supprimer`,
            cancelButtonText:'Annuler',
            confirmButtonColor: '#d33',
            
            }).then((result) => {
            /* Read more about isConfirmed */
            if (result.isConfirmed) {
                $.ajax({
                    url : "<?php echo site_url('respocompet/delete_compet')?>",
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