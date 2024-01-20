
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
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h4>Statistiques globales </h4>

                <p> Consulter les statistiques pour une compétition donnée</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo site_url();?>/respocompet/stats_globales/<?php echo $this->session->userdata('id_user');?>" class="small-box-footer">Voir<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4>Mes Statistiques <sup style="font-size: 20px"></sup></h4>

                <p> Consulter les statistiques pour une compétition donnée </p>
              </div>
              <div class="icon">
              <i class="ion ion-arrow-graph-up-right"></i>
              </div>
              <a href="#" class="small-box-footer"> Voir <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
               
               <h4> Votre activité  <sup style="font-size: 20px"></sup></h4>

                <p> consultez </p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Voir<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

</section>
    <!-- /.content -->
</div>