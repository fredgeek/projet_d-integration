<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
          <div class="header">
              <div class="progress-container sticky-top">
               <div class="progress-bar" id="myBar"></div>
              </div> 
          </div>
          <br>
          <br>
          <section>
 <div class="row">
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h4>Les Infrastructures</h4>

                <p>  Voir les Stades ajouter ou modifier les informations </p>
              </div>
              <div class="icon">
                <i class="ion ion-edit"></i>
              </div>
              <a href="<?php echo site_url('daza/Stade_controller/stade') ?>" class="small-box-footer">Commencer <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h4>Rencontre</h4>

                <p>Consulter ,autoriser,Notifier une rencontre...</p>
              </div>
              <div class="icon">
                <i class="ion ion-edit"></i>
              </div>
              <a href="<?php echo site_url('daza/Autorisation_controller/autorise_rencontre') ?>" class="small-box-footer"> Commencer <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4>Compétitions <sup style="font-size: 20px"></sup></h4>

                <p>Autoriser,Notifier une competition...</p>
              </div>
              <div class="icon">
              <i class="ion ion-calendar"></i>
              </div>
              <a href="<?php echo site_url('daza/Autorise_competition_controller/autorisation_competition') ?>" class="small-box-footer">Commencer <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h4>Occupations</h4>

                <p>Consulter ,Ajouter...</p>
              </div>
              <div class="icon">
                <i class="ion ion-edit"></i>
              </div>
              <a href="<?php echo site_url('daza/Occupation_controller/occupation') ?>" class="small-box-footer">Voir<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        
        </div>
        <!-- /.row -->

        </section>

</div>