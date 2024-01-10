<?php

namespace App\Models\web;

use CodeIgniter\Model;

class Preguntas_frecuentesWebModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'preguntas_frecuentes';
	protected $primaryKey = 'cod_pre';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ["tit_pre", "res_pre", "ord_pre", "pad_pre", "pad_men", "slu_pre", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];

	// Dates
	protected $useTimestamps = true;
	protected $dateFormat = 'datetime';
	protected $createdField = 'created_at';
	protected $updatedField = 'updated_at';
	protected $deletedField = 'deleted_at';

	// Validation
	protected $validationRules = [];
	protected $validationMessages = [];
	protected $skipValidation = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks = true;
	protected $beforeInsert = [];
	protected $afterInsert = [];
	protected $beforeUpdate = [];
	protected $afterUpdate = [];
	protected $beforeFind = [];
	protected $afterFind = [];
	protected $beforeDelete = [];
	protected $afterDelete = [];

	public function listatardatos($id = 0)
	{
		$array = ["tit_pre", "res_pre", "ord_pre", "pad_pre", "pad_men", "slu_pre", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}


	public function listatarmenu()
	{
		$array = ['cod_pre' , "tit_pre", "res_pre", "ord_pre", "pad_pre", "pad_men", "slu_pre", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		$data = $this->select($array)->where('pad_pre', 0)->orderBy('ord_pre')->findAll();
		return $data;
	}

	public function listatardatosSlug($slug)
	{
		$array = ['cod_pre' ,"tit_pre"];
		$data = $this->select($array)->where('slu_pre', $slug)->find();
		$codigofaq = $data[0];

		$array = ["tit_pre", "res_pre", "ord_pre", "pad_pre", "pad_men", "slu_pre", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		$data = $this->select($array)->where('pad_pre', $codigofaq['cod_pre'])->orderBy('ord_pre')->findAll();
		return 	['respuestasfaq' => $data , 'interactuva' => $codigofaq ];
	}
}
/* fecha de creacion: 01-03-2024 03:13:51 pm */