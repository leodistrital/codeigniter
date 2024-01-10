<!--Edition menu-->
<div class="contEMenu">
    <nav class="eMenu">
        <h2>Edición <?=$versionConsulta?></h2>
        <button type="button" class="rbtn btnEMenu toggleDiv cw" data-id="divEMenu"><?=$anionConsulta?></button>
        <div id="divEMenu" class="divEMenu">
            <div class="menuculumnas">
                <div class="emanu-col">
                    <ul>
                        <?php foreach ($listaindividual as $item) : ?>
                        <li><a href="/<?=$item['annio_ap']?>"><?=$item['annio_ap']?></a>
                            <?php endforeach;  ?>
                    </ul>
                </div>
                <div class="emanu-col">
                    <ul>
                        <?php foreach ($listaGrupo as $item) : ?>
                        <li class="smYear">
                            <a class="btnSYear" onclick="activarmenu('ul_<?=$item['cod_ap']?>')"
                                href="#"><?=$item['annio_ap']?></a>
                            <ul onclick="activarmenu('ul_<?=$item['cod_ap']?>')" id='ul_<?=$item['cod_ap']?>'
                                class="menuhidden groupyear">
                                <?php foreach ($item['submenus'] as $submenu) : ?>
                                <li><a href="/<?=$submenu['anio_asd']?>"><?=$submenu['anio_asd']?></a>
                                </li>
                                <?php endforeach;  ?>
                            </ul>
                        </li>
                        <?php endforeach;  ?>
                    </ul>
                </div>
            </div>

        </div>
    </nav>
</div>
<!--End Edition menu-->