<!--Page header-->
<header class="pageHeader">
    <div class="contLogo">
        <h1 class="logoPage">
            <a href="/">
                <span class="gHidden">Premio Nacional de Periodismo Simón Bolívar</span>
                <img src="/images/site/logo-psb.svg" alt="Premio Nacional de Periodismo Simón Bolívar">
            </a>
        </h1>
        <button type="button" id="btnMMenu" class="rbtn btnMMenu">
            <span class="box"><span class="inner"></span></span>
        </button>
    </div>
    <!--Content Main menu-->
    <div class="contMMenu">
        <div class="dCenter">
            <!--Main menu-->
            <?php
            echo $this->include("components/cabezote/page-menu"); ?>
            <!--End Main menu-->
            <div class="headerSNet">
                <?= view_cell('\App\Libraries\ViewSitio::getRedes') ?>
            </div>
        </div>
    </div>
    <!--End Content Main menu-->
</header>
<!--End Page header-->