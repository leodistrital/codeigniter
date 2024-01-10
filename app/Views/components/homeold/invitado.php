<?php
// var_dump($invitadosData);
if (count($invitadosData) > 0) {
    $invitadosData = $invitadosData[0];
?>
<!--Invitado especial-->
<article class="gArtOld fs2 gAnimated fadeIn">
    <div class="cDesc">
        <h2 class="title2">Invitado especial</h2>
        <h3 class="title1"><?=$invitadosData['nom_inv']  ?></h3>
    </div>
</article>
<!--End Invitado especial-->
<?php } ?>