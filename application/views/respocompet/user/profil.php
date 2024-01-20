<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Accueil</a></li>
              <li class="breadcrumb-item active"> Profil</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-secondary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo base_url('assets\img\user1.png');?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"> <?php echo $data['nom'];?></h3>

                <p class="text-muted text-center"><?php echo $data['matricule'];?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nom d'utilisateur</b> <a class="float-right"><?php echo $data['username'];?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Role</b> <a class="float-right"><?php echo $data['role'];?></a>
                  </li>
                 
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Role</strong>

                <p class="text-muted">
                 Pour vous familiariser avec votre role rapprochez-vous d'un administrateur
                </p>
                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Indisponibles...</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Informations</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Modifier</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class=" active tab-pane" id="timeline">
                  <form class="form-horizontal">
                  <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nom d'utilisateur</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" value="<?php echo $data['username'];?>" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName"value="<?php echo $data['nom'];?>" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Prenom</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" value="<?php echo $data['prenom'];?>" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Mot de passe</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputName" value="<?php echo $data['password'];?>" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" value="<?php echo $data['email'];?>" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">contact</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" value="<?php echo $data['contact'];?>" disabled>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                  <?php echo form_open('profil/update')?>
                  <input type="hidden" name='id'  value="<?php echo $this->session->userdata('id_user');?>">
                  <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nom d'utilisateur</label>
                        <div class="col-sm-10">
                          <input type="text" name='username'  class="form-control" id="inputName" value="<?php echo $data['username'];?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10">
                          <input type="text"  name='nom'  class="form-control" id="inputName"value="<?php echo $data['nom'];?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Prenom</label>
                        <div class="col-sm-10">
                          <input type="text"   name='prenom'  class="form-control" id="inputName" value="<?php echo $data['prenom'];?>" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Mot de passe</label>
                        <div class="col-sm-10">
                          <input type="password"   name='password'  class="form-control" id="inputName" value="<?php echo $data['password'];?>" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail"   class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email"  name='email' class="form-control" id="inputEmail" value="<?php echo $data['email'];?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">contact</label>
                        <div class="col-sm-10">
                          <input type="text"   name='contact'  class="form-control" id="inputName2" value="<?php echo $data['contact'];?>" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                      
                          <button type="submit" class="btn btn-outline-danger">Soumettre</button>
                        </div>
                      </div>
                      <?php echo form_close(); ?>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->