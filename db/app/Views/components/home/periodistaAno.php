<?php
if (count($periodistaAnoData) > 0) {
    $periodistaAnoData = $periodistaAnoData[0];
?>
<!--Periodista año-->
<div class="gDiv sectionHome bgGray contPerAnio gAnimated">
    <div class="maxW">
        <article class="gDiv divPerson">
            <figure class="cImg">
                <img src="images/periodista/banner/<?=$periodistaAnoData['ban_per']  ?>"
                    alt="<?=$periodistaAnoData['nom_per']  ?>">
            </figure>
            <header class="cDesc">
                <h2 class="title3">Premio al Periodista del Año</h2>
                <h3 class="title1 fs2"><?=$periodistaAnoData['nom_per']  ?></h3>
                <div class="desc">
                    <?=$periodistaAnoData['des_per']  ?>
                </div>
            </header>
            <div class="contMulti">
                <ul>
                    <li><a href="https://www.youtube.com/embed/<?=$periodistaAnoData['vid_per']  ?>?rel=0&autoplay=1&showinfo=0&controls=1"
                            data-title="Premio al Periodista del Año" class="rbtn btnMulti openVideo"><i
                                class="ico video"></i><span>Sobre el ganador</span></a></li>
                </ul>
            </div>
        </article>
    </div>
</div>
<!--End Periodista año-->
<?php } ?>