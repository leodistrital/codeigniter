<?php
// echo $anionConsulta;
// var_dump($videos);
if (count($videos) > 0 && $anionConsulta>2012 ) {
    // $periodistaAnoData = $periodistaAnoData[0];
?>
<!--Videos trabajos-->
<section class="gDiv sectionHome contVWork gAnimated">
    <div class="maxW">
        <h2 class="title1">Videos de los trabajos premiados</h2>
        <div class="contGSlider">
            <div class="gSlider sliderVWork">
                <?php foreach ($videos as $item) : ?>
                <article class="gSlide">
                    <a href="https://www.youtube.com/embed/<?=$item['vid_gan']  ?>?rel=0&autoplay=1&showinfo=0&controls=1"
                        class="openVideo" data-title="Entrevista">
                        <figure class="cImg"
                            style="background-image: url(http://img.youtube.com/vi/<?=$item['vid_gan']  ?>/0.jpg);">
                            <img src="http://img.youtube.com/vi/<?=$item['vid_gan']  ?>/0.jpg"
                                alt="<?=$item['nom_gan']  ?>">
                        </figure>
                        <header class="cDesc">
                            <div class="vAlign">
                                <span class="icoVideo"></span>
                                <h2 class="title2 categoriavideohome"><strong><?=$item['nom_cat']  ?></strong></h2>
                                <h2 class="title2 mediovideohome"><strong><?=$item['nom_med']  ?></strong></h2>
                                <div class="dHide">
                                    <h3 class="title2 nombrevideo"><?=$item['tra_gan']  ?></h3>
                                    <h3 class="title1 desvideohome"><?=$item['nom_med']  ?></h3>
                                </div>
                            </div>
                        </header>
                    </a>
                </article>
                <?php endforeach ?>
            </div>
        </div>
        <a href="/videos/<?=$anionConsulta?>" class="rbtn btnBig"
            style="font-family: 'Montserrat'; font-size: 0.8rem; color: #331839;">VER
            TODOS</a>
    </div>
</section>
<?php } ?>
<!--End Videos trabajos-->