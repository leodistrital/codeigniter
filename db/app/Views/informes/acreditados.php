<table id="tblData">
    <tr>
        <?php 
            foreach ($cabeceras as $cabecera) :
        ?>
        <th><?=$cabecera?></th>
        <?php endforeach ?>
    </tr>

    <?php foreach ($registros as $registro) : 
            
            // print_r($registro);
            ?>
    <tr>
        <td><?=$registro['fecha']?></td>
        <td><?=$registro['mai_reg']?></td>
        <td><?=utf8_decode($registro['nombre'])?></td>
        <td><?=$registro['apellido']?></td>
        <td><?=$registro['tipoacreditacion']?></td>
        <td><?=$registro['estadoacreditacion']?></td>
        <td><?=$registro['participaregionesparametro']?></td>
        <td><?=$registro['tarifaasignada']?></td>
        <td><?=$registro['nota']?></td>

        <td><?=$registro['numdocumento']?></td>
        <td><?=$registro['paisresidencia']?></td>
        <td><?=$registro['ciudadresidencia']?></td>
        <td><?=$registro['dirresidencia']?></td>
        <td><?=$registro['nacionalidad']?></td>
        <td><?=$registro['localidadparametro']?></td>
        <td><?=$registro['estratoparametro']?></td>
        <td><?=$registro['sexoparametro']?></td>
        <td><?=$registro['identidadgenparametro']?></td>
        <td><?=$registro['nacimientofecha']?></td>
        <td><?=$registro['etniaparametro']?></td>

        <td><?=$registro['indicativo']?></td>
        <td><?=$registro['telefono']?></td>
        <td><?=$registro['mailcontacto']?></td>
        <td><?=$registro['telefonopublicacion']?></td>
        <td><?=$registro['correopublicacion']?></td>
        <td><?=$registro['sectoractividadparametro']?></td>
        <td>***<?=$registro['interesesparametro']?></td>
        <td><?=$registro['otrointeres']?></td>
        <td><?=$registro['territorioparametros']?></td>
        <td><?=$registro['mencionepaises']?></td>

        <td><?=$registro['nombreempresa']?></td>
        <td><?=$registro['nit']?></td>
        <td><?=$registro['cargoempresa']?></td>
        <td><?=$registro['direccionempresa']?></td>
        <td><?=$registro['telefonoempresa']?></td>
        <td><?=$registro['correoempresa']?></td>
        <td><?=$registro['paisempresa']?></td>
        <td><?=$registro['ciudadempresa']?></td>
        <td><?=$registro['webempresa']?></td>
        <td><?=$registro['empresaactividadesparametros']?></td>
        <td><?=$registro['otraactividad']?></td>

        <td><?=$registro['fotoacreditacion']?></td>
        <td><?=$registro['certificadovinculo']?></td>
        <td><?=$registro['certificadoexistencia']?></td>
        <td><?=$registro['actividadempresatexto']?></td>
    </tr>
    <?php endforeach ?>


</table>

<button onclick="exportTableToExcel('tblData')">Export Table Data To Excel File</button>

<script>
function exportTableToExcel(tableID, filename = '') {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    // Specify file name
    filename = filename ? filename + '.xls' : 'excel_data.xls';

    // Create download link element
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if (navigator.msSaveOrOpenBlob) {
        var blob = new Blob(['ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob(blob, filename);
    } else {
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
    }
}
</script>