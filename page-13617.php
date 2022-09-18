<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/page-newlks.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/header.css?v=<?php echo(rand()); ?>">
    <link rel="icon" type="image/x-icon" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/images/favicon-ictis.png">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <title>Личный кабинет студента ИКТИБ</title>
</head>
    <body>
        <div class="principal-container-lks">
            <?php get_header();?>
                <?php wp_reset_postdata(); ?>
                <div class="content-container">
                    <h2 class="lks-title">Личный кабинет студента ИКТИБ</h2>
                    <div class="lks-container">
                         <section class="info-student-right">
                          <p class="info-student-right-p"><img class="arrow-resources" src="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/images/arrow.png"><span>Мои цифровые ресурсы</span></p>
                          <div class="resources-student">
                            <a target="_BLANK" href="https://lms.sfedu.ru/">Система электронного обучения</a>
                            <a target="_BLANK" href="https://grade.sfedu.ru/">Балльно-рейтинговая система ЮФУ</a>
                            <a target="_BLANK" href="http://ictis.sfedu.ru/subscription/">Электронные библиотеки и лицензионное ПО</a>
                          </div>
                        </section>
                        <section class="options-section-student">
                            <ul>
                            <li><span class="span-color span-green1"></span><a target="_BLANK" href="https://forms.office.com/Pages/ResponsePage.aspx?id=XUO6GWzkakOE8hsB5pPkgJQJiPBUcYBHs2pnMbkh239URFgySlk3V05MSTJXVU5GMkQ3M1ZNT1JXRS4u">Заказ справок</a></li>
                            <li><span class="span-color span-green2"></span><a target="_BLANK" href="https://sfedu.ru/www/stat_pages15.show?p=LKS/profil/D#">Личный кабинет студента ЮФУ</a></li>
                            <li><span class="span-color span-blue1"></span><a target="_BLANK" href="https://practice.sfedu.ru/">Биржа практик</a></li>
                            <li><span class="span-color span-blue2"></span><a target="_BLANK" href="https://booking.sfedu.ru/">Бронирование аудиторий</a></li>
                            </ul>
                        </section>
                        <div class="container-calendar">
                        <h2>Календарь</h2>
                          <?php echo do_shortcode('[my_calendar format="mini"]'); ?>
                          <?php  echo do_shortcode('[my_calendar_upcoming]'); ?>
                        </div>
                    </div>
                </div>
                <?php get_footer(); // подключаем footer.php ?>
        </div>
            <script src="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/js/page-lks.js?v=<?php echo(rand()); ?>"></script>
    </body>
</html>

