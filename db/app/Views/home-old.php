<?php
echo $this->include("components/cabezote/head"); // se ejecuta celda
echo $this->include('components/cabezote/header');  // se ejecuta celda
echo view_cell('\App\Libraries\ViewSitio::getListaEdiciones' , ['versionConsulta' =>$versionConsulta ,'anionConsulta'
=>$anionConsulta]) ;


?>
<section class="mainContent">
    <!--Edition PSB-->
    <div class="gDiv contEdition">
        <div class="maxW">
            <div class="editionPSB">
                <h2 class="edicionold">Edición <?=$versionConsulta?></h2>
                <p class="subtituloold">Ganadores</p>
            </div>
        </div>
    </div>
    <!--End Edition PSB-->
    <div class="maxW contHomeOld">
        <div class="cLeft">
            <?=$this->include('components/homeold/vidaObra') ?>
            <?=$this->include('components/homeold/periodistaAno') ?>
            <?=$this->include('components/homeold/jurados') ?>
            <?=$this->include('components/homeold/invitado') ?>
        </div>
        <?=$this->include('components/homeold/categorias') ?>
    </div>
</section>
<?=$this->include('components/footer/foot'); ?>