<?php
echo '<h2>'.$news_item['title'].'</h2>';
echo $news_item['text']; ?>
<hr>

<?php echo form_open('/news/delete/'.$news_item['id']);?>

<p>
<input type="submit" value="supprimer" class="btn btn-danger">
<a href="<?php echo base_url(); ?>index.php/news/edit/<?php echo $news_item['slug']; ?>"><button type="button" class="btn btn-warning">editer</button></a>
 </p>
 </form>
 <hr>
 <h4>commentaires</h4>
                <?php if($messages): ?>
                    <?php foreach(  $messages as $commentaires): ?>
<div class='well'>
                      <h6><?php
                            echo $commentaires['text'];
                             ?> <b>[par : </b><?php
                             echo $commentaires['nom'];
                              ?><b>]</b></h6>
                              <p style="font-size:small;">Posté le :</small> <?php echo $commentaires['poster_le']; ?></p>
                              </div>
                    <?php endforeach; ?>
                 <?php else: ?>
                    <div class='well'>
                  <p>Soyez le premier à commenter</p>
                  </div>
                <?php endif; ?>
                
 <hr> 
 <h4>ajout d'un message</h4>
 <?php echo validation_errors(); ?>
 <?php echo form_open('messages/create/'.$news_item['id']);?>
 
<label for="nom">Nom</label>
<input type="text" name="nom" /><br />
<label for="email">email</label>
<input type="email" name="email" /><br />


<label for="text">Message</label>
<textarea name="messages" id="" ></textarea><br />
<input type="hidden" name="slug" value="<?php echo $news_item['slug']; ?>">
<button type="submit" name="Soumettre" class="btn btn-success">Soumettre</button>
 </form>
