
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper  ">
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
           <div class="overlay">
                <i class="fas fa-4x fa-sync fa-spin"></i><br>
                Chargement...
            </div>
              
    
  </div>
  <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2>Nouvelle compétition</h2>
          </div>
        </div>
      </div><!-- /.container-fluid -->

  <div >
  <?php if($this->session->flashdata('invalide1')):?>
                  
    <p  style="color:red;" id="g"> <i class="icon fas fa-exclamation"></i> <?php echo $this->session->flashdata('invalide1');?></p>  
                   
          <?php endif;?> 
          <?php if($this->session->flashdata('invalide2')):?>
                   
        <p  style="color:red;" id="f" > <i class="icon fas fa-exclamation"></i> <?php echo $this->session->flashdata('invalide2');?></p>  
                 
          <?php endif;?>  
  <?php if($this->session->flashdata('competition_exist')):?>
					<div class="col-12" id="e">
					<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('competition_exist').'</p>';?>
					</div>
					<?php endif;?>
    <?php echo validation_errors();?> <script>
    $( "#a" ).fadeOut( 10000 );
    $( "#b" ).fadeOut( 10000 );
    $( "#c" ).fadeOut( 10000 );
    $( "#d" ).fadeOut( 10000 );
    $( "#g" ).fadeOut( 20000 );
    $( "#f" ).fadeOut( 20000 );
    $( "#e" ).fadeOut( 15000 );
  </script>
  <?php echo form_open('respocompet/register_compet'); ?>
  <input type="hidden" class="form-control" name="respo_id"  value="<?php echo $this->session->userdata('id_user');?>">
                <div class="card-body">
                  <div class="row">
                  <div class="col-6">
                  <div class="form-group">
                    <label for="">Nom de la compétion</label>
                    <div class="col-9 ">
                    <select type="text" class="form-control" name="nomcompet" >
                    <option value="Coupe du Directeur">Coupe du Directeur </option>
                    <option value="Coupe du Doyen">Coupe du Doyen </option>
                    </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Année académique</label>
                    <div class="col-4">
                    <?php
$annee=$this->db->query('select * from annee_academique where  etat_annee = 0');

?>                     
                   <select type="text" class="form-control" name="annee">
                    <?php foreach($annee->result()  as $an): ?>
                      <option value="<?php echo $an->id_anneee;?>"> <?php echo $an->annee;?> </option>
                    <?php endforeach; ?> 
                    </select>
                    </div>
                  </div>
                  <div class="form-group">
                  
                    <label for="">Genre</label>
                    <div class="col-9">
                    <select class="custom-select form-control" name='typecompet' id="">
                    <?php foreach($data as $row): ?>
                    <option value="<?php echo $row['competition_type']; ?>"> <?php echo $row['competition_type']; ?> </option>
                    <?php endforeach; ?> 
                    
                  </select>
                    </div>
                    
                  <div class="form-group">
                    <label for="">Discipline</label><!--  -->
                    <div class="col-9">  
                    
                    <select class="custom-select form-control" name='discipline' id="choix" onChange="charge_secteur()">
                     <?php foreach($data2 as $row2): ?>
                     <option value="<?php echo $row2['id_discipline']; ?>"> <?php  echo $row2['nom_discipline']; ?> </option>
                     <?php endforeach; ?> 
                 
                  </select>
                    </div>
                  </div>
                  </div>  
                  </div>        
                  <div class="col-6"> 
                  <div class="form-group">
                  
                  <label for="">Etablissement</label>
                  <div class="col-9 autocomplete">
                  <input type="text" class="form-control" name="nom_etab" placeholder="choissisez l'etablissement" id="myInput" >
                  </div>
                  </div>    
                  <div class="form-group">
                  
                  <label for="">Type de discipline</label>
                  <div class="col-9" id="leschoix">
                  
                  <select class="custom-select form-control" name='' disabled >
                  <option > Collective</option>
                  </select>
                  <!-- affichage du select typediscipline-->
                  </div>
                  </div>          
                  <div class="form-group">
                    <label for="">Début</label>
                  
                    <div class="input-group">
                    <div class="col-9">
                    <input type="date" class="form-control float-right" name='debut'   >
                    <span class="error-message"></span>
                    </div>
                  </div>
          
                 </div>
                 <div class="form-group">
                    <label for="">Fin</label>
                    <div class="input-group">
                   
                    <div class="col-9">
                    <input type="date" class="form-control float-right" name='fin'>
                    </div>
                  </div>
                  </div>       
                 </div>
                 </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                  <button type="submit" class="btn btn-outline-info"><i class="fas fa-sign-out-alt"> </i>Suivant</button>
                  </div>
                <?php echo form_close(); ?>
     </div>
    <script>
      <?php
$etablissement=$this->db->query('select * from etablissement');
?>
    function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = [ <?php 
                  foreach($etablissement->result() as $etablissement)
                  {
                    echo'"'.$etablissement->nom_etablissement.'",';
                  } 

                  ?> ];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>

   
  </div>
  <!-- /.content-wrapper -->

  

