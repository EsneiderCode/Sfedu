<html>
    <head>
        <link rel="icon" type="image/x-icon" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/images/favicon-ictis.png">
        <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/tag.css?v=<?php echo(rand()); ?>">
        <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/header.css?v=<?php echo(rand()); ?>">
        <meta http-equiv='cache-control' content='no-cache'>
        <meta http-equiv='expires' content='0'>
        <meta http-equiv='pragma' content='no-cache'>
        <title><?php echo "#";single_tag_title( '', true ) ?></title>
    </head>
    <body>
        <div class="principal-container-tag">
            <?php global $wp_query;
            $wp_query = new WP_Query( $query_string . '&posts_per_page=-1');
             get_header();
            ?>
            <div class="conteiner-allnews">
                <h2 class="title-allnews"><?php echo "#";single_tag_title( '', true ) ?></h2>
                <div class="news-container">
                    <?php if( have_posts() ){ while ( have_posts() ) : ?>
                    <section class="conteiner-groupnews">
                        <?php  for($i =0 ; $i < 5; $i++) { the_post();
                            if( $wp_query->current_post == $wp_query->post_count ) {
                                break;
                            }               	
                        ?>
                        <div class="new">
                            <?php if ( has_post_thumbnail()) { ?>
                                <a class="img-new" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> <?php the_post_thumbnail(); ?></a>
                                <?php  } else {?>
                                    <a class="img-new" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="https://ictis.sfedu.ru/wp-content/uploads/2022/07/newnoimage.png">
                                    </a><?php }?>
                            <div class="info-date-container">
                                <?php if(has_category('students_life')){?>
                                <img class="logo-tema-new"
                                    src="https://ictis.sfedu.ru/wp-content/uploads/2022/07/ic_ictis_stud.png"
                                    alt="" /><?php }?>
                                <?php if(has_category('jumbo')){?>
                                <img class="logo-tema-new"
                                    src="https://ictis.sfedu.ru/wp-content/uploads/2022/07/ic_ictis_important.png"
                                    alt="" /><?php }?>
                                <?php if(has_category('announcement')){?>
                                <img class="logo-tema-new"
                                    src="https://ictis.sfedu.ru/wp-content/uploads/2022/07/ic_ictis_ads.png" alt="" /><?php }
                        else{?><img class="logo-tema-new ictis-logo"
                                    src="https://ictis.sfedu.ru/wp-content/uploads/2022/07/ic_ictis.png"
                                    alt="" /><?php }?>
                                <span><?php echo get_the_date()?></span>
                            </div>
                            <div class="textnew-p">
                                <a href="<?php the_permalink(); ?>"><?php the_title()?></a>
                            </div>
                        </div>
                        <?php  }?>
                    </section>
                    <?php endwhile;}
                    else{echo "Tags not found";}
                    ?>
                </div>
            </div>
            <?php wp_reset_postdata(); ?>
            <?php get_footer(); // подключаем footer.php ?>
        </div>
    </body>
</html>