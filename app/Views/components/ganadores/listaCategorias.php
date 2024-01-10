 <div class="cLeft">
     <!--Lateral menu-->
     <nav class="menuLL">
         <h2 class="title1">Ganadores por categoría</h2>
         <ul>
             <?php foreach ($categoriasData as $item) : ?>
             <li>
                 <a href="/ganadores/<?=$anionConsulta?>/<?= $item['slu_cat']  ?>"
                     class="<?php if ($item['active']) { echo 'active'; } else { echo ''; } ?>"><span><?=$item['nom_cat']  ?></span>
                 </a>
             </li>
             <?php endforeach ?>
         </ul>
     </nav>
     <!--Fin Lateral menu-->
 </div>