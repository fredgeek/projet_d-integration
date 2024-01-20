<div class="content-wrapper">
<section class="content">
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="glyphicon glyphicon-align-justify"></i>
  </a>

<div class="container-fluid">
        <div class="row">
          <div class="col-12">
<h1 style="font-size:20pt">Ajouter les responsables de classe</h1>


<button type="button" class="btn  btn-outline-success"  onclick="add_rclasse()" >Ajouter </button>
<button class="btn btn-outline-secondary" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i>Actualiser</button>
<a href="<?php echo site_url("/respocompet/index");?>"><button type="button" class="btn btn-outline-info">Terminer</button></a> 
<br>
<br>
<div class="card">
<div class="card-body">
  <br>
  
                <table id="table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  <th>#</th>
                    <th>Identifiant</th>
                    <th>Role</th>
                    <th>Matricule</th>
                    <th>Mot de passe</th>
                    <th style="width:125px;"></th>
                </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>#</th>
                  <th>Identifiant</th>
                    <th>Role</th>
                    <th>Matricule</th>
                    <th>mot de passe</th>
                    <th style="width:200px;"></th>
            </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              </div>
              </div> 
             </div>

 
       <div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header ">
              <h4 class="modal-title ">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" data-backdrop="static" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Identifiant</label>
                            <small> <p> exemple: RC-IUT-GIN2</p></small>
                            <div class="col-md-9">
                                <input name="username" class="form-control" type="text"
                                 placeholder="RC-sigle etablisement- sigle de la filière Niveau" data-inputmask='"regex": "RC-[A-Z]*-[A-Z]*[0-5]$"' data-mask  />
                               

                                <span class="help-block" style="color:brown" ></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Matricule</label>
                            <div class="col-md-9">
                                <input name="matricule" placeholder="Entrer le matricule" class="form-control" type="text">
                               
                                <span class="help-block" style="color:brown" ></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Role</label>
                            <div class="col-md-9">
                               
                                <select name="role"  class="form-control" disabled>
                                <option > Responsable de classe  </option>
                                </select>
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
    searching: false, paging: false, info: true,

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
        "url": "<?php echo site_url('rclasse/ajax_list')?>/",
        "type": "POST"
    },

    //Set column definition initialisation properties.
    "columnDefs": [
    { 
        "targets": [ -1 ], //last column
        "orderable": false, //set not orderable
    },
    ],

});



});

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}


function add_rclasse()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show');
    $('.modal-title').text('Ajouter un responsable de classe'); // Set Title to Bootstrap modal title
}

function save()
{
   /// $('#btnSave').text('en cours...'); //change button text
   // $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('rclasse/ajax_add')?>";
    } else {
        url = "<?php echo site_url('rclasse/ajax_update')?>";
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
            Swal.fire('Matricule existant  ou  utilisateur existant ')
            $('#btnSave').text('sauvegarder'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function edit_rclasse(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('rclasse/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="username"]').val(data.username);
            $('[name="matricule"]').val(data.matricule);
         
           // $('[name="dob"]').datepicker('update',data.dob);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Modifier'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
function delete_rclasse(id)
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
                    url : "<?php echo site_url('rclasse/ajax_delete')?>/"+id,
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
    $('#datemask').inputmask('dd/mm/2020', { 'placeholder': 'dd/mm/yyyy' })
  
    $('[data-mask]').inputmask()
</script>
