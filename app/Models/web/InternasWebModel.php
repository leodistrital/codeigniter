<?php

namespace App\Models\web;

use CodeIgniter\Model;

class InternasWebModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'internas';
	protected $primaryKey           = 'cod_int';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["tit_int", "stit_int", "cod_gal_int", "doc_int", "con_int", "con2_int", "cod_tip_int", "cla_int", "cod_men_int", "ord_int", "img_int", "slu_int", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function listatardatos($id = 0)
	{
		$array = ['cod_int', "tit_int", "stit_int", "cod_gal_int", "doc_int", "con_int", "con2_int", "cod_tip_int", "cla_int", "cod_men_int", "ord_int", "img_int", "slu_int", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		if ($id == 0) {
			$data = $this->select($array)->orderBy('ord_int')->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}


	public function listatardatosSlug($slug)
	{
		$array = ['cod_int', "tit_int", "stit_int", "cod_gal_int", "doc_int", "con_int", "con2_int", "cod_tip_int", "cla_int", "cod_men_int", "ord_int", "img_int", "slu_int", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];

		$data = $this->select($array)->where('slu_int', $slug)->find();

		return $data;
	}
}
/* fecha de creacion: 01-02-2024 06:23:42 pm */