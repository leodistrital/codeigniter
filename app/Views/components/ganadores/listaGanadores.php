 <div class="cRight">
     <!--Ganadores-->
     <section class="gContIntern">
         <div class="contTIntern">
             <h2 class="title1 titulocategoria2022"><?=$catActiva['nom_cat']  ?> </h2>
         </div>
         <div class="contWinCate">
             <?php foreach ($hanadores_historicoData as $item) : ?>
             <article class="itemWin ">
                 <div class="cTitle">
                     <h3 class="title1 categoriaganadores2022"><?=$item['nom_med']  ?></h3>
                     <!--  <hr class="gLine w2 bg2"> -->
                 </div>
                 <figure class="cImg" style="background-image: url(/images/ganadores/<?=$item['img_gan']  ?>);">
                     <img src="/images/ganadores/<?=$item['img_gan']  ?>" alt="<?=$item['tra_gan']  ?>">
                 </figure>
                 <div class="cDesc">
                     <h4 class="title1"><?=$item['tra_gan']  ?></h4>
                     <div class="title2"><?=$item['nom_gan']  ?></div>
                     <!--  <hr class="gLine bg2"> -->
                     <p class="title2 s2"><?=$item['med_gan']  ?></p>
                     <div class="contMulti">
                         <ul>
                             <?php if( !empty($item['url_gan'])) {?>
                             <li>
                                 <a href="<?=$item['url_gan']  ?>" target="_blank" class="rbtn btnMulti">
                                     <i class="ico work"></i>
                                     <span>Trabajo ganador
                                         <?php if( !empty($item['url_gan']) and  !empty($item['url1_gan'])) {?>
                                         <em class="txtLora">(Entrega uno)</em></span>
                                     <?php } ?>
                                 </a>
                             </li>
                             <?php } ?>
                             <?php if( !empty($item['url1_gan'])) {?>
                             <li>
                                 <a href="<?=$item['url1_gan']  ?>" target="_blank" class="rbtn btnMulti">
                                     <i class="ico work"></i>
                                     <span>Trabajo ganador <em class="txtLora">(Entrega dos)</em></span>
                                 </a>
                             </li>
                             <?php } ?>
                             <?php if( !empty($item['url2_gan'])) {?>
                             <li>
                                 <a href="<?=$item['url2_gan']  ?>" target="_blank" class="rbtn btnMulti">
                                     <i class="ico work"></i>
                                     <span>Trabajo ganado <em class="txtLora">(Entrega tres)</em></span>
                                 </a>
                             </li>
                             <?php } ?>
                             <?php if( !empty($item['vid_gan'])) {?>
                             <li><a href="https://www.youtube.com/embed/<?=$item['vid_gan']?>?rel=0&amp;autoplay=1&amp;showinfo=0&amp;controls=1"
                                     data-title="<?=$item['tra_gan']  ?>" class="rbtn btnMulti openVideo cboxElement"><i
                                         class="ico video"></i><span>Sobre el
                                         trabajo ganador</span></a></li>
                             <?php } ?>
                         </ul>
                     </div>
                     <div class="desc">
                         <p><?=$item['des_gan']  ?></p>
                     </div>
                 </div>
             </article>
             <?php endforeach ?>
         </div>
     </section>
     <!--End Ganadores-->
 </div>