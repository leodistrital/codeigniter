<?php
if (count($juradosData) > 0) {
    // $periodistaAnoData = $periodistaAnoData[0];
?>
<!--Jurado-->
<section id="juradoHome" class="gDiv sectionHome contJury gAnimated fadeIn">
    <div class="maxW">
        <h2 class="title3 ganhome ajuste-lavanda" style="margin-bottom: 4rem;">Jurado</h2>

        <div class="contGSlider">
            <div class="gSlider sliderJury">

                <?php foreach ($juradosData as $item) : ?>
                <article class="gSlide">

                    <figure class="cImg">
                        <a class="juradohome2022 introSect openFancy cboxElement"
                            href="/jurado/<?=$item['cod_jur']  ?>">
                            <img src="images/jurados/interna/<?=$item['img_jur']  ?>" alt="<?=$item['nom_jur']  ?>">
                        </a>
                    </figure>

                    <h2 class="title1 nombrejuradohome">
                        <a href="/jurado/<?=$item['cod_jur']  ?>"
                            class="openFancy cboxElement"><?=$item['nom_jur']  ?><br>
                            <span class="presidente_jurado"><?=$item['car_jur']  ?></span>
                        </a>
                    </h2>
                    <div class="desc" style="height: 201.219px;">
                        <?=$item['cor_jur']  ?> </div>

                </article>
                <?php endforeach ?>


            </div>
        </div>
    </div>
</section>
<?php } ?>