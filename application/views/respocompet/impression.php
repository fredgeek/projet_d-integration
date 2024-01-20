

 <style>
@media print {
    #with_print{
        display: none;
    }
}
</style>

<?php   echo 'error'; ?>
<?php //  echo $data['nom_phase']; ?>
<?php  // echo $data['p']; ?>

<div class="card-body" id="with_or_without_print" >
                 <div class="form-group">
                   <label for="">Phase</label>
                   <div class="input-group">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text">
                                              
                                               <i class="fa fa-plus" aria-hidden="true"></i>
                                           </span>
                                       </div>
                   <div class="col-8">
                   <input type="text" class="form-control" name="phase" placeholder="nom de la phase" required>
                   </div>
                   </div>
                 </div>
                 </div>     


<div id="with_print">I will be hidden when you try to print me   <?php   echo 'error'; ?> </div>
<div id="with_or_without_print">I will be stay forever</div>

<button id="with_print" onclick="window.print()">Print</button>
<a href=""> </a>
<button id="with_print" ><a href="<?php echo site_url();?>/respocompet/index">retour </a></button>