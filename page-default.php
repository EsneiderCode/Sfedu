<!DOCTYPE html>
    <?php global $wp;
        $obj_id = get_queried_object_id();
    $current_url = get_permalink( $obj_id );?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta https-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta  name="keywords"  content="ИКТИБ,   программирование,  IT,
            программирование   ЮФУ,   ИТКИБ,   ИКТИЮ,   иктию,  ICTIS,   Институт   в
            Таганроге   программист   в   Таганроге,   языки   программирования,
            программирование в Таганроге, обучение в Таганроге, ИТА ЮФУ, ИКТИБ
            ЮФУ,  Институт   Компьютерных   Технологий   и   Информационной
            Безопасности, Institute of Computer Technologies and Information Security,
            ">
        <meta name="robots" content="index,follow,archive" />    
        <meta http-equiv='cache-control' content='no-cache'>
        <meta http-equiv='expires' content='0'>
        <meta http-equiv='pragma' content='no-cache'>
        <link rel="icon" type="image/x-icon" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/images/favicon-ictis.png">
        <title><?php the_title()?></title>
        <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/page.css?v=<?php echo rand()?>">
        <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/header.css?v=<?php echo(rand()); ?>">
    </head>
    <body>
        <div class="principal-container-single">
            <?php get_header() ?>
            <div class="container-new-page">
                    <h2><?php the_title_attribute();?></h2>
                    <section class="text-new">
                        <p class="text1">
                        <?php global $post;
echo apply_filters('the_content', $post->post_content);?>
                    </section>                  
               
            </div>
            <?php get_footer() ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </body>
</html>
