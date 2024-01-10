<?php
// var_dump($discursosData);
if (count($discursosData) > 0) {
    // $periodistaAnoData = $periodistaAnoData[0];
?>

<!--Discursos-->
<section id="seccionDiscursos" class="gDiv sectionHome bgGray contDisc gAnimated">
    <div class="maxW">
        <h2 id="discursosTit" class="title1">Discursos</h2>

        <!--p class="introSect">Ceremonia de premiación, 3 de noviembre de 2023</p-->
        <div class="contGSlider">
            <div class="gSlider sliderDisc">
                <?php foreach ($discursosData as $item) : ?>
                <article class="gSlide">
                    <div>
                        <figure class="cImg">
                            <a href="https://www.youtube.com/embed/<?= $item['vid_dis']  ?>?rel=0&autoplay=1&showinfo=0&controls=1"
                                data-title="Miguel Cort&#233;s Kotal" class="openVideo">
                                <img src="/images/discursos/<?= $item['img_dis']  ?>" alt="<?= $item['nom_dis']  ?>">
                            </a>
                        </figure>
                        <h2 class="title1"><?= $item['nom_dis']  ?></h2>

                        <p class="title2 ajustediscursohome"><?= $item['per_dis']  ?></p>
                        <p class="title2"></p>
                        <div class="contMulti">
                            <ul>
                                <?php if(!empty($item['vid_dis'])) {  ?>
                                <li><a href="https://www.youtube.com/embed/<?= $item['vid_dis']  ?>?rel=0&autoplay=1&showinfo=0&controls=1"
                                        data-title="<?= $item['nom_dis']  ?>" class="rbtn btnMulti openVideo"><i
                                            class="ico video"></i></a></li>
                                <?php } ?>
                                <?php if(!empty($item['pdf_dis'])) {  ?>
                                <li><a href="pdf/<?= $item['pdf_dis']  ?>"
                                        data-title="Discurso <?= $item['nom_dis']  ?>"
                                        class="rbtn btnMulti openPdf cboxElement" tabindex="0"><i
                                            class="ico text"></i></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </article>
                <?php endforeach ?>

            </div>
        </div>
    </div>
</section>
<!--End Discursos-->
<?php } ?>