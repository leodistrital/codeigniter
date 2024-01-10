<!--Edition PSB-->
<div class="gDiv contEdition ">
    <div class="maxW">
        <div class="editionPSB st2" style="padding-left: 15px;">
            <h2 class="tituloedicion2022">
                <h2>Edición <?=$versionConsulta?> </h2>
                <div class="divbotonhome">
                    <dv>
                        <?php if(!empty( $pdfdiscursojurado)) { ?>
                        <a href="https://premiosimonbolivar.com/pdf/<?=$pdfdiscursojurado  ?>"
                            class="btnBigIco bg1 icoA openPdf">
                            <span class="linkactadiscursohime">LEER DISCURSO DEL JURADO</span>
                        </a>
                        <?php } ?>
                    </dv>
                    <dv>
                        <?php if(!empty( $pdfactajurado)) { ?>
                        <a href="https://premiosimonbolivar.com/pdf/<?= $pdfactajurado ?>"
                            class="btnBigIco bg3 icoA openPdf">
                            <span class="linkactadiscursohime">ACTA DEL JURADO</span>
                        </a>
                        <?php } ?>
                    </dv>
                </div>
                <div class="divbotonhome">
                    <dv>
                        <?php if(!empty( $videodiscursojurado)) { ?>
                        <a href="https://www.youtube.com/embed/<?= $videodiscursojurado ?>?rel=0&amp;autoplay=1&amp;showinfo=0&amp;controls=1"
                            class="btnBigIco bg1 icoA icoVideoA openVideo fVideos cboxElement">
                            <span class="linkactadiscursohime">VER DISCURSO DEL JURADO</span>
                        </a>
                        <?php } ?>
                    </dv>
                </div>
        </div>
    </div>
</div>
<!--End Edition PSB-->