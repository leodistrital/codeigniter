<article class="iEventoRight">
    <img src="<?=$imagen?>" alt="">
     <?php 
     if (count($speakers) > 0) { ?>
    <h5>PANELISTAS</h5>
    <div class="infoEvento">
        <img src="<?=$speakers[0]['imagen']  ?>">
        <h5><?=$speakers[0]['nombre']  ?></h5>
        <p><?=$speakers[0]['perfil']  ?></p>
    </div>
    <?php } ?>
</article>

