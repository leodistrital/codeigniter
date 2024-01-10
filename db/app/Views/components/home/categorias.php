<?php
if (count($categoriasData) > 0) {
?>
<!--Ganadores-->
<section class="gDiv sectionHome contWinners gAnimated">
    <div class="maxW">
        <h2 class="title3 ganhome ajuste-lavanda">Ganadores</h2>
        <h2 class="title3 traFran ajuste-white subtituloganadoreshome ">Premios al Trabajo Periodístico</h2>
        <p class="introSect">Elija la categoría para conocer a los ganadores de cada una en audio, video y
            texto</p>
        <div class="listCWinner    listCWinner-ajuste">
            <?php foreach ($categoriasData as $colCategoria) : ?>
            <ul>
                <?php foreach ($colCategoria as $item) : ?>
                <li><a
                        href="/ganadores/<?=$anionConsulta?>/<?= $item['slu_cat']  ?>"><span><?= $item['nom_cat']  ?></span></a>
                </li>
                <?php endforeach ?>
            </ul>
            <?php endforeach ?>
        </div>
    </div>
</section>
<?php } ?>
<!--End Ganadores-->