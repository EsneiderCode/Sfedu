<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/page-lks.css?v=<?php echo rand()?>">
    <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/schedule-lks.css?v=<?php echo rand()?>">
    <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/header.css?v=<?php echo(rand()); ?>">
    <link rel="icon" type="image/x-icon" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/images/favicon-ictis.png">
    <title>Личный кабинет студента ИКТИБ</title>
</head>
    <body>
        <div class="principal-container-lks">
            <?php get_header();?>
                <?php wp_reset_postdata(); ?>
                <div class="content-container">
                    <h2 class="lks-title">Личный кабинет студента ИКТИБ</h2>
                    <div class="info-student-container">
                        <?php 
                   $current_user = wp_get_current_user();
$username = $current_user->user_email;
                   $ch = curl_init('http://api.sync.ictis.sfedu.ru/find/student/email?email='.$username);
curl_setopt($ch, CURLOPT_USERPWD, 'projectoffice:q90h5ju4');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);
$html = curl_exec($ch);
curl_close($ch);
$array = json_decode($html);

?>
                        <section class="photo-student-container">
                            <img class="img-photo-student" src="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/images/directorate_images/ic_foto.png" alt="Фотография">
                        </section>
                        <section class="info-student-left">
                            <div class="info-name-student">
                                <h3><?php echo $array->student->lastName . " " . $array->student->firstName ." ".$array->student->secondName;?></h3>
                                <h4><?php echo $array->student->levelLearn . "," ." " . $array->student->grade ." курс";?></h4>
                            </div>
                            <p><?php if ($array->student->levelLearn == "Бакалавр"){
                            $first='б';}
                            else if ($array->student->levelLearn == "Специалитет"){
                            $first='с';}
                            else if ($array->student->levelLearn == "Магистр" ){
                            $first='м';}
                            else if ($array->student->levelLearn == "Аспирант" ){
                            $first='а';}
                            if ($array->student->formLearn == "Очная"){
                            $second='о';}
                            else if ($array->student->formLearn == "Заочная"){
                            $second='з';}
                            $group_name="КТ".$first.$second.$array->student->grade."-".$array->student->stGroup;
                            ?>
                                
                                
                                Учебная группа: <?php echo $group_name;?> </p>
                            <p>Направление подготовки: <?php echo $array->student->speciality; ?></p>
                            <p>Программа: x</p>
                            <p>Кафедра: x</p>
                        </section>
                        <section class="info-student-right">
                          <p><img class="arrow-resources" src="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/images/arrow.png"><span>Мои цифровые ресурсы</span></p>
                          <div class="resources-student">
                            <a href="https://lms.sfedu.ru/">Система электронного обучения</a>
                            <a href="https://grade.sfedu.ru/">Балльно-рейтинговая система</a>
                            <a href="http://ictis.sfedu.ru/subscription/">Электронные библиотеки и лицензионное ПО</a>
                          </div>
                        </section>
                    </div>
                    <div class="second-container-info-student">
                        <section class="options-section-student">
                            <ul>
                            <li><span class="span-color span-green1"></span><a href="https://forms.office.com/Pages/ResponsePage.aspx?id=XUO6GWzkakOE8hsB5pPkgJQJiPBUcYBHs2pnMbkh239URFgySlk3V05MSTJXVU5GMkQ3M1ZNT1JXRS4u">Заказ справок</a></li>
                            <li><span class="span-color span-green2"></span><a href="https://sfedu.ru/www/stat_pages15.show?p=LKS/profil/D#">Личный кабинет студента ЮФУ</a></li>
                            <li><span class="span-color span-blue1"></span><a href="https://practice.sfedu.ru/">Биржа практик</a></li>
                            <li><span class="span-color span-blue2"></span><a href="https://booking.sfedu.ru/">Бронирование аудиторий</a></li>
                            </ul>
                        </section>
                        <section class="scolarship-section-student">
                            <div class="scolarship-container">
                                <h5>Стипендия:</h5>
                                <p class="value-scolarship">0 ₽</p>
                                <p class="hight-text">Отсутствует</p>
                                <a href="">Подробнее</a>
                            </div>
                            <div class="links-student-container">
                                <a>График учебного процесса</a>
                                <a>Мои проекты</a>
                                <a>Ликвидация задолженностей</a>
                            </div>
                        </section>
                        <div class="container-calendar">
                        <h2>Календарь</h2>
                          <?php echo do_shortcode('[my_calendar format="mini"]'); ?>
                          <?php  echo do_shortcode('[my_calendar_upcoming]'); ?>
                        </div>
                    </div>
                    <div class="schedule-container-lks"> 
                    
                       <div id="schedule">
                            <div class="row">
                            <div class="input-field col s10" id="input-block">
                                <input placeholder="Введите номер группы, аудиторию или фамилию преподавателя..." id="search-field" type="text">
                            </div>
                            <div class="input-field col s2">
                                <a class="button-search-schedule" id="search-button">Найти</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12" id="list-block"></div>
                        </div>
                        <div class="row" id="print-calendar">
                            <div class="col s12 center" id="header-block">
                            </div>
                            <div class="col s12" id="week-block"></div>
                            <div class="col s12" id="table-block"></div>
                            <div id="calendar-link"></div>
                        </div>
                            <div class="schedule-mobile"></div>
                        </div>
                        
                    </div>
                </div>
                <?php get_footer(); // подключаем footer.php ?>
            </div>
            <script src="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/js/page-lks.js?v=<?php echo rand()?>"></script>
            <script src="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/js/page-lks-develop.js?v=<?php echo rand()?>"></script>
            <script src="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/js/page-schedule.js?v=<?php echo rand()?>"></script>
    </body>
</html>

