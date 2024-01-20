<div class="content-wrapper">


<section class="content">
    <div class="container">
      <br>
      <h1 style="font-size:20pt">Equipes disponibles pour cet établissement et pour cette discipline </h1>
           Associer les équipes aux responsables
        <p> <small> Cette opération est nécessaire pour permettre les inscriptions des joueurs pour les équipes</small> </p>
      <?php if($this->session->flashdata('responsable')):?>
        <a href="<?php echo site_url();?>/respocompet/index">  <button class="btn  btn-outline-danger" ><i class="fas fa-sign-out-alt"></i> Terminer</button>  <a> 
       
        <?php else :?>
            <a href="<?php echo site_url();?>/respocompet/index">  <button class="btn  btn-outline-danger" ><i class="fas fa-sign-out-alt"></i>Revenir plus tard</button><a> 
      <?php endif;?>
        <br />
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>rang</th>
                    <th>Nom</th>
                    <th>Discipline</th>
                    <th>Genre</th>
                    <th>Matricule responsable</th>
                 
                    <th style="width:125px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

            <tfoot>
            <tr>
            <th>rang</th>
                    <th>Nom</th>
                    <th>Discipline</th>
                    <th>Genre</th>
                    <th>Matricule responsable</th>
                  
                    <th style="width:125px;">Action</th>
            </tr>
            </tfoot>
        </table>
    </div>
    </script>
   

<script type="text/javascript">

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

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('ajout_equipe/ajax_list')?>",
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



function add_equipe()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
   // Set Title to Bootstrap modal title
}

function edit_equipe(id)
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

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('ajout_equipe/ajax_add')?>";
    } else {
        url = "<?php echo site_url('ajout_equipe/ajax_update')?>";
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

function delete_equipe(id)
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
                    url : "<?php echo site_url('ajout_equipe/ajax_delete')?>/"+id,
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
                                        <div class="col-4 col-sm-6">
                                      
                                            <label class="control-label col-md-3">Etablissement</label>
                                          <div class="col-md-9">
                                             <input name="etab"  class="form-control" type="text" disabled>
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
  
</section>

</div>