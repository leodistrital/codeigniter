 <?php
if (count($juradosData) > 0) {
    // $periodistaAnoData = $periodistaAnoData[0];
?>
 <!--Jurado-->
 <section class="gArtOld fs2 gAnimated fadeIn">
     <div class="cDesc">
         <h2 class="title2">Jurado</h2>
         <!--  <hr class="gLine w2 bg2"> -->
         <?php foreach ($juradosData as $item) : ?>
         <h3 class="title1"><?=$item['nom_jur']  ?></h3>
         <?php endforeach ?>
     </div>
 </section>
 <!--End Jurado-->
 <?php } ?>