<div class="cRight">
    <!--Interna-->
    <article class="gContIntern">
        <div class="contTIntern">
            <h2 class="title1">Galeria del Premio</h2>
            <!--<hr class="gLine bg2 w2">-->
        </div>
        <div class="contDIntern">
            <!--Galeria-->
            <div class="iGallery">
                <?php $g = 1; ?>
                <?php foreach ($ediciones as $edicion): ?>
                    <div class="iGal">
                        <figure class="cImg">
                            <a href="/images/galeria/<?= $edicion['dir_ima'] ?>"
                                style="background-image: url(/images/galeria/<?= $edicion['dir_ima'] ?>);"
                                data-title="<?= $edicion['ano_sim'] ?>" data-rel="gal<?= $edicion['ano_sim'] ?>"
                                class="openImage cboxElement">
                                <img src="/images/galeria/<?= $edicion['dir_ima'] ?>" alt="<?= $edicion['ano_sim'] ?>">
                            </a>
                        </figure>
                        <span class="tit">
                            <?= $edicion['ano_sim'] ?>
                        </span>
                        <div style="display: none;">
                            <?php foreach ($edicion['galeria'] as $galeria): ?>
                                <a href="/images/galeria/<?= $galeria['dir_ima'] ?>" class="openImage cboxElement"
                                    data-title="<?= $edicion['ano_sim'] ?>" data-rel="gal<?= $edicion['ano_sim'] ?>">
                                    <?= $edicion['ano_sim'] ?>
                                </a>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <?php $g++; ?>
                <?php endforeach ?>
            </div><!--End Galeria-->
        </div>
    </article><!--End Interna-->
</div>