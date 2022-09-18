<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/category-featured.css?v=<?php echo(rand()); ?>">
  <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/header.css?v=<?php echo(rand()); ?>">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv='cache-control' content='no-cache'>
  <meta http-equiv='expires' content='0'>
  <meta http-equiv='pragma' content='no-cache'>
  <link rel="icon" type="image/x-icon" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/images/favicon-ictis.png">
  <meta  name="keywords"  content="ИКТИБ,   программирование,  IT,
    программирование   ЮФУ,   ИТКИБ,   ИКТИЮ,   иктию,  ICTIS,   Институт   в
    Таганроге   программист   в   Таганроге,   языки   программирования,
    программирование в Таганроге, обучение в Таганроге, ИТА ЮФУ, ИКТИБ
    ЮФУ,  Институт   Компьютерных   Технологий   и   Информационной
    Безопасности, Institute of Computer Technologies and Information Security,
    ">
  <meta name="robots" content="index,follow,archive" />
  <title>Лента новостей иктиб</title>
</head>
<body>
    <div class="principal-container-allnews">
                                        <?php global $wp_query;
                                        // текущая страница
                                        $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
                                        // максимум страниц
                                        $max_pages = $wp_query->max_num_pages;
                                        ?>
                                        <?php get_header(); ?>
                                        <!--     START ЦИКЛ ЗДЕСЬ     -->
                                        
                                        <?php
                                        $args = array(
                                            'post_type'      => 'post',
                                            'posts_per_page' => 5,
                                            'orderby'        => 'date',
                                            'order'          => 'DESC',
                                            'category_name' => 'jumbo, featured'
                                        );
                                        $q = new WP_Query($args);
                                        ?>
       <div class="conteiner-allnews">
          <h2 class="title-allnews">Новости</h2>
            <div class="news-container">
                         <?php  //for($j =0 ; $j < 2; $j++) {?>
                <section class="conteiner-groupnews">
                            <?php  for($i =0 ; $i < 5; $i++) { $q->the_post();
                                if( $wp_query->current_post + 1 == $wp_query->post_count ) {
                           break;
                        }?>
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
                <?php //}
      wp_reset_postdata();
      if (  $wp_query->max_num_pages > 1 ){
        echo '<div class="misha_loadmore">Больше новостей</div>'; // you can use <a> as well
    }?>
            </div>      
        </div><?php get_footer(); // подключаем footer.php ?>
    </div>
</body>
</html>

