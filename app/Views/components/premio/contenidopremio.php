<div class="contLR">
    <div class="cLeft">
        <!--Lateral menu-->
        <nav class="menuLL">
            <h2 class="gHidden">El Premio</h2>
            <ul>
                <?php foreach ($dataInternas as $internas) : ?>
                <?php if ($internas['cod_int'] == 3) { ?>
                <li><a href="https://www.youtube.com/embed/Q4UJm1dqbX8?rel=0&autoplay=1&showinfo=0&controls=1"
                        class="openVideo" data-title="Premios a la Vida y Obra de un Periodista, 1976 - 2022">Premios
                        a la Vida y Obra de un Periodista, 1976 - 2022</a></li>
                <?php } else { ?>
                <li><a href="/elpremio/<?= $internas['slu_int'] ?>"
                        <?php if ($internaActiva['cod_int'] == $internas['cod_int']) echo "class='active'" ?>><?= $internas['tit_int'] ?></a>
                    <?php } ?>
                </li>
                <?php endforeach ?>
            </ul>
        </nav>
        <!--Fin Lateral menu-->
    </div>
    <div class="cRight">
        <!--Interna-->
        <article class="gContIntern">
            <div class="contTIntern">
                <h2 class="title1"><?= $internaActiva['tit_int']  ?> </h2>
            </div>
            <div class="contDIntern">
                <? if (!empty($internaActiva['img_int'])) { ?>
                <figure class="mainImg">
                    <img src="/images/internas/<?= $internaActiva['img_int'] ?>" alt="<?= $internaActiva['tit_int'] ?>">
                </figure>
                <? } ?>
                <div class="gText ">
                    <?= $internaActiva['con_int']  ?>
                </div>

            </div>
        </article>
        <!--End Interna-->
    </div>
</div>