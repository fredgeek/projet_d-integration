
<h2><?php echo $title; ?></h2>


<section class="popular-course-area section-gap">
	<div class="container">
	   <div class="row" >
                
                  <div class="active-popular-carusel">
                  <?php foreach ($news as $news_item): ?>
                        <div class="single-popular-carusel">
                        <div class="thumb-wrap relative">
									<div class="thumb relative">
										<div class="overlay overlay-bg"></div>	
										<img class="img-fluid" src="<?php echo base_url('assets/images');?>/<?php echo $news_item['image']; ?>" alt="">
									</div>
																		
								</div>                                                 
                                <div class="details">
                                         
                                          <h4>
                                            
                                                

                                                <h3><?php echo $news_item['title']; ?></h3>
                                                   <div class="main">
                                                   <?php echo word_limiter($news_item['text'], 10); ?>
                                                   </div>
                                                   <p>
                                             <small>  Posté le :</small> <?php echo $news_item['post']; ?> categorie: <strong> <?php echo $news_item['nom']; ?> </strong>                                                                                                                                
                                                   </p>
                                                 <p><a href="<?php echo site_url('news/'.$news_item['slug']); ?>">View article</a></p>
                                              
                                         </h4>
                                          
                                          
                                 </div>
                         </div>	
                         <?php endforeach; ?> 	
                         					
		 </div>
                                                                   
	     				
						
	   </div>
	</div>	
</section>