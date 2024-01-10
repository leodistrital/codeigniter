<div class="cRight">
    <?php foreach ($categoriasData as $categoria) : ?>
    <section class="contWinOld gAnimated fadeIn">
        <h2 class="title1"><?=$categoria['nom_cat']  ?></h2>
        <!-- <hr class="gLine w2 bg2"> -->
        <div class="listWOld">
            <?php foreach ($categoria['ganadores'] as $item) : ?>
            <article class="itemWOld">
                <h3 class="title1 s1"><?=$item['nom_med']?></h3>
                <h4 class="title1 s2"><?=$item['tra_gan']?></h4>
                <div class="title2 s1"><?=$item['nom_gan']?></div>
                <p class="title2 s2"><?=$item['med_gan']?></p>
            </article>
            <?php endforeach ?>
        </div>
    </section>
    <?php endforeach ?>
</div>