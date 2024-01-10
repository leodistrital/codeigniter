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
                <li><a href="index.php?edicion=1$$-1$$-qm4nNEHfdmYaJm98wAU5wqK92yXG3C6fwm">Inicio</a></li>
                <li><a href="#">Ganadores por categoría</a></li>
                <li>Estímulos al Periodismo Joven 2020</li>
            </ul>
        </div>
        <!--End Breadcrumbs-->
        <div class="contLR">
            <?=$this->include('components/ganadores/listaCategorias'  ) ?>
            <?=$this->include('components/ganadores/listaGanadores'  ) ?>

        </div>
    </div>
</div>

<!--End Main Content-->
<?=$this->include('components/footer/foot'); ?>