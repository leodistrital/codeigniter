<?php
echo $this->include("components/cabezote/head"); 
echo $this->include('components/cabezote/header');  
echo view_cell('\App\Libraries\ViewSitio::getListaEdiciones' , ['versionConsulta' =>$versionConsulta ,'anionConsulta'
=>$anionConsulta]) ;
?>
<!--Main Content-->
<div class="mainContent">
    <div class="maxW padIntern">
        <!--Breadcrumbs-->
        <div class="breadcrumbs">
            <ul>
                <li>Videos de los trabajos premiado</li>
            </ul>
        </div>
        <!--End Breadcrumbs-->
        <!--List videos-->
        <section class="gContIntern">
            <div class="contTIntern">
                <h2 class="title1">Videos de los trabajos premiados</h2>
                <hr class="gLine bg2 w2">
            </div>
            <div class="listGMulti">
                <?php foreach ($videos as $item) : ?>
                <article class="itemMulti iVideo">
                    <a href="https://www.youtube.com/embed/<?=$item['vid_gan']  ?>?rel=0&autoplay=1&showinfo=0&controls=1"
                        class="openVideo" data-title="Entrevista">
                        <figure class="cImg"
                            style="background-image: url(http://img.youtube.com/vi/<?=$item['vid_gan']  ?>/0.jpg);">
                            <img src="http://img.youtube.com/vi/<?=$item['vid_gan']  ?>/0.jpg"
                                alt="<?=$item['nom_gan']  ?>">
                        </figure>
                        <header class="cDesc">
                            <div class="vAlign">
                                <span class="icoVideo"></span>
                                <h2 class="title2 categoriavideohome"><strong><?=$item['nom_cat']  ?></strong></h2>
                                <h2 class="title2 mediovideohome"><strong><?=$item['nom_med']  ?></strong></h2>
                                <div class="dHide">
                                    <h3 class="title2 nombrevideo"><?=$item['tra_gan']  ?></h3>
                                    <h3 class="title1 desvideohome"><?=$item['nom_med']  ?></h3>
                                </div>
                            </div>
                        </header>
                    </a>
                </article>
                <?php endforeach ?>



















            </div>
        </section>
        <!--End List videos-->

    </div>
</div>
<!--End Main Content-->
<?=$this->include('components/footer/foot'); ?>