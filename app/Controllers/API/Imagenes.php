<?php

namespace App\Controllers\API;

use App\Models\api\ImagenesApiModel;
use CodeIgniter\RESTful\ResourceController;

class Imagenes extends ResourceController
{
    protected $format = 'json';

    public function __construct()
    {
        $this->modelName = new ImagenesApiModel();
    }

    public function index()
    {

        $data = $this->model->listatardatos();
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
        return $this->respond($resp, 200);
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

    public function parametros($id)
    {
        // $tipoAliados = new MenusApiModel();
        $data = $this->model->parametros($id);
        return $this->respond($data, 200);
    }
}
/* fecha de creacion: 01-23-2024 11:16:27 am */