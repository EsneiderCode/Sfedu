



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta https-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta  name="keywords"  content="  ИКТИБ,   ИТА   ЮФУ,   ИКТИБ   ЮФУ,
        расписание,   расписание   ИКТИБ,   расписание  ICTIS,   расписание
        преподавателей,   расписание   преподавателей   ИКТИБ,   расписание
        аудиторий,   расписание   аудиторий   ИКТИБ,   расписание   групп,
        расписание групп ИКТИБ, расписание на семестр ИКТИБ">
     <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <link rel="icon" type="image/x-icon" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/images/favicon-ictis.png">
    <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/page-schedule.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/header.css?v=<?php echo(rand()); ?>">
    <title>Расписание занятий </title>
</head>
<body>

<div class="principal-container-schedule">
<?php get_header(); ?> 
    <div class="container-content"> 
        <h2 class="title-schedule">Расписание занятий</h2>
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

    <div class="col s12 center" id="header-block"></div>

    <div class="col s12" id="week-block"></div>

    <div class="col s12" id="table-block"></div>

    <div id="calendar-link"></div>

</div>

    <div class="schedule-mobile"></div>

</div>
    </div>
    <?php get_footer(); ?> 
</div>
   
</body>
</html>
    <script crossorigin="anonymous" src="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/js/page-schedule.js?v=<?php echo(rand()); ?>"></script>
