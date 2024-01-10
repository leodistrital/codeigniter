<?php
if (count($vidaobra) > 0) {
    // $vidaobra = $vidaobra[0];
?>
<!--Vida obra-->
<?php foreach ($vidaobra as $item) : ?>
<article class="gArtOld gAnimated fadeIn">
    <figure class="cImg">
        <img src="./images/vidaobra/home/<?= $item['img_vid']  ?>" alt="<?=$item['nom_vid']?>">
    </figure>
    <div class="cDesc">
        <h2 class="title2">Premio a la vida y obra <br>de un periodista</h2>
        <!-- <hr class="gLine w2 bg2"> -->
        <h3 class="title1 negrita2022"><?=$item['nom_vid']?></h3>
        <a href="/vidaobra/<?= $codigosim  ?>/<?=$anionConsulta?> " class="rbtn btnMulti openFancy cboxElement"><i
                class="ico text"></i><span class="ajuste-icon">leer
                discurso <?=$anionConsulta  ?></span></a>
    </div>
</article>
<?php endforeach ?>
<!--End Vida obra-->
<?php } ?>