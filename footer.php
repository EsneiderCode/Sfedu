
<?php
/**
 * Шаблон подвала (footer.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
?>
<html>


<head>
    <?php wp_footer(); ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">      
    <link rel="stylesheet" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/css/footer.css?v=<?php echo(rand()); ?>">
    <link rel="icon" type="image/x-icon" href="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/images/favicon-ictis.png">
</head>	
<div class="footer-container">
    <div class="footer">
        <section class="footer-credits">
            <div class="footer-credits-company">
                <div class="info-web">
                   <span>Ответственный за сайт: <span class="footer-web-dev"><a href="https://sfedu.ru/www/stat_pages22.show?p=UNI/s1/D&params=(p_per_id=>-3001872)">Алексей Целых</a></span></span>
                   <span>Сайт разработан Студенческим конструкторским бюро "Компьютерное инновационное творчество" ИКТИБ</span>
                </div>
                <br>
                <br>
                <p class="footer-copyright">© 2015-2022, Институт компьютерных технологий и информационной  безопасности ИТА ЮФУ</p>
            </div>
            <div class="footer-social-network">
                <a target="_blank" href="https://vk.com/ictis_sfedu"><img src="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/images/footer/ic_vk.png" alt="vk"></a>
				<a target="_blank" class="teleg-icon"  href="https://t.me/ictis"><img src="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/images/footer/ic_telegram.png" alt="telegram"></a>
                  <script type="text/javascript">
                    hotlog_r=""+Math.random()+"&amp;s=2066713&amp;im=404&amp;r="+
                        escape(document.referrer)+"&amp;pg="+escape(window.location.href);
                    hotlog_r+="&amp;j="+(navigator.javaEnabled()?"Y":"N");
                    hotlog_r+="&amp;wh="+screen.width+"x"+screen.height+"&amp;px="+
                        (((navigator.appName.substring(0,3)=="Mic"))?screen.colorDepth:screen.pixelDepth);
                    hotlog_r+="&amp;js=1.3";
                    document.write('<a href="http://click.hotlog.ru/?2066713" target="_blank"><img id="counter-audience"'+
                        'src="https://hit34.hotlog.ru/cgi-bin/hotlog/count?'+
                        hotlog_r+'" border="0" width="88" height="31" alt="HotLog"><\/a>');
                </script>
                <noscript>
                    <a href="http://click.hotlog.ru/?2066713" target="_blank"><img
                            id="counter-audience" src="https://hit34.hotlog.ru/cgi-bin/hotlog/count?s=2066713&amp;im=404" border="0"
                            width="88" height="31" alt="HotLog"></a>
                </noscript>
            </div>
        </section>
    </div>
</div>

</html>