<?php

namespace App\Controllers\API;

use App\Models\BannerApiModel;
use CodeIgniter\RESTful\ResourceController;

class Banner extends ResourceController
{
    protected $format    = 'json';

    public function __construct()
    {
        $this->modelName = new BannerApiModel();
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
}
/* fecha de creacion: 12-12-2023 04:03:51 pm */