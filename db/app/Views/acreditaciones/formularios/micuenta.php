<div class="ingBAM" id="divocultamuestra">
    <h1><?=$_SESSION['username']?></h1>
    <p><?=traduccirlabeldb('e encuentra activo en su cuenta de BAM, desde aqui puede administrar sus datos, gestionar su acreditación y
        consultar información adicional de acuerdo a su perfil.'); ?></p>
    <form id="formAcered1" method="POST" enctype="multipart/form-data">
        <div class="sectExtraInt">

            <section id="mainForm" class="contFormIng">
                <div class="gCenter">
                    <fieldset>
                        <div class="contBtns">
                            <button type="button" class="gButton btnUSU"><a
                                    href="/panel"><?=traduccirlabeldb('Menú de usuario'); ?></a></button>
                        </div>
                        <div class="contBtns">
                            <button type="button" class="gButton btnUSU2"><a
                                    href="/registro/salir"><?=traduccirlabeldb('Cerrar sesión'); ?></a></button>
                        </div>
                    </fieldset>
                </div>
            </section>
        </div>
    </form>

</div>