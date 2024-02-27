<?php

namespace App\Controllers\API;

use App\Models\api\D_empresa_personaApiModel;
use App\Models\api\D_evento_personaApiModel;
use App\Models\api\D_segmento_personaApiModel;
use App\Models\api\PersonasApiModel;
use CodeIgniter\RESTful\ResourceController;

class Personas extends ResourceController
{
    protected $format = 'json';

    public function __construct()
    {
        $this->modelName = new PersonasApiModel();
    }

    public function index()
    {

        // $data = $this->model->listatardatos();
        $data = $this->model->buscarlistatardatos($this->request);
        return $this->respond($data, 200);
    }

    public function show($id = null)
    {
        $data = $this->model->listatardatos($id);
        $detallSegmentos = new D_segmento_personaApiModel();
        $data['segementos'] = $detallSegmentos->segementosPersona($id);

        $detallEventos = new D_evento_personaApiModel();
        $data['eventos'] = $detallEventos->eventosPersona($id);


        $detallEventos = new D_empresa_personaApiModel();
        $data['empresas'] = $detallEventos->empresasPersona($id);

        return $this->respond(array('data' => $data), 200);
    }

    public function create()
    {
        $resp = $this->model->guardar($this->request);
        $info = $this->model->listatardatos($resp);
        $data['resp'] = [
            'codigo' => $resp,
            'status' => 'Ok',
            'info' => $info
        ];
        return $this->respond($data, 200);
    }

    public function update($id = null)
    {
        $resp = $this->model->edicion($id, $this->request);
        $data['resp'] = [
            'codigo' => $resp,
            'status' => 'Ok'
        ];
        return $this->respond($data, 200);
    }

    public function delete($id = null)
    {
        $resp = $this->model->borrar($id);
        $data['resp'] = [
            'codigo' => $resp,
            'status' => 'Ok'
        ];
        return $this->respond($data, 200);
    }

    public function reporte()
    {
        // echo "llego al reporte";
        $data = $this->model->reporte($this->request);
        $data['resp'] = [
            'data' => $data,
            'status' => 'Ok'
        ];
        return $this->respond($data, 200);
    }


    public function asistentesdireccion($id = 0)
    {
        // echo "llego a las direcciones" . $id;
        $data = $this->model->direcciones($id);
        // $data['resp'] = [
        //     'data' => $data,
        //     'status' => 'Ok'
        // ];
        return $this->respond($data, 200);
    }





    // public function buscarSegmentos($id = 0)
    // {
    //     $detallSegmentos= new D_segmento_personaApiModel();
    //     $detallSegmentos->where('cod_per_dse', $id);
    //     return $this->respond(array('data' => $data), 200);

    // }
}
/* fecha de creacion: 02-05-2024 04:25:11 pm */