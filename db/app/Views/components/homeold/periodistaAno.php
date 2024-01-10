 <?php
if (count($periodistaAnoData) > 0) {
    $periodistaAnoData = $periodistaAnoData[0];
?>
 <!--Periodista año-->
 <article class="gArtOld gAnimated fadeIn">
     <div class="cDesc">
         <h2 class="title2 ">Premio al Periodista del Año</h2>
         <!-- <hr class="gLine w2 bg2"> -->
         <h3 class="title1 negrita2022"><?=$periodistaAnoData['nom_per']  ?></h3>
     </div>
 </article>
 <!--End Periodista año-->
 <?php } ?>