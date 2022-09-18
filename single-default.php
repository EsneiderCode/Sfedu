    <?php $main_id = get_the_ID();?>
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
        <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/single-default.css?v=<?php echo(rand()); ?>">
        <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/header.css?v=<?php echo(rand()); ?>">
    </head>
    <body>
        <div class="principal-container-single">
            <?php get_header() ?>
            <div class="container-new-page">
                    <h2><?php the_title_attribute();?></h2>
                    <?php $attach = get_attached_media( 'image');
                        if (!empty($attach)){
                    ?>
                    <div class="slide-contenedor">
                        <?php 
                    foreach ($attach as $at){
                        $image_url = $at->guid;?>
                        <?php
                        if ( $at) {?>
                            <div class="miSlider fade">
                                <?php echo '<img src="'. $image_url .'"alt="">'; ?>
                            </div>
                            <?php }
                    }
                    ?>
                        <?php if(count($attach)>1){?> <div class="directions"> <?php echo' 
                            <a class="atras" onclick="avanzaSlide(-1)">&#10094;</a>
                            <a class="adelante" onclick="avanzaSlide(1)">&#10095;</a>';?>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <section class="text-new">
                        <p class="text1">
                        <?php $text = apply_filters('the_content',get_the_content());
                        $text = preg_replace("/<img[^>]+\>/i", "",$text);
                            $pieces = explode("***",$text);
                            if (count($pieces)==3){echo $pieces[0]. "<br/>";
                        ?>
                            <div class="container-assetat">
                                <div class="border-left"></div>
                                <div class="border-right"></div><?php echo '<p>'. $pieces[1] . '</p>';?>
                            </div>
                        <?php echo $pieces[2]. "<br/>";}
                            else{echo $text;}
                        ?>
                        <div class="info-new-date-down">
                            <div class="date-info">
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
                                <span><?php the_date();?></span>
                            </div>
                            <div class="views-info">
                                <img src="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/images/ic_view.png" alt="">
                                <span><?php if(get_post_meta ($post->ID,'views',true)==0){echo 0;}else{echo get_post_meta( $post->ID, 'views', true );} ?></span>
                            </div>
                        </div>
                        <!-- END IF THERE IS NOT AT LEAST ONE IMAGE CHECK -->
                        <?php $posttags = get_the_tags();
                        if ($posttags) {?>
                            <div class="hashtags">
                        <?php foreach($posttags as $tag) {
                            echo '<a href="'. get_tag_link($tag->term_id).'">#'.$tag->name . '</a>'; 
                        }?>
                        </div>
                        <?php } ?>
                        <div class="share-container">
                            <div class="share-bottom">
                                <a>Поделиться</a>
                                <img src="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/images/ic_share.png" alt="arrow">
                            </div>
                            <div class="container-counter-shareds">
                                <p class="shareds"><a id="clicks"><?php if (get_post_meta($post->ID,'download',true)==0){echo 0;}else{echo get_post_meta($post->ID,'download',true);} ?></a></p>
                            </div>
                            <div class="shareds-container">
                                <div class="share-options">
                                    <a target="_BLANK" href="https://vk.com/share.php?url=<?php the_permalink(); ?>"><img class="vk-share"
                                            src="https://ictis.sfedu.ru/wp-content/uploads/2022/07/ic_vk.png"
                                            onClick="onClick()" alt="vkshare">
                                    </a>
                                    <a target="_BLANK" href="https://telegram.me/share/url?url=<?php the_permalink(); ?>"> <img
                                            class="tel-share"
                                            src="https://ictis.sfedu.ru/wp-content/uploads/2022/07/ic_telegram.png"
                                            onClick="onClick()" alt="telegramshare">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php
                    $tt = get_the_tags();
                    if(!empty($tt)){
                         $c = get_the_category();
                    $args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 4,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'category_id' => $c[0] -> slug,
                        'tag_id' => $tt[0]->term_id
                    );
                    }
                    else{
                         $c = get_the_category();
                    $args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 4,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'category_name' => 'featured'
                    );
                    }
                   
                    $och = new WP_Query($args);
                    ?>
                    <?php if ( $och->have_posts() ) { ?>
                    <section class="also-see-container">
                        <h2>Смотрите также</h2>
                        <div class="another-news-container">
                            <?php $i=0;
                            while ( $och->have_posts() ) : $och->the_post();
                                if(get_the_ID()!=$main_id){
                                        if($i<3){
                                            $i++; ?>
                                                <div class="new1 new">
                                                    <div class="img-new">
                                                        <?php if ( has_post_thumbnail()) { ?>
                                                        <a class="href-img" href="<?php the_permalink(); ?>"
                                                            title="<?php the_title_attribute(); ?>">
                                                            <?php the_post_thumbnail();?> </a> <?php }else { ?>
                                                        <a class="href-img" href="<?php the_permalink(); ?>"
                                                            title="<?php the_title_attribute(); ?>">
                                                            <img src="https://ictis.sfedu.ru/wp-content/uploads/2022/07/newnoimage.png">
                                                        </a>
                                                        <?php }?>
                                                    </div>
                                                    <div class="new-date">
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
                                                                src="https://ictis.sfedu.ru/wp-content/uploads/2022/07/ic_ictis_ads.png"
                                                                alt="" /><?php }
                                                                else{?><img class="logo-tema-new ictis-logo"
                                                                src="https://ictis.sfedu.ru/wp-content/uploads/2022/07/ic_ictis.png"
                                                                alt="" /><?php }?>
                                                            <span><?php the_date();?></span>
                                                        </div>
                                                        <a class="title-new" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </div>
                                                    <?php 
                                            }
                                            else{ break;}
                                            }
                                    endwhile;
                                }
                                ?>
                        </div>
                    </section>
            </div>
            <?php get_footer() ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </body>
</html>

<script>
        $( ".vk-share" ).click(function() { 
    $.ajax({ 
     type:"POST", 
     url: 'https://ictis.sfedu.ru/wp-admin/admin-ajax.php', 
     data: { 
        'action':'update_counter', 
        'post_id' : <?php global $post; echo $post->ID; ?> 
     } 
     });  
    window.location.reload();
const shareOptions = document.querySelector('.share-options');
        shareOptions.style.display = 'flex';}); 

        $( ".tel-share" ).click(function() { 
    $.ajax({ 
     type:"POST", 
     url: 'https://ictis.sfedu.ru/wp-admin/admin-ajax.php', 
     data: { 
        'action':'update_counter', 
        'post_id' : <?php global $post; echo $post->ID; ?> 
     } 
     });  
    window.location.reload();
}); 


     
   // Share functionality
   const shareButton = document.querySelector('.share-bottom');
      shareButton.addEventListener('click', (e)=>{
        e.preventDefault();
        const shareOptions = document.querySelector('.share-options');
        shareOptions.style.display = 'flex';
      })
  
  let indice = 1;
  muestraSlides(indice);
  function avanzaSlide(n){
      muestraSlides( indice+=n );
  }
  // setInterval(function tiempo(){
  //     muestraSlides(indice+=1)
  // },4000);
  function muestraSlides(n){
      let i;
      let slides = document.getElementsByClassName('miSlider');
      let barras = document.getElementsByClassName('barra');
      if(n > slides.length){
          indice = 1;
      }
      if(n < 1){
          indice = slides.length;
      }
      for(i = 0; i < slides.length; i++){
          slides[i].style.display = 'none';
      }
      for(i = 0; i < barras.length; i++){
          barras[i].className = barras[i].className.replace(" active", "");
      }
      slides[indice-1].style.display = 'block';
      barras[indice-1].className += ' active';
  }
</script>