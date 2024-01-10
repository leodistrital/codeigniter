<?php 
$juradosData = $juradosData[0];
?>
<!--Interna jurado-->

<div class="contFancy">
    <button class="btnCF" type="button">close</button>
    <div class="contHF sTwo">
        <div class="vAlign">
            <h2 class="title2">Jurado</h2>
            <!--<hr class="gLine bg2">-->
            <h3 class="title1"><?=$juradosData['nom_jur']  ?></h3>

            <figure class="cImg" style="background-image: url(/images/jurados/popup/<?=$juradosData['img_jur']  ?>);">
                <img src="/images/jurados/popup/<?=$juradosData['img_jur']  ?>" alt="<?=$juradosData['nom_jur']  ?>">
            </figure>
        </div>
    </div>
    <div class="contDF sTwo">
        <div class="desc  gScroll" style="font-size: 1rem;">
            <?=$juradosData['des_jur']  ?>
        </div>
    </div>
</div>
<!--End Interna jurado-->