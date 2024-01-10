<?php
echo $this->include("components/cabezote/head");
echo $this->include('components/cabezote/header');
echo view_cell('\App\Libraries\ViewSitio::getListaEdiciones', ['versionConsulta' => $versionConsulta, 'anionConsulta'
=> $anionConsulta]);
?>
<!--Main Content-->
<section class="mainContent">
    <div class="gAnimated">
        <?= $this->include('components/home/botonesEdicion') ?>
        <?= $this->include('components/home/vidaObra') ?>
    </div>
    <?= $this->include('components/home/periodistaAno') ?>
    <?= $this->include('components/home/categorias') ?>
    <?= $this->include('components/home/jurados') ?>
    <?= $this->include('components/home/invitado') ?>
    <?= $this->include('components/home/discursos') ?>
    <?= $this->include('components/home/videos') ?>
</section>
<!--End Main Content-->
<?= $this->include('components/footer/foot'); ?>