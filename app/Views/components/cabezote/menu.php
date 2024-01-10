 <?php foreach ($dataMenu as $item) : ?>
 <li>
     <a href="<?= $item['url_men']  ?>"> <span><?= $item['tit_men']  ?></span></a>
     <?php if ($item['cod_men'] == 1) { ?>
     <ul>
         <?php foreach ($dataInternas as $internas) : ?>
         <?php if ($internas['cod_int'] == 3) { ?>
         <li><a href="https://www.youtube.com/embed/Q4UJm1dqbX8?rel=0&autoplay=1&showinfo=0&controls=1"
                 class="openVideo" data-title="Premios a la Vida y Obra de un Periodista, 1976 - 2022">Premios
                 a la Vida y Obra de un Periodista, 1976 - 2022</a></li>
         <?php } else { ?>
         <li><a href="/elpremio/<?= $internas['slu_int'] ?>"><?= $internas['tit_int'] ?></a>
             <?php } ?>
         </li>
         <?php endforeach ?>
     </ul>
     <?php }  ?>


     <?php if ($item['cod_men'] == 7) { ?>
     <ul>
         <?php foreach ($frecuentesWebModelData as $menufaq) : ?>
         <li><a href="/faq/<?= $menufaq['slu_pre'] ?>"><?= $menufaq['tit_pre'] ?></a>
         </li>
         <?php endforeach ?>
     </ul>
     <?php }  ?>
 </li>

 <?php endforeach ?>