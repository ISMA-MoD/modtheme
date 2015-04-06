<?php
/**
 * @package modtheme
 */
?>

<article id="post-<?php the_ID(); ?>" class="item">
    
    <a href="<?php echo esc_url( get_permalink() ); ?>">
    
        <div class="postercontainer">
            
            <?php 
            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                the_post_thumbnail();
            } 
            ?>
            
            <div class="infocontainer">
            
            
           <h2><?php the_title(); ?></h2> 
                
                <div class="artistname">
                artist name
                </div>
            
            
            
            
            </div>
        
        
        
        </div>
                  
       
        
    </a>
    
	</article>