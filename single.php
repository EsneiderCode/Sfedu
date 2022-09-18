<?php
while ( have_posts() ) : the_post();// старт цикла 
if ( in_category( 'video' ) ) { //ID категории
    include( TEMPLATEPATH.'/single-video.php' );
} else {
    include( TEMPLATEPATH.'/single-default.php' );
}
endwhile;?>