<?php
echo $this->include("components/cabezote/head");
echo $this->include('components/cabezote/header');
?>
<?php
echo $this->include("components/internas/banner_interno");
?>
<section class="gMSection">
    <?php
    echo $this->include("components/seleccionados/categoria");
    if(count($jurados)>0){
        echo $this->include("components/seleccionados/comiteevaluador");
    }

    if (count($proyectos) > 0) {
        echo $this->include("components/seleccionados/filmseleccionados");
    }

    
    ?>
</section>
<?php
echo $this->include('components/footer/foot.php');
?>