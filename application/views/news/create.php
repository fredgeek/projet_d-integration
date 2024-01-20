
<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>


<?php echo form_open_multipart('news/create'); ?>

<label for="title">Title</label>
<input type="text" name="title" /><br />

<label for="text">Text</label>
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
</div>
<input type="submit" name="submit" value="Create news item" />

</form>
			
			