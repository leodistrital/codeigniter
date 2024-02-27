<?php

namespace App\Controllers\API;

use App\Models\api\EmpresasApiModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;

class Empresas extends ResourceController
{
    protected $format = 'json';

    public function __construct()
    {
        $this->modelName = new EmpresasApiModel();
    }

    public function index()
    {
        // $this->leo($this->request);
        $data = $this->model->buscarlistatardatos($this->request);
        return $this->respond($data, 200);
    }
    // public function leo(RequestInterface $request)
    // {

    //     echo $header = $request->getHeaderLine("Userapp");
    //     return $this->respond($header, 200);

    //     // exit;

    // }

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
/* fecha de creacion: 01-26-2024 02:03:19 pm */