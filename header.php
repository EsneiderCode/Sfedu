  <?php dynamic_sidebar( 'top-area' ); 
    wp_nav_menu( array( 'theme_location' => 'secondary' ) );
    wp_head(); ?>
    <div class="principal-container-header">
      <header>
        <div class="header-bg">
            <a href="https://sfedu.ru/" title="" >
            <img class="png_sfedu"  src="https://ictis.sfedu.ru/wp-content/uploads/2022/07/ic_logo_sfedu_ru_1.png" alt="SFEDU">
            </a>
            <a href="<?php echo get_site_url();?>" title="" >
            <img class="png_ictis1" src="https://ictis.sfedu.ru/wp-content/uploads/2022/07/ic_logo_ictis_ru_2.png" alt="ICTIS">
            <img class="png_ictis2" src="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/images/header/ictib.png" alt="ICTIS">
            </a>
        </div>
        <div class="header">
            <?php get_search_form(); ?>
        </div>
      </header>
    </div>
<!-- FUNCTIONALITY FOR THE MENU -->
<script src="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/js/header.js?v=<?php echo(rand()); ?>"></script> 


