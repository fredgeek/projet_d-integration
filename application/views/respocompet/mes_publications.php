<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
  <h4>Mes publications</h4>
  

  <?php $i=0; 
            foreach(  $pub_item as $data): $i++ ?>
    <div class="row">
        <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="card card-outline card-secondary">
              <div class="card-header">
                   <small> Publication -<?php echo $i; ?></small>  
             <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <div class="col-md-12">
              
              
                <blockquote class="quote-secondary">
                  <p><?php echo '<h2>'.$data['title'].'</h2>'; ?>
                   <?php echo $data['text']; ?> </p>
                 <small>  <?php echo $data['post']; ?>  <b><cite title="Source Title">Source </cite></b></small>
                </blockquote>
              </div>
              <!-- /.card-body -->
            
              </div>
              <!-- /.card-body -->
              <div class="card-footer justify-content-between">
               <small>
                <?php echo form_open('/publication/delete/'.$data['id']);?>
                <input type="button" value="supprimer" onclick="delete_pub( <?php echo $data['id'];  ?> )" class="btn btn-outline-danger">
               <a href="<?php echo site_url(); ?>/publication/edit/user/<?php echo $this->session->userdata('id_user');?>/post/<?php echo $data['id'];?>"><button type="button" 
                class="btn btn-outline-secondary">Modifier</button></a>
               </small> 
            </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        
          <!-- ./col -->
       
</div>
 <?php endforeach; ?>
 </section>
    <!-- /.content -->
    </div>
   

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

function delete_pub(id) {
  Swal.fire({
            title: 'Voulez-vous vraiment supprimer cette publication ?',
            showCancelButton: true,
            confirmButtonText: `supprimer`,
            cancelButtonText:'Annuler',
            confirmButtonColor: '#d33',
            
            }).then((result) => {
            /* Read more about isConfirmed */
            if (result.isConfirmed) {
                $.ajax({
                    url : "<?php echo site_url('publication/delete')?>",
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
<script>CKEDITOR . replace ( 'editor1' );</script>