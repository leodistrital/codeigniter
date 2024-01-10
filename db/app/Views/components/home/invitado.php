<?php
if (count($invitadosData) > 0) {
    $invitadosData = $invitadosData[0];
?>
<!--Invitado especial-->
<a name="invitado"></a>
<div class="gDiv sectionHome contInvEsp gAnimated">
    <div class="maxW">
        <article class="gDiv divPerson">
            <figure class="cImg" style="background-image: url(images/invitados/<?= $invitadosData['ban_inv']  ?>);">
                <img src="images/invitados/<?= $invitadosData['ban_inv']  ?>" alt="<?= $invitadosData['nom_inv']  ?>">
            </figure>
            <header class="cDesc">
                <h2 class="title3">Invitado especial</h2>
                <!-- <hr class="gLine w3 bg2"> -->
                <h3 class="title1 fs2"><?= $invitadosData['nom_inv']  ?></h3>
                <div class="desc">
                    <?= $invitadosData['des_inv']  ?>
                </div>
            </header>
            <div class="contMulti">
                <ul>
                    <?php if( !empty($invitadosData['pdf_inv']) ) { ?>
                    <li><a href="pdf/<?= $invitadosData['pdf_inv']  ?>" data-title="Discurso Kateryna Babkina"
                            class="rbtn btnMulti openPdf"><i class="ico text"></i><span>Leer discurso</span></a></li>
                    <?php } ?>
                </ul>
            </div>
        </article>
    </div>
</div>
<?php } ?>
<!--End Invitado especial-->