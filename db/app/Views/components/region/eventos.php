
<div class="sectExtra">
    <?php foreach ($eventos as $evento) :  ?>
    <div class="maxW">
            <div class="listEvento bg2">
                <div class="listE">
                    <article class="iEvento">
                        <h2><?=$evento['titulo'] ?></h2>
                        <h3><?=$evento['fecha'] ?> | <?=$evento['hora'] ?></h3>
                        <h4 class="minus"><?=$evento['nota'] ?></h4>
                        <h5><?=$evento['nota'] ?></h5>
                        <p><?=$evento['descripcion'] ?></p>
                         <?php   
                         if ( !empty($evento['url'])) { ?>
                        <h4><a href="<?=$evento['url'] ?>  target="_blank">Link al evento virtual</a></h4>
                        <?php } ?>

                        <?php if($evento['logo']){  ?>
                        <h5>En alianza con: </h5>
                        <img src="<?=$evento['logo']?>" alt="">
                        <?php }  ?>
                        
                    </article>
                     <?= view_cell('\App\Controllers\Web\Region::speakers', "codigoevento=".$evento['cod_ave'].' ,imagen='.$evento['imagen']  ); ?>
                </div>
            </div>
        </div>
<?php endforeach;  ?>
</div>



