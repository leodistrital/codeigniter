<div class="gCol col3">
    <div class="contBtns">
        <button type="submit" class="gButton btnGuia <?=$tipoguia == 'participantes' ? 'activo'  : '' ?> "><a
                href="/panel/guia/participantes"><?=traduccirlabeldb('Participantes'); ?></a></button>
    </div>
    <div class="contBtns">
        <button type="submit" class="gButton btnGuia <?=$tipoguia == 'empresas' ? 'activo'  : '' ?>"><a
                href="/panel/guia/empresas"><?=traduccirlabeldb('Empresas'); ?></a></button>
    </div>
    <div class="contBtns">
        <button type="submit" class="gButton btnGuia <?=$tipoguia == 'favoritos' ? 'activo'  : '' ?>"><a
                href="/panel/guia/favoritos"><?=traduccirlabeldb('Favoritos'); ?></a></button>
    </div>
</div>