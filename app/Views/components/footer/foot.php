<!--Page footer-->
<footer class="pageFooter pageFooter2022">
    <div class="maxW">
        <div class="logoFoot">
            <a href="index.php"><img src="https://premiosimonbolivar.com/images/site/logo-psb-2.svg"
                    alt="Premio Nacional de Periodismo Simón Bolívar"></a>
        </div>
        <div class="contFoot">
            <p>
                <a href="premio.php?cod=XG3C6fwm00tyUjxz05wAXG3C6fwm&sel=1$$-1$$-qm4nNEHftm9uNBL12CXG3C6fwm"
                    class="txtBig"><strong>Términos y condiciones del Premio</strong></a>
                <br><br><br><br>
                <!--Av. El Dorado # 68 B-31 piso 9<br> -->
                Bogotá, Colombia<br>

                <a href="mailto:info@premiosimonbolivar.com">info@premiosimonbolivar.com</a>
            </p>
            <?= view_cell('\App\Libraries\ViewSitio::getRedes') ?>
        </div>
    </div>
</footer>
<!--End Page footer-->
</div>
<!--End Main wrapper-->
<!--Scripts-->
<script src="/js/prefixfree.min.js"></script>
<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/flipclock.min.js"></script>
<script src="/js/slick.min.js"></script>
<script src="/js/jquery.colorbox-min.js"></script>
<script src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/jquery.validate.min.js"></script>
<script src="/js/interface.js"></script>
<script src="/js/forms.js"></script>
<!--End Scripts-->


<script>
    function activarmenu(idele) {
        const elements = document.querySelectorAll(".groupyear");
        elements.forEach(function (element) {
            //console.log(element)
            element.classList.add("menuhidden");
        });


        // console.log(idele)
        var element = document.getElementById(idele);
        element.classList.toggle("menuhidden");




    }
</script>

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-98716831-1', 'auto');
    ga('send', 'pageview');
</script>

<script>
    /*
    $(window).on({
        'load': function() {
            $.colorbox({
                href: '//youtu.be/t5KSAyvnQPc',
                iframe: true,
                className: 'fVideos',
                width: '100%',
                height: '100%',
                maxWidth: '100%',
                maxHeight: '100%',
                initialWidth: '100px',
                initialHeight: '100px',
                fixed: true,
                opacity: 0.8,
                transition: 'fade',
                speed: 300,
                fadeOut: 300,
                returnFocus: false,
                overlayClose: false,
                escKey: true,
                closeButton: true,
                current: false,
                rel: false,
                title: '<div class="titleFancy">Ceremonia de premiación</div>',
                onComplete: function() {
                    loadBtnsFancy('open');
                },
                onClosed: function() {
                    loadBtnsFancy('close');
                }
            });
    
        }
    }); */
</script>
<script>
    // $(window).on({
    //     'load': function() {
    //         loadFancyContent('alerta-intro.php');

    //     }
    // });
</script>
</body>

</html>