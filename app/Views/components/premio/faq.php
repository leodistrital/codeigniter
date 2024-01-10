<div class="contLR">
    <div class="cLeft">
        <!--Lateral menu-->
        <nav class="menuLL">
            <h2 class="gHidden">El Premio</h2>
            <ul>
                <?php foreach ($menupreguntas as $internas) : ?>
                    <li>
                        <a href="/faq/<?= $internas['slu_pre'] ?>" <?php if ($interactuva['cod_pre'] == $internas['cod_pre']) echo "class='active'" ?>><?= $internas['tit_pre'] ?></a>
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
                <h2 class="title1"><?= $interactuva['tit_pre']  ?> </h2>
            </div>
            <div class="contDIntern">
                <div class="gText">
                      <?php foreach ($respuestasfaq as $respuestas) : ?>
                    <h3 class="noLine"><?=$respuestas['tit_pre']?></h3>
                    <div class="contPreg " style="    font-family: 'lora' !important;
    margin-bottom: 2rem; font-size: 1.2rem;"><?=$respuestas['res_pre']?></div>
                    <hr class="gLine w2 bg2 ">
                     <?php endforeach ?>
                </div>
            </div>
        </article>
        <!--End Interna-->
    </div>
</div>