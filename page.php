
<?php if ( have_posts() ) while ( have_posts() ) : the_post();// старт цикла 
$content = $post->post_content;
if ( is_page( 787 ) ) { //ID категории
    include( TEMPLATEPATH.'/page-787.php' );
} elseif (empty($content)) {
    include( TEMPLATEPATH.'/page-noaccess.php' );
}
else{include( TEMPLATEPATH.'/page-default.php' );}
endwhile;?>
