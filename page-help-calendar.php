<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <link rel="icon" type="image/x-icon" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/images/favicon-ictis.png">
    <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/page-help-calendar.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/header.css?v=<?php echo(rand()); ?>">
    <title>Синхронизация с календарем</title>
</head>
<body><div class="principal-container-help-calendar">
<?php get_header(); ?>
    <div class="container-content">
           <h2 class="title-page">Синхронизация с календарем</h2>
           <div class="general-info-container">
                <h3>Как автоматически синхронизировать календарь и расписание занятий</h3>
                <p>На сайте <a target="_BLANK" class="link-help" href="https://ictis.sfedu.ru/schedule">https://ictis.sfedu.ru/schedule</a> откройте страницу индивидуального расписания группы (преподавателя, аудитории) и внизу страницы скопируйте в буфер обмена ссылку на файл расписаний в формате *.ICS.</p>
           </div>
           <div class="mac-os">
                <h3>MacOS</h3>
                <a class="link-help" target="_BLANK" href="https://support.apple.com/ru-ru/HT202361">https://support.apple.com/ru-ru/HT202361</a>
                <ul>
                    <li><span>В программе «Календарь» выберите «Файл» > «Новая подписка Календаря».</span></li>
                    <li><span>Введите URL-адрес файла с расписанием и нажмите кнопку «Подписаться».</span></li>
                    <li><span>Задайте имя календаря и выберите цвет календаря.</span></li>
                    <li><span>Выберите в меню «Размещение» пункт iCloud, затем нажмите кнопку «ОК».</span></li>
                </ul>
           </div>
           <div class="iphone">
                <h3>iPhone</h3>
                <a class="link-help" target="_BLANK" href="https://support.apple.com/ru-ru/guide/iphone/iph3d1110d4/ios">https://support.apple.com/ru-ru/guide/iphone/iph3d1110d4/ios</a>
                <ul>
                    <li><span>Откройте «Настройки»  > «Пароли и учетные записи» > «Новая учетная запись» > «Другое» > «Подписной календарь».</span></li>
                    <li><span>Введите URL-адрес файла с расписанием и нажмите «Далее».</span></li>
                </ul>
           </div>
           <div class="google-calendar">
            <h3>Google Calendar</h3>
                <ul>
                    <li><span>Для синхронизации расписания с Google Calendar выберите Settings — Add calendar — Subscribe to calendar — From URL или сразу перейдите по ссылке <a class="link-help" target="_BLANK" href="https://calendar.google.com/calendar/r/settings/addbyurl">https://calendar.google.com/calendar/r/settings/addbyurl</a></span></li>
                    <li><span>В строке URL of calendar введите URL-адрес файла с расписанием и нажмите кнопку Add.</span></li>
                </ul>            
           </div>
    </div>
    <?php get_footer(); ?>
  </div>
 </body>
</html>