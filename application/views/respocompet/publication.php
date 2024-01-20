
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Publication/Nouvelle </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    <div class="row">
          <div class="col-md-12">
            <div class=" card card-outline card-secondary">
              <div class="card-header">
              <i class="fa fa-edit" aria-hidden="true"></i>
            </div>
              <!-- /.card-header -->
              
              <div class="card-body">
              <h3> <b> Nouvelle publication</b> </h3><br>
                <?php echo validation_errors(); ?>


              <?php echo form_open_multipart('publication/create'); ?>

                       
                        <input type="text" name="title" placeholder="Titre de la publication " class="form-control form-control-border form-control-border-width-4" required /><br />

                        <label for="text"class="form-control form-control-border">Contenu </label>
                        <textarea name="text" id="editor1" ></textarea><br />
                        <hr>
                        <div class="form-group">
                        <label for="categorie"> Categorie</label>
                        <select name="categorie_id" id="" class="form-control">
                        <?php foreach ($categorie as $categorie ): ?>
                        <option value="<?php echo  $categorie['id']; ?>"><?php echo  $categorie['nom']; ?>
                        </option>
                        <?php endforeach ;?>
                        </select>
                        </div>
                        <div class="form-group">
                        <label for="">Charger une image</label>
                        <input type="file" name="userfile" size="20">
                        <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('id_user');?>">
                        </div>
                        <input type="submit"  class="btn btn-outline-success" name="submit" value="Terminer" />

                        </form>
</div>
</div>
</div>
</div>
</section>
    <!-- /.content -->
 
 

</div>
<script>CKEDITOR . replace ( 'editor1' );</script>
<!-- ./wrapper -->