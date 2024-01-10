<?php
echo $this->include("components/cabezote/head");
echo $this->include('components/cabezote/header');
echo view_cell('\App\Libraries\ViewSitio::getListaEdiciones', ['versionConsulta' => $versionConsulta, 'anionConsulta'
=> $anionConsulta]);
?>
<!--Main Content-->
<div class="mainContent">
    <div class="maxW padIntern">
        <!--Breadcrumbs-->
        <div class="breadcrumbs">
            <ul>
                <li><a href="index.php?edicion=1$$-1$$-qm4nNEHfZmYaJm98wAU5wqK92yXG3C6fwm">Inicio</a></li>
                <li><a href="#">El Premio</a></li>
                <li>FAQ</li>
            </ul>
        </div>
        <!--End Breadcrumbs-->
        <?php if ($interna == 1) { ?>
            <?= $this->include('components/premio/contenidopremio'); ?>
        <?php } ?>
        <?php if ($interna == 2) { ?>
            <?= $this->include('components/premio/faq'); ?>
        <?php } ?>
         <?php if ($interna == 3) { ?>
            <?= $this->include('components/premio/contacto'); ?>
        <?php } ?>
         <?php if ($interna == 4) { ?>
            <?= $this->include('components/premio/galeria'); ?>
        <?php } ?>
    </div>
</div>
<!--End Main Content-->
<?= $this->include('components/footer/foot'); ?>