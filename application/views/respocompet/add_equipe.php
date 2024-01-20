<div class="content-wrapper">
<section class="content">
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="glyphicon glyphicon-align-justify"></i>
  </a>
<?php  $this->session->userdata('id_compet')?>
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
<h1 style="font-size:20pt">Equipes disponibles dans la base de  données</h1>
<br>
        <button class="btn  btn-outline-secondary" onclick="reload_table()"><i class="fas fa-sync"></i>Actualiser</button>
        <a href="<?php echo site_url();?>/respocompet/voir_organigramme/compet/<?php echo $this->session->userdata('id_compet')?>/discipline/<?php   echo $this->session->userdata('id_discipline')?>">  <button class="btn  btn-outline-info" ><i class="fas fa-sign-out-alt"></i>Retour</button>  <a> 
<br>
<br>

<div class="row">
<div class="col-sm-2" id="div1">
<div class="alert alert-secondary ">
<?php foreach ($info as $infos):  ?>
   
  <h6><?php echo $infos['nom_poule'] ?>
  <?php  if ($infos['nom_poule']) {
       break;    /* Vous pourriez aussi utiliser 'break 1;' ici. */
   }
   
   ?>
   </h6><br><br>
  <?php endforeach; ?>
  <br><br>
   <?php $i=0; foreach ($info as $infos2): $i++ ?>
   <?php echo $i ;?>-<?php echo $infos2['nom'];?><br>

<?php endforeach; ?>
</div>
</div>
<div class="col-sm-10">
<div class="card">
<div class="card-body">
  <br>
  <p></p>
                <table id="table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Rang</th>
                <th>Equipe</th>
                <th>Discipline</th>
                <th>Genre</th>
                    <th>Responsable</th>
                    <th>Action</th>
                </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Rang</th>
                <th>Equipe</th>
                <th>Discipline</th>
                <th>Genre</th>
                    <th>Responsable</th>
                    <th>Action</th>
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
                 <!-- /.col -->
             </div>
        <!-- /.col -->
      </div>
      <!-- /.row-->
      </section>
      
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" data-backdrop="static" role="dialog">
    <div class="modal-dialog modal-dialog-centered"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Associer l'équipe à un responsable</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                   
                    <div class="form-body">
                       
                          
                      
                        
                        <div class="row">
                             <div class="col-sm-12">
                                 <label class="control-label col-md-3">Nom </label>
                                    <div class="col-md-9">
                                     <input name="nom" class="form-control" style="width: 100%;"  disabled>
                                        <span class="help-block"></span>
                                    </div>
                                  
                              
                                <div class="row">
                                        <div class="col-8 col-sm-6">
                                          <label class="control-label col-md-3">discipline</label>
                                            <div class="col-md-9">
                                                <input name="discipline" class="form-control" type="text"  disabled>
                                                <span class="help-block"></span>
                                            </div>
                                          </div>
                                       
                                  </div>
                            </div>
                            </div>
                       
                        <div class="form-group">
                            <label class="control-label col-md-3">Genre</label>
                            <div class="col-md-9">
                                <input name="genre" class="form-control"  disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                      
                           <div class="row">
                                         <div class="col-md-6">
                                            <label class="control-label col-md-3">Matricule</label>
                                                <input name="matricule" placeholder=" matricule du délégué" class="form-control" type="text" >
                                                <span class="help-block"></span>
                                            </div>
                                
                             </div>
                             <br>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn  btn-outline-success">Sauvegarder</button>
                <button type="button" class="btn  btn-outline-danger" data-dismiss="modal">Annuler</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<!-- pour l'affichage des joueurs -->
