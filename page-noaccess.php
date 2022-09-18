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
    <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/noaccess.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/header.css?v=<?php echo(rand()); ?>">
    <title>Страница не доступна</title>
</head>
<body>
    <div class="principal-container-noaccess">
    <?php get_header(); ?>
        <div class="container-content">
            <section class="sec sec-1">
            <span class="span1"></span>
            <span class="span2"></span>
            <span class="span3"></span>
            </section>
            <section class="sec sec-2">
                <h1 class="text-noaccess">Страница недоступна</h1>
            </section>
            <section class="sec sec-3">
                <p>
                Данная страница находится в разработке.
                </p>
                <a href="../">Перейти на главную страницу</a>
            </section>
            <section class="sec sec-4">
                <span class="span1"></span>
            </section>
            <section class="sec sec-5">
                <span class="span1"></span>
                <span class="span2"></span>
                <span class="span3"></span>
            </section>
        </div>
        <?php get_footer(); ?>
    </div></body>
</html>