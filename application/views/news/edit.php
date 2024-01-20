<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>


<?php echo form_open('news/update'); ?>
<input type="hidden" name="id" value="<?php echo $news_item['id']; ?>" />
<label for="title">Title</label>
<input type="text" name="title" value="<?php echo $news_item['title']; ?>" /><br />

<label for="text">Text</label>
<textarea name="text" id="editor1" style="padding-left:100px;" ><?php echo $news_item['text']; ?></textarea><br />
<hr>
<div class="form-group">
<label for="categorie"> Categorie</label>
<select name="categorie_id" id="" class="form-control">
<?php foreach ($categorie as $categori ): ?>
<option value="<?php echo  $categori['id']; ?>"><?php echo  $categori['nom']; ?>
</option>
<?php endforeach ;?>
</select>
</div>
<input type="submit" name="submit" value="Soumettre" />

</form>
			

			