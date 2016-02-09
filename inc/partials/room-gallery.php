<?php
// get attachments from the post, exclude post thumbnail
  $attachments = get_posts( array(
            'post_type' => 'attachment',
            'posts_per_page' => -1,
            'post_parent' => $post->ID,
            'exclude'     => get_post_thumbnail_id()
        ) );

?>
    <?php if ( $attachments ) { ?>
     <div id="RoomDetails" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            <!-- if the post has attachment images, created carousel of images-->
				<?php
                    $i=0; foreach ( $attachments as $attachment ) { ?>
					<div class="item <?php if ( $i == 0 ) { echo 'active'; } ?>" id="<?php echo $i; ?>">
						<?php $url = wp_get_attachment_image_src ( $attachment->ID, 'page_banner' ); ?>
						<img src="<?php echo $url[0]; ?>" alt="Case Study Image" width=100%; height="auto">                                                                                
                        <?php $image[$i] = wp_get_attachment_image( $attachment->ID, 'gallery_thumbnail' ); ?>
                    </div>
                    <?php $i++; }
                ?>
             </div>
		</div>
    <?php
    // else just display the featured image 
    }  else {  ?>
        <div class="row">
            <div class="col-md-12 centered">
                <?php echo  get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'img-responsive' ) ); ?>
            </div>
        </div>
    <?php    
    }
    ?>