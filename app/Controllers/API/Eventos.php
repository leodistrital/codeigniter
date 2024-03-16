<?php

namespace App\Controllers\API;

use App\Models\api\D_evento_personaApiModel;
use App\Models\api\EventosApiModel;
use CodeIgniter\RESTful\ResourceController;

class Eventos extends ResourceController
{
    protected $format = 'json';

    public function __construct()
    {
        $this->modelName = new EventosApiModel();
    }

    public function index()
    {
        // $data = $this->model->listatardatos();

        $data = $this->model->buscarlistatardatos($this->request);
        // echo $this->request->getVar("id");
        $data[0]['total'] = $this->totalper($this->request->getVar("id"));

        return $this->respond($data, 200);
    }

    public function show($id = null)
    {
        $data = $this->model->listatardatos($id);
        return $this->respond(array('data' => $data), 200);
    }


    public function totalper($id = null)
    {
        $detalle = new D_evento_personaApiModel();
        $data = $detalle->where('cod_eve_devp', $id)->countAllResults();
        // echo $detalle->getLastQuery();
        return $data;
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

    public function parametros()
    {
        $data = $this->model->parametros();
        return $this->respond($data, 200);
    }

}
/* fecha de creacion: 02-05-2024 07:29:43 pm */