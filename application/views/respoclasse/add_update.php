<div class="content-wrapper">
<section class="content">
    <div class="container">
        <h1 style="font-size:20pt">Ajouter des joueurs</h1>

      
        <br />

        <button class="btn  btn-outline-success" onclick="add_player()"><i class="fas fa-plus"></i>Ajouter</button>
        <button class="btn  btn-outline-secondary" onclick="reload_table()"><i class="fas fa-sync"></i></i> Actualiser</button>
        <a href="<?php echo site_url();?>/respoclasse/index">  <button class="btn  btn-outline-danger" ><i class="fas fa-sign-out-alt"></i>Terminer</button>  <a> 
        <br />
        <br />
        <form method="post" id="import_form" enctype="multipart/form-data">
			<p><label>Fichier Excel des participants</label>
			<input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
			<br />
			<input type="submit" name="import" value="Importer" class="btn  btn-outline-info" />
		</form>
        <br />
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>rang</th>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Genre discipline</th>
                   
                    <th>contact</th>
                    <th>email</th>
                    <th style="width:125px;">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

            <tfoot>
            <tr>
            <th>rang</th>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Genre discipline</th>
                   
                    <th>contact</th>
                    <th>email</th>
                    <th style="width:125px;">Action</th>
                   
            </tr>
            </tfoot>
        </table>
    </div>
    </script>
    <!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src=<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>></script>

<script src=<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>></script>

<!-- AdminLTE App -->
<script src=<?php echo base_url('assets/dist/js/adminlte.min.js');?>></script>
<!-- OPTIONAL SCRIPTS -->
<script src=<?php echo base_url('assets/plugins/chart.js/Chart.min.js');?>></script>
<!-- AdminLTE for demo purposes -->
<script src=<?php echo base_url('assets/dist/js/demo.js');?>></script>

<!-- chagement dynamique -->
<script src=<?php echo base_url('assets/dist/js/secteur.js');?>></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src=<?php echo base_url('assets/dist/js/pages/dashboard3.js');?>></script>

<!-- Select2 -->
<script src=<?php echo base_url('assets/plugins/select2/js/select2.full.min.js');?>></script>
<!-- Bootstrap4 Duallistbox -->
<script src=<?php echo base_url('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js');?>></script>
<!-- InputMask -->
<script src=<?php echo base_url('assets/plugins/moment/moment.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/inputmask/jquery.inputmask.min.js');?>></script>
<!-- date-range-picker -->
<script src=<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js');?>></script>
<!-- bootstrap color picker -->
<script src=<?php echo base_url('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js');?>></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src=<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');?>></script>
<!-- Bootstrap Switch -->
<script src=<?php echo base_url('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js');?>></script>
<!-- BS-Stepper -->
<script src=<?php echo base_url('assets/plugins/bs-stepper/js/bs-stepper.min.js');?>></script>
<!-- dropzonejs -->
<script src=<?php echo base_url('assets/plugins/dropzone/min/dropzone.min.js');?>></script>
<!-- SweetAlert2 -->
<script src=<?php echo base_url('assets/plugins/sweetalert2/sweetalert2.min.js');?>></script>
<!-- Toastr -->
<script src=<?php echo base_url('assets/plugins/toastr/toastr.min.js');?>></script>

<!-- DataTables  & Plugins -->
<script src=<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/jszip/jszip.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/pdfmake/pdfmake.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/pdfmake/vfs_fonts.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js');?>></script>
<script src=<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js');?>></script>
<script src=<?php echo base_url('assets/ckeditor/ckeditor.js');?>></script>

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
            "url": "<?php echo site_url('player/ajax_list')?>",
            "type": "POST",
            'data': {
           val: '<?php echo  $this->session->userdata('matricule');?>',
          
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

$('#import_form').on('submit', function(event){
		event.preventDefault();
		$.ajax({
			url:"<?php echo site_url('respoclasse/import')?>",
			method:"POST",
			data:new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			success:function(data){
				$('#file').val('');
                table.ajax.reload(null,false);
				Swal.fire('chargement reussi')
               // alert(data);
			}
            
		})
	});



function add_player()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
   // Set Title to Bootstrap modal title
}

function edit_player(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('player/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="matricule"]').val(data.matricule);
            $('[name="nom"]').val(data.nom);
            $('[name="prenom"]').val(data.prenom);
            $('[name="genre"]').val(data.Genre_discipline);
            $('[name="contact"]').val(data.contact);
            $('[name="email"]').val(data.email);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Modifier un(e) participant(e)'); // Set title to Bootstrap modal title

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
        url = "<?php echo site_url('player/ajax_add')?>";
        
    } else {
        url = "<?php echo site_url('player/ajax_update')?>";
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
            Swal.fire('Matricule existant / echec de modification')
            $('#btnSave').text('sauvegarder'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_player(id)
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
                    url : "<?php echo site_url('player/ajax_delete')?>/"+id,
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
                <h3 class="modal-title">Ajout du participant</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal" method="post">
                    <input type="hidden" value="" name="id"/> 
                    <input type="hidden" value="<?php echo  $this->session->userdata('matricule');?>" name="val"/>  
                    <div class="form-body">
                       
                          
                      
                        
                        <div class="row">
                             <div class="col-sm-12">
                                 <label class="control-label col-md-3">Matricule</label>
                                    <div class="col-md-9">
                                        <input name="matricule" placeholder="Matricule" class="form-control" type="text">
                                        <span class="help-block" style="color:brown" ></span>
                                    </div>
                              
                                <div class="row">
                                        <div class="col-8 col-sm-6">
                                          <label class="control-label col-md-3">Nom</label>
                                            <div class="col-md-9">
                                                <input name="nom" placeholder="Nom" class="form-control" type="text">
                                                <span class="help-block" style="color:brown"></span>
                                            </div>
                                        </div>
                                        <div class="col-4 col-sm-6">
                                      
                                            <label class="control-label col-md-3">prenom</label>
                                          <div class="col-md-9">
                                             <input name="prenom" placeholder="prenom" class="form-control" type="text">
                                              <span class="help-block"></span>
                                         </div>
                                      </div>
                                  </div>
                            </div>
                            </div>
                       
                        <div class="form-group">
                            <label class="control-label col-md-3">Genre</label>
                            <div class="col-md-9">
                                <select name="genre" class="form-control">
                                    <option value="">-- --</option>
                                    <option value="Masculine">Masculine</option>
                                    <option value="Feminine">Feminine</option>
                                </select>
                                <span class="help-block" style="color:brown"></span>
                            </div>
                        </div>
                           <div class="row">
                                         <div class="col-md-6">
                                            <label class="control-label col-md-3">Contact</label>
                                                <input name="contact" placeholder="Address" class="form-control" type="text" >
                                                <span class="help-block"></span>
                                            </div>
                                           <div class="col-md-6">
                                            <label class="control-label col-md-3">Email</label>
                                                <input name="email" placeholder="@" class="form-control" type="text">
                                                <span class="help-block"></span>
                                            </div>
                             </div>
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