<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <link rel="icon" type="image/x-icon" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/images/favicon-ictis.png">
    <title>Медиагалерея</title>
    <link rel="icon" type="image/x-icon" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/images/favicon-ictis.png">
    <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/header.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/single-media-gallery.css?v=<?php echo(rand()); ?>">
</head>
    <body>
        <div class="principal-container-gallery">
                <!-- popup -->
                <div class="popup">
                    <!-- top bar -->
                    <div class="top-bar">
                        <p class="image-name"><?php title_limit(100, "...")?></p>
                        <span class="close-btn">&#x2715</span>
                    </div>
                    <!-- arrows -->
                    <button class="arrow-btn left-arrow">&#x2039;</button>
                    <button class="arrow-btn right-arrow">&#x2039;</button>
                    <!-- image -->
                    <img src="https://ictis.sfedu.ru/wp-content/themes/my_theme/images/1.png" class="large-image" alt="">
                    <!-- image-index -->
                    <p class="index">01</p>
                </div>
            <?php get_header(); // подключаем header.php ?>
            <div class="container-gallery">
                    <h2 class="title-gallery"><?php the_title_attribute()?></h2>
                        <?php $photos= get_attached_media('image');
                            if (!empty($photos)){
                            echo '<h2 class="title-photos">Фотографии</h2> <div class="photos-gallery-container">      ';
                            foreach($photos as $photo){
                            $image_url = $photo->guid;
                            echo '<div class="gallery-image"><img class="search-img" src="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/images/search.png"><img class="image" src="'. $image_url .'"alt=""></div>';
                            }echo '
                            </div>';}
                        ?>
                        <?php $attach = get_attached_media( 'video' );
                            if(!empty($attach)){
                            echo'<h2 class="title-video">Видео</h2>  <div class="video-gallery-container">';
                            foreach ($attach as $at){
                            $video_url = $at->guid;
                                echo '<video class="video-gallery" controls src="'. $video_url .'"alt=""></video>';
                            } echo '
                            </div>';}
                        ?>
            </div>
            <?php wp_reset_postdata(); ?>
            <?php get_footer(); // подключаем footer.php ?>
        </div>
    </body>
</html>
<script src="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/js/single-media-gallery.js?v=<?php echo(rand()); ?>"></script>