
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <section class="content">
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Calendrier</h1>
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
    <div class="card card-info card-outline">   
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
      <p>  Dates :<?php echo $phase['date_debut']; ?> </p>
        <div class="row">
        <?php foreach ($data2 as $poule): ?>
          <?php if( $poule['phase_id'] == $phase['id_phase']):?>
              <div class="col-md-4">
                      <div class="card card-secondary ">
                        <div class="card-header">
                           <div class="row">
                          <h3 class="card-title"><?php echo $poule['nom_poule']; ?></h3>
                         
                         
                           </div>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                            </button>
                          </div>
                          <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                         <div class="card-footer">
                          <a href="<?php echo site_url("/respocompet/edit_results");?>/compet/<?php echo $poule['competition_id'];?>/poule/<?php echo $poule['id']; ?>">
                           <div>
                           Resultats
                           </div></a>
                      </div>
                      <!-- /.card --> 
                      </div>
                      </div>
                <?php   endif ;?>
          <?php endforeach; ?> 
          <!-- /.col -->
         </div>
         <?php endforeach; ?> 
          <!--/ row---->
          </div>
             </div>


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

    
</script>
  

  

