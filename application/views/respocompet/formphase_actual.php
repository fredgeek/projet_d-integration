<div class="content-wrapper">
<section class="content">
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="glyphicon glyphicon-align-justify"></i>
  </a>
<?php $var =   $this->uri->segment(4);?>
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
<h1 style="font-size:20pt">Configurez les  phases</h1>


<button type="button" class="btn  btn-outline-success"  onclick="add_phase()" >Ajouter </button>
<button class="btn btn-outline-secondary" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i>Actualiser</button>
<a href="<?php echo site_url("/respocompet/create_groupes");?>/compet/<?php  echo $this->uri->segment(4) ;?>/discipline/<?php  echo $this->uri->segment(6) ;?>"><button type="button" class="btn btn-outline-info">Enregistrer</button></a> 
<br>
<br>
<div class="card">
<div class="card-body">
  <br>
  
                <table id="table" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nom de la phase</th>
                    <th>date de debut</th>
                    <th style="width:125px;"></th>
                </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                  <tr>
            <th>Nom de la phase</th>
                    <th>date de debut</th>
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
                    <input type="hidden" value="" name="id_phase"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">phase</label>
                            <div class="col-md-9">
                               
                                <select name="nom_phase" class="form-control">
                                <option > Eliminatoire  </option>
                                <option > 8-Finales </option>
                                <option > 4-Finales </option>
                                <option > Demies-Finales</option>
                                <option > Finale </option>
                                </select>
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
                       
                        <input name="compet_id"  class="form-control" value="<?php  echo $this->uri->segment(4) ;?>" type="hidden">
                        <input name="discipline_id"  class="form-control" value="<?php  echo $this->uri->segment(6) ;?>" type="hidden">
                      
              
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
var v=<?php echo $var?>;


$(document).ready(function() {

//datatables
table = $('#table').DataTable({ v,
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
        "url": "<?php echo site_url('phase/ajax_list')?>/"+ v,
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
        url = "<?php echo site_url('phase/ajax_add')?>";
    } else {
        url = "<?php echo site_url('phase/ajax_update')?>";
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

function edit_phase(id_phase)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('phase/ajax_edit/')?>/" + id_phase,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_phase"]').val(data.id_phase);
            $('[name="nom_phase"]').val(data.nom_phase);
            $('[name="date_debut"]').val(data.date_debut);
         
           // $('[name="dob"]').datepicker('update',data.dob);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Editer une phase'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
function delete_phase(id_phase)
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
                    url : "<?php echo site_url('phase/ajax_delete')?>/"+id_phase,
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












