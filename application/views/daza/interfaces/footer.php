 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer  navbar navbar-expand navbar-dark">
    <strong>Copyright  &copy; 2021 </strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    
    </div>
    <script>CKEDITOR . replace ( 'editor1' );</script>
    <script>
     var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
     
  var pieData = {
    labels: [
      'Football',
      'Tennis',
      'Volley-ball',
      'Basket',
      'Hand-ball'
    
     
    ],
    datasets: [
      {
        data: [90, 20, 40, 70, 10],
        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
      }
    ]
  }
  var pieOptions = {
    legend: {
      display: false
    }
  }
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  // eslint-disable-next-line no-unused-vars
  var pieChart = new Chart(pieChartCanvas, {
    type: 'pie',
    data: pieData,
    options: pieOptions
  })

  //-----------------
  // - END PIE CHART -
  //-----------------
    </script>
    <!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src=<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>></script>

<script src=<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>></script>

<!-- AdminLTE App -->
<script src=<?php echo base_url('assets/dist/js/adminlte.min.js');?>></script>
<!-- OPTIONAL SCRIPTS -->
<script src=<?php echo base_url('assets/plugins/chart.js/Chart.min.js');?>></script>
<!-- AdminLTE for demo purposes -->
<script src=<?php echo base_url('assets/dist/js/demo.js');?>></script>

<!-- chagement dynamique -->
<script src=<?php echo base_url('assets/dist/js/secteur.js');?>></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src=<?php echo base_url('assets/dist/js/pages/dashboard3.js');?>></script>

<!-- Select2 -->
<script src=<?php echo base_url('assets/plugins/select2/js/select2.full.min.js');?>></script>
<!-- Bootstrap4 Duallistbox -->
<script src=<?php echo base_url('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js');?>></script>
<!-- InputMask -->
<script src=<?php echo base_url('assets/plugins/moment/moment.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/inputmask/jquery.inputmask.min.js');?>></script>
<!-- date-range-picker -->
<script src=<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js');?>></script>
<!-- bootstrap color picker -->
<script src=<?php echo base_url('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js');?>></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src=<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');?>></script>
<!-- Bootstrap Switch -->
<script src=<?php echo base_url('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js');?>></script>
<!-- BS-Stepper -->
<script src=<?php echo base_url('assets/plugins/bs-stepper/js/bs-stepper.min.js');?>></script>
<!-- dropzonejs -->
<script src=<?php echo base_url('assets/plugins/dropzone/min/dropzone.min.js');?>></script>
<!-- SweetAlert2 -->
<script src=<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js');?>></script>
<!-- Toastr -->
<script src=<?php echo base_url('assets/plugins/toastr/toastr.min.js');?>></script>

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
<script src=<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js');?>></script>
<script src=<?php echo base_url('assets/ckeditor/ckeditor.js');?>></script>

<script>
  
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});

</script>
  </footer>
  
</div>

  
</body>
</html>