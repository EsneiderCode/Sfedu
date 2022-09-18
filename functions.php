<?php add_theme_support( 'post-thumbnails' );?>
<?php add_theme_support( 'html5', array( 'search-form' ) ); ?>
<?php
  register_nav_menus(
			array(
				'primary'   => __( 'Top primary menu', 'twentyfourteen' ),
				'secondary' => __( 'Secondary menu in left sidebar', 'twentyfourteen' ),
			)
		);
?>
<?php 
add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );
?>
<?php 
register_sidebar( array(
        'name'          => __( 'Sidebar', 'twentyseventeen' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyseventeen' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h6 class="widget-title">',
        'after_title'   => '</h6>',
    ) );
    
    register_sidebar( array(
        'name' => __( 'Шапка.справа', '' ),
        'id' => 'top-area',
        'description' => __( 'Шапка', '' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
?>
<?php function my_excerpt_length( $length ) {
    return 10; // Указываем количество слов
}
add_filter( 'excerpt_length', 'my_excerpt_length' );
add_filter( 'excerpt_more', fn() => '...' );
 ?>
<?php 
// Подсчет количества посещений страниц
add_action( 'wp_head', 'kama_postviews' );

/**
 * @param array $args
 *
 * @return null
 */
function kama_postviews( $args = [] ){
	global $user_ID, $post, $wpdb;

	if( ! $post || ! is_singular() )
		return;

	$rg = (object) wp_parse_args( $args, [
		// Ключ мета поля поста, куда будет записываться количество просмотров.
		'meta_key' => 'views',
		// Чьи посещения считать? 0 - Всех. 1 - Только гостей. 2 - Только зарегистрированных пользователей.
		'who_count' => 0,
		// Исключить ботов, роботов? 0 - нет, пусть тоже считаются. 1 - да, исключить из подсчета.
		'exclude_bots' => true,
	] );

	$do_count = false;
	switch( $rg->who_count ){

		case 0:
			$do_count = true;
			break;
		case 1:
			if( ! $user_ID )
				$do_count = true;
			break;
		case 2:
			if( $user_ID )
				$do_count = true;
			break;
	}

	if( $do_count && $rg->exclude_bots ){

		$notbot = 'Mozilla|Opera'; // Chrome|Safari|Firefox|Netscape - все равны Mozilla
		$bot = 'Bot/|robot|Slurp/|yahoo';
		if(
			! preg_match( "/$notbot/i", $_SERVER['HTTP_USER_AGENT'] ) ||
			preg_match( "~$bot~i", $_SERVER['HTTP_USER_AGENT'] )
		){
			$do_count = false;
		}

	}

	if( $do_count ){

		$up = $wpdb->query( $wpdb->prepare(
			"UPDATE $wpdb->postmeta SET meta_value = (meta_value+1) WHERE post_id = %d AND meta_key = %s",
			$post->ID, $rg->meta_key
		) );

		if( ! $up )
			add_post_meta( $post->ID, $rg->meta_key, 1, true );

		wp_cache_delete( $post->ID, 'post_meta' );
	}

}?>
<?php function title_limit($count, $after) {
$title = get_the_title();
if (mb_strlen($title) > $count) $title = mb_substr($title,0,$count);
else $after = '';
echo $title . $after;
} 

function post_count_on_archive( $query ) {
if ( $query->is_search()) {
$query->set( 'posts_per_page', '5' ); /*количество постов*/
}
}
add_action( 'pre_get_posts', 'post_count_on_archive' );?>
<?php function misha_my_load_more_scripts() {
 
    global $wp_query; 
 
    // register our main script but do not enqueue it yet
    wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/myloadmore.js', array('jquery') );
 
    // now the most interesting part
    // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
    // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
    wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
        'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
        'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages
    ) );
 
    wp_enqueue_script( 'my_loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );

function misha_loadmore_ajax_handler(){
    global $wp_query;
    // prepare our arguments for the query
    $args = json_decode( stripslashes( $_POST['query'] ), true );
    $args['paged'] = $_POST['page'] + 1;// we need next page to be loaded];
    $args['post_status'] = 'publish';
    if(is_category('5')){$args['cat']=array('5','16','65');}
 
    // it is always better to use WP_Query but not here
    query_posts( $args );
 
    if( have_posts() ) :
 
        // run the loop
        while( have_posts() ):?>
 
          <section class="conteiner-groupnews">
               <?php  for($i =0 ; $i < 5; $i++) { the_post();
               if( $wp_query->current_post == $wp_query->post_count ) {
                                break;
                            }      ?>
               <div class="new">
                  <div class="img-new" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                   <?php if ( has_post_thumbnail()) { ?>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                                <?php } else {?>
                            <a href="<?php the_permalink(); ?>"><img src="https://ictis.sfedu.ru/wp-content/uploads/2022/07/newnoimage.png"></a>
                                <?php }?>
                  </div>
                  <div class="info-date-container">
                  <?php if(has_category('students_life')){?>
                    <img class="logo-tema-new" src="https://ictis.sfedu.ru/wp-content/uploads/2022/07/ic_ictis_stud.png" alt="" /><?php }?>
                    <?php if(has_category('jumbo')){?>
                    <img class="logo-tema-new" src="https://ictis.sfedu.ru/wp-content/uploads/2022/07/ic_ictis_important.png" alt="" /><?php }?>
                    <?php if(has_category('announcement')){?>
                    <img class="logo-tema-new" src="https://ictis.sfedu.ru/wp-content/uploads/2022/07/ic_ictis_ads.png" alt="" /><?php }
                  else{?><img class="logo-tema-new ictis-logo" src="https://ictis.sfedu.ru/wp-content/uploads/2022/07/ic_ictis.png" alt="" /><?php }?>
                   <span ><?php echo get_the_date()?></span>
                  </div>
                     <a class="textnew-p" href="<?php the_permalink(); ?>"><?php title_limit(100, '...')?></a>
               </div>
            <?php }?>
        </section>
       <?php endwhile;
    endif;
    die;
}
 
 
 
add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}?>
<?php function update_counter_ajax() { 
$postID = trim($_POST['post_id']); 
$count_key = 'download'; 
$counter = get_post_meta($postID, $count_key, true); 
    if($counter==0){ 
        $count = 1; 
        delete_post_meta($postID, $count_key); 
        add_post_meta($postID, $count_key, '1'); 
    }else{ 
        $counter++; 
        update_post_meta($postID, $count_key, $counter); 
    } 
    return $counter;
wp_die(); 
} 
add_action('wp_ajax_update_counter', 'update_counter_ajax'); 
add_action('wp_ajax_nopriv_update_counter', 'update_counter_ajax');  
if ( !is_admin() ) {
    function wpschool_search_filter($query) {
        if ( $query->is_search ) {
            $query->set('post_type', 'post');
        }
    return $query;
}
add_filter( 'pre_get_posts','wpschool_search_filter' );
}?>
<?php
function my_jquery_scripts() {
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');
  wp_enqueue_script( 'jquery' ); 
}
add_action( 'wp_enqueue_scripts', 'my_jquery_scripts' );
function my_filter_head() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
 
add_action('get_header', 'my_filter_head');
 
/*
 * CSS для прилепления админки к нижнему краю страницы
 */
function true_move_admin_bar() {
	echo '
	<style type="text/css">
	html{margin-bottom:32px !important}
	* html body{margin-bottom:32px !important}
	#wpadminbar{top:auto !important;bottom:0}
	#wpadminbar .menupop .ab-sub-wrapper{bottom:32px;-moz-box-shadow:2px -2px 5px rgba(0,0,0,.2);-webkit-box-shadow:2px -2px 5px rgba(0,0,0,.2);box-shadow:2px -2px 5px rgba(0,0,0,.2)}
	@media screen and ( max-width:782px ){
		html{margin-bottom:46px !important}
		* html body{margin-bottom:46px !important}
		#wpadminbar{position:fixed}
		#wpadminbar .menupop .ab-sub-wrapper{bottom:46px}
	}
	</style>
	';
}
 
//add_action( 'admin_head', 'true_move_admin_bar' ); // в админке
add_action( 'wp_head', 'true_move_admin_bar' ); // на сайте
add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
      show_admin_bar(false);
    }
}
?>