<div class="modal fade" id="modal" data-backdrop="static" role="dialog">
    <div class="modal-dialog modal-dialog-centered"  role="document">
        <div class="modal-content">
           
            <div class="modal-body form">
              
                    <input type="hidden" value="" name="id"/> 
                   
                    <div class="form-body">
                       
                          
                      
                        
                        <div class="row">
                             <div class="col-sm-12">
                                 <label class="control-label col-md-3">Nom </label>
                                    <div class="col-md-9">
                                     <input name="nom" class="form-control" style="width: 100%;"  disabled>
                                        <span class="help-block"></span>
                                    </div>
                                  
                              
                                <div class="row">
                                        <div class="col-8 col-sm-6">
                                          <label class="control-label col-md-3">discipline</label>
                                            <div class="col-md-9">
                                                <input name="discipline" class="form-control" type="text"  disabled>
                                                <span class="help-block"></span>
                                            </div>
                                          </div>
                                       
                                  </div>
                            </div>
                            </div>
                       
                        <div class="form-group">
                            <label class="control-label col-md-3">Genre</label>
                            <div class="col-md-9">
                                <input name="genre" class="form-control"  disabled>
                                <span class="help-block"></span>
                            </div>
                        </div>
                      
                           <div class="row">
                                         <div class="col-md-6">
                                            <label class="control-label col-md-3">Matricule</label>
                                                <input name="matricule" placeholder=" matricule du délégué" class="form-control" type="text" >
                                                <span class="help-block"></span>
                                            </div>
                                
                             </div>
                             <br>
              
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn  btn-outline-success">Sauvegarder</button>
                <button type="button" class="btn  btn-outline-danger" data-dismiss="modal">Annuler</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<!-- End Bootstrap modal -->
  

    </div>

<script type="text/javascript">

var save_method; //for save method string
var table;
var poule =<?php echo $poule;?>;
var phase =<?php echo $phase;?>;
$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
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
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('equipe/ajax_list')?>",
            "type": "POST",
            'data': {
           val: '<?php echo $poule;?>',
                   }
            
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
    location.reload(true);
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

        url = "<?php echo site_url('equipe/ajax_update')?>";
    

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('sauvegarder'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('sauvegarder'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}



function edit_equip(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('ajout_equipe/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.equipe_id);
            $('[name="matricule"]').val(data.matricule_responsable);
            $('[name="nom"]').val(data.nom);
            $('[name="discipline"]').val(data.discipline);
            $('[name="genre"]').val(data.genre);
           
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Associer l\'équipe à un responsable'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
</script>
<script>

function joueur_equipe(id){

    Swal.fire({
                    title: "Consulter la  liste des joueurs ? ",
                    showCancelButton: true,
                    confirmButtonText: `Voir`,
                    cancelButtonText:'Annuler',
                    confirmButtonColor: 'green',
                    
                    }).then((result) => {
                    /* Read more about isConfirmed */
                    if (result.isConfirmed) {
                        $.ajax({
                          url : "<?php echo site_url('equipe/liste_joueurs')?>/"+id,
                                type: "POST",
                              //  data : {"poule" :poule,"phase" :phase},
                                dataType: "JSON",
                                success: function(data)
                                {
                                    //if success reload ajax table
                                   
                                      reload_table();
                                 
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    Swal.fire('Liste Indisponible')
                                }
                            });
                    } 
                    });
    


}
    function add_equipe(id)
        {
                  
                   Swal.fire({
                    title: "Confirmez l'ajout ",
                    showCancelButton: true,
                    confirmButtonText: `Ajouter`,
                    cancelButtonText:'Annuler',
                    confirmButtonColor: 'success',
                    
                    }).then((result) => {
                    /* Read more about isConfirmed */
                    if (result.isConfirmed) {
                        $.ajax({
                          url : "<?php echo site_url('equipe/ajax_add')?>/"+id,
                                type: "POST",
                                data : {"poule" :poule,"phase" :phase},
                                dataType: "JSON",
                                success: function(data)
                                {
                                    //if success reload ajax table
                                   
                                      reload_table();
                                 
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    Swal.fire(' 1-Equipe existante ou groupe complet <br> 2-Equipe existante pour cette phase')
                                }
                            });
                    } 
                    });
              }

</script>




</body>
</html>