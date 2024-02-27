<?php

namespace App\Controllers\API;

use App\Models\api\SectorApiModel;
use CodeIgniter\RESTful\ResourceController;

class Sector extends ResourceController
{
    protected $format = 'json';

    public function __construct()
    {
        $this->modelName = new SectorApiModel();
    }

    public function index()
    {

        $data = $this->model->buscarlistatardatos($this->request);
        return $this->respond($data, 200);
    }

    public function show($id = null)
    {
        $data = $this->model->listatardatos($id);
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

    public function parametros()
    {
        $data = $this->model->parametros();
        return $this->respond($data, 200);
    }
}
/* fecha de creacion: 02-05-2024 04:18:51 pm */