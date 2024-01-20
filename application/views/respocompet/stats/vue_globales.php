  
  <div class="content-wrapper"  id="with_or_without_print" >
<section class="content">
<section class="content-header">
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Statistiques</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active"> Statistiques</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>
    <div class="row">
          <div class="col-md-6 col-sm-6 col-12">
            <div class="info-box shadow-none">
              <span class="info-box-icon bg-secondary"><i class="far fa-star"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"> <b> Total compétitions disponibles</b> </span>
                <p> Suivant les disciplines collectives </p>
              </div>
              <!-- /.info-box-content -->
              <span class="info-box-icon bg-secondary"><?php echo $compet_dispo;?></span>
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-6 col-sm-9 col-12">
            <div class="info-box shadow-sm">
              <span class="info-box-icon bg-success"><i class="far fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Equipes disponibles </b></span>
                <p>Toutes compétitions confondues</p>
              </div>
              <!-- /.info-box-content -->
              <span class="info-box-icon bg-success"><?php echo $equipe_dispo;?></span>
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-6 col-sm-9 col-12">
            <div class="info-box shadow">
            <span class="info-box-icon bg-warning"><i class="far fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><b>Pourcentage des rencontres jouées </b></span>
                <p>Toutes compétitions confondues</p>
              </div>
              <!-- /.info-box-content -->
              <span class="info-box-icon bg-warning"><?php echo $pourcent_renc ;?>%</span>
            </div>
            
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-6 col-sm-9 col-12">
            <div class="info-box shadow-lg">
              <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
              

              <div class="info-box-content">
                <span class="info-box-text"><b>Total stade</b></span>
                <p>Toutes compétitions confondues</p>
                
              </div>
              <span class="info-box-icon bg-danger"><?php if ($stade==0) :?>Indisponible
                <?php else: echo $stade; endif?></span>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Nombre de compétitions pour une discipline</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="chart-responsive">
                      <canvas id="pieChart" height="150"></canvas>
                    </div>
                    <!-- ./chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <ul class="chart-legend clearfix">
                      <li><i class="far fa-circle text-danger"></i>Basket</li>
                      <li><i class="far fa-circle text-success"></i>Football</li> 
                      <li><i class="far fa-circle text-warning"></i>Handball</li>
                      <li><i class="far fa-circle " style="color:#070043 " ></i>Volley</li>
                    </ul>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
        


</section>
    <!-- /.content -->
</div>
<script>

      ///////////////////////////////////////////////////
      ///////////////////////////////////////////////////
      ///////////         pie chart            //////////
      ///////////////////////////////////////////////////
     var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
     
  var pieData = {
    labels:
   
     [ <?php foreach($chart as $row): ?>    
      <?php echo '\''.$row ['nom_discipline'].'\'' ?>,
      <?php endforeach; ?> 
      ],
 
    datasets: [
      {
        data: [<?php echo $basket ?>,<?php echo $football ?>,<?php echo $handball ?>, <?php echo $volleyball ?>],
        backgroundColor: ['#f56954', '#002a00', '#f39c12', '#070043' ]
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