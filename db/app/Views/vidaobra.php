<?php 
$vidaobraData = $vidaobraData[0];
// echo $codigosim;
// echo $anionConsulta;
?>

<div class="contFancy">
    <button class="btnCF" type="button">close</button>
    <div class="contHF sTwo">
        <div class="vAlign">
            <br><br>
            <h2 class="title2">Premio a la vida y obra <br>de un periodista</h2>
            <hr class="gLine bg2">
            <h3 class="title1"><?=$vidaobraData['nom_vid']?></h3>
            <figure class="cImg"
                style="background-image: url(https://www.premiosimonbolivar.com/images/vidaobra/banner/<?=$vidaobraData['ban_vid']?>);">

            </figure>
        </div>
    </div>
    <div class="contDF sTwo">
        <div class="desc gScroll">
            <?php if ($anionConsulta <2012) { echo $vidaobraData['disc_vid']; } else { echo $vidaobraData['des_vid']; }  ?>

        </div>
    </div>
</div>
<!--End Interna vida obra-->