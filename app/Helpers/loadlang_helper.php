<?php

use App\Models\api\AuditoriaApiModel;
use App\Models\api\UsuarioApiModel;

// use App\Models\LabelModel;


function userlogigado($request)
{
    $usertoken = $request->getHeader("Usertoken");
    $usertoken = str_replace("Usertoken: ", "", $usertoken);
    $user = new UsuarioApiModel();
    $data = $user->where('token_usu', $usertoken)->first();
    // echo $user->getlastquery();
    return $data['cod_usu'];
}


function auditoria($usuario, $modelo, $sql, $tipotransaccion, $request): void
{
    $auditoria = new AuditoriaApiModel();
    $cabeceras = headerCliente($request);
    $data = [
        'cod_usu_aud' => $usuario,
        'nom_tab_aud' => $modelo,
        'transaccion' => $tipotransaccion,
        'sql_aud' => $sql,
        'cliente_aud' => $cabeceras,

    ];
    print_r($data);
    // $id = $auditoria->insert($data);
    // $auditoria = new AuditoriaApiModel ();
    // $data = [
    //     'cod_usu' => $usuario,
    //     'nom_mod' => $modelo,
    //     'sql_aud' => $sql,
    //     'tip_tra' => $tipotransaccion
    // ];
    // $auditoria->insert($data);
}


function headerCliente($request)
{
    $cabecera = '';
    // Obtener la dirección IP del cliente
    $ip = $request->getIPAddress();

    // Obtener el agente de usuario del navegador del cliente
    $userAgent = $request->getUserAgent();

    // Obtener información adicional del navegador del cliente
    $browser = $request->getUserAgent()->getBrowser();
    $platform = $request->getUserAgent()->getPlatform();

    // Imprimir los datos obtenidos
    $cabecera .= "Dirección IP del cliente: $ip <br>";
    $cabecera .= "Agente de usuario del navegador: $userAgent <br>";
    $cabecera .= "Navegador: $browser <br>";
    $cabecera .= "Plataforma: $platform <br>";
    return $cabecera;
}


// function traduccirlabeldb($texto)
// {
//     $campos = ['tex_lab_esp as label'];
//     if (get_cookie('bamidioma') == "ENG") {
//         $campos = ['tex_lab_ing as label'];
//     }
//     $labels = new LabelModel();
//     $label = $labels->select($campos)->where('nom_lab', $texto)->limit(1)->find();
//     if (count($label) > 0) {
//         // echo "si hay algo";
//         return $label[0]['label'];
//     } else {
//         agregarLable($texto);
//         return $texto;
//     }
// }


// function agregarLable($texto)
// {
//     $labels = new LabelModel();
//     $data = [
//         'nom_lab' => $texto
//         ,
//         'tex_lab_ing' => $texto
//         ,
//         'tex_lab_esp' => $texto
//     ];

//     $id = $labels->insert($data);
// }