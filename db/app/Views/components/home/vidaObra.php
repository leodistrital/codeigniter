<?php
if (count($vidaobra) > 0) {
    $vidaobra = $vidaobra[0];
?>

<!--Vida obra-->
<div class="gDiv contVidObr" style="padding-top: 6.5rem;">
    <div class="maxW">
        <article class="vidObr">
            <div style="padding-left: 15px;  height: 80%;  ">
                <h2 class="title3">Premio a la Vida y Obra de un Periodista </h2>
                <!-- <hr class="gLine w3 bg2"> -->
                <h3 class="title1"><?= $vidaobra['nom_vid']  ?></h3>
                <figure class="cImg">
                    <img src="images/vidaobra/banner/<?= $vidaobra['img_princ_vid']  ?>"
                        alt="<?= $vidaobra['nom_vid']  ?>">
                </figure>
                <div class="contMulti" style="margin-top: 5rem;">
                    <ul>
                        <li>
                            <a href="/vidaobra/<?= $codigosim  ?>/<?=$anionConsulta?> "
                                class="rbtn btnMulti openFancy cboxElement"><i class="ico icocartaA2022"></i><span>Acta
                                    del Jurado</span></a>
                        </li>
                        <li><a href="https://www.youtube.com/embed/<?= $vidaobra['vid_vid']  ?>?rel=0&autoplay=1&showinfo=0&controls=1"
                                data-title="Premio a la vida y obra de un periodista" class="rbtn btnMulti openVideo"><i
                                    class="ico video icoVideoA2022"></i><span>SOBRE
                                    PREMIO VIDA Y
                                    OBRA</span></a></li>
                        <li><a href="https://premiosimonbolivar.com/pdf/<?= $vidaobra['linkdis_vid']  ?>"
                                data-title="Discurso <?= $vidaobra['nom_vid']  ?>" class="rbtn btnMulti openPdf"><i
                                    class="ico icocartaA2022"></i><span>LEER
                                    PALABRAS PREMIO VIDA Y
                                    OBRA</span></a></li>
                        <li><a href="https://www.youtube.com/embed/<?= $vidaobra['vid_dis_vid']  ?>?rel=0&autoplay=1&showinfo=0&controls=1"
                                data-title="Discurso Cecilia Orozco Tasc&#243;n" class="rbtn btnMulti openVideo"><i
                                    class="ico video icoVideoA2022"></i><span>VER
                                    PALABRAS PREMIO VIDA Y
                                    OBRA</span></a></li>

                    </ul>
                </div>
            </div>
        </article>
    </div>
</div>
<!--End Vida obra-->
<?php } ?>