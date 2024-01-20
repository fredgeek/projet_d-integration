<div class="content-wrapper">

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Equipe &ensp;<?php echo $info['genre']; ?> <?php echo $info['discipline']; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
   <!-- Main content -->
   <section class="content">

   
 <!-- Main content -->
 <section class="content">
    <a href="<?php echo site_url('/respoclasse/joueurs_m');?>/id/<?php echo $info['equipe_id']; ?>/discipline/<?php echo $info['discipline']; ?>"> <button class="btn  btn-outline-success"><i class="fas fa-user-plus"></i></button> </a>
    <a href="#">  <button class="btn  btn-outline-danger"><i class="fas fa-edit"></i></button></a>
        <br>
        <br>
      <div class="container-fluid">
     
        <div class="row">
        
        
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title"> <?php echo $info['nom']; ?></h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>    
                    <th>rang</th>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Date d'inscription</th>
                  
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i=0;  foreach($data as $row): $i++; ?>
   
                  <tr>
                   <td><?php echo $i ?></td>
                    <td><?php echo $row['matricule']; ?></td>
                    <td><?php echo $row['nom']; ?></td>
                    <td><?php echo $row['prenom']; ?></td>
                    <td><?php echo $row['date_inscription']; ?></td>
                
                </tr>
   <?php endforeach; ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>rang</th>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Date d'inscription</th>
                  
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- jQuery -->
<script src=<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>></script>
<!-- Bootstrap 4 -->
<script src=<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>></script>
<!-- DataTables  & Plugins -->
<script src=<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/jszip/jszip.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/pdfmake/pdfmake.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/pdfmake/vfs_fonts.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js');?>></script>
<script src=<?php echo base_url('plugins/datatables-buttons/js/buttons.colVis.min.js');?>></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "language":  {
"sEmptyTable":     "Aucune donnée disponible dans le tableau",
"sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
"sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
"sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
"sInfoThousands":  ",",
"sLengthMenu":     "Afficher _MENU_ éléments",
"sLoadingRecords": "Chargement...",
"sProcessing":     "Traitement...",
"sSearch":         "Rechercher :",
"sZeroRecords":    "Aucun élément correspondant trouvé",
"oPaginate": {
"sFirst":    "Premier",
"sLast":     "Dernier",
"sNext":     "Suivant",
"sPrevious": "Précédent"
},
"oAria": {
"sSortAscending":  ": activer pour trier la colonne par ordre croissant",
"sSortDescending": ": activer pour trier la colonne par ordre décroissant"
},
"select": {
"rows": {
     "_": "%d lignes sélectionnées",
     "0": "Aucune ligne sélectionnée",
    "1": "1 ligne sélectionnée"
}  
}
},
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
   
  });
</script>

