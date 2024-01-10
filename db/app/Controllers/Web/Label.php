<?php

namespace App\Controllers\web;

use App\Models\LabelModel;
use CodeIgniter\RESTful\ResourceController;

class Label extends ResourceController
{
    protected $format    = 'json';

    public function __construct()
    {
        $this->modelName = new LabelModel();
    }

    public function index($texto='')
    {
        // $data = $this->model->listatardatos();
        // return $this->respond($data, 200);
        // $data = $this->model->
        return $texto;
    }



    


}
/* fecha de creacion: 09-20-2023 05:17:06 pm */