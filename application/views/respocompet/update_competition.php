<div class="content-wrapper">
<section class="content">
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="glyphicon glyphicon-align-justify"></i>
  </a>
<?php $var = $this->session->userdata('id_user')?>
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
<h1 style="font-size:20pt">Modifier une compétition</h1>



<button class="btn  btn-outline-secondary" onclick="reload_table()"><i class="fas fa-sync"></i></i> Actualiser</button>
<a href="<?php echo site_url("/respocompet/create_groupes");?>/compet/<?php echo  $this->session->userdata('id_compet');?>/discipline/<?php echo $this->session->userdata('id_discipline');?>">
<button type="button" class="btn btn-outline-danger"><i class="fas fa-sign-out-alt"> </i>Terminer</button></a>
<br>
<br> 
<div class="col-12">
<div class="card">
<div class="card-body">
  <br>
  
                <table id="table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nom </th>
                    <th> Debut</th>
                    <th> Fin</th>
                    <th>Type </th>
                    <th style="width:125px;"></th>
                </tr>
                  </thead>
                  <tbody>
                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>#</th>
            <th>Nom</th>
                    <th>Debut</th>
                    <th>Fin</th>
                    <th>Type</th>
                   
                    <th style="width:200px;"></th>
            </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              </div>
              </div>
              </div> 
             </div>

 
                <div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_competition"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">phase</label>
                            <div class="col-md-9">
                               
                                <input name="nom" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">date debut</label>
                            <div class="col-md-9">
                                <input name="date_debut" placeholder="" class="form-control" type="date">
                               
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">date fin</label>
                            <div class="col-md-9">
                                <input name="date_fin" placeholder="" class="form-control" type="date">
                               
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Genre</label>
                            <div class="col-md-9">
                                <select name="genre"  class="form-control" type="text">
                                <?php foreach ($data as $genre):  ?>
                               <option value=""> <?php echo $genre['competition_type'] ?></option>
                               <?php endforeach?>
                               <</select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-success">Savegarder</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
            </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      </section>

    </div>

<script type="text/javascript" >
  var save_method; //for save method string
var table;


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

    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.

    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": "<?php echo site_url('competition/ajax_list')?>", 
        "type": "POST",
        'data': {
           val: '<?php echo  $this->session->userdata('id_user');?>',
          
        },
    },

    //Set column definition initialisation properties.
    "columnDefs": [
    { 
        "targets": [ -1 ], //last column
        "orderable": false, //set not orderable
       
    },
    
    ],
    "order": [[ 1, 'asc' ]]
 });


});


function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}


function add_phase()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show');
    $('.modal-title').text('Ajouter une phase'); // Set Title to Bootstrap modal title
}

function save()
{
   /// $('#btnSave').text('en cours...'); //change button text
   // $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('competition/ajax_add')?>";
    } else {
        url = "<?php echo site_url('competition/ajax_update')?>";
    }

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

function edit_phase(id_competition)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('competition/ajax_edit/')?>/" + id_competition,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_competition"]').val(data.id_competition);
            $('[name="nom"]').val(data.nom);
            $('[name="date_debut"]').val(data.date_debut);
            $('[name="date_fin"]').val(data.date_fin);
            $('[name="genre"]').val(data.type_competition);
         
           // $('[name="dob"]').datepicker('update',data.dob);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Modifier '); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function delete_phase(id_competition)
{
   
       Swal.fire({
            title: 'Voulez-vous vraiment supprimer ces données ?',
            showCancelButton: true,
            confirmButtonText: `supprimer`,
            cancelButtonText:'Annuler',
            confirmButtonColor: '#d33',
            
            }).then((result) => {
            /* Read more about isConfirmed */
            if (result.isConfirmed) {
                $.ajax({
                    url : "<?php echo site_url('competition/ajax_delete')?>/"+id_competition,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data)
                        {
                            //if success reload ajax table
                            reload_table();
                            Swal.fire('Suppression reussi');
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













