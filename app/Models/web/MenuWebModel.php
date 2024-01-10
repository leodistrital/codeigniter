<?php

namespace App\Models\web;

use CodeIgniter\Model;

class MenuWebModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'menu';
	protected $primaryKey           = 'cod_men';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["tit_men", "url_men", "pad_men", "act_men", "ord_men", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];

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
		$array = ['cod_men', "tit_men", "url_men", "pad_men", "act_men", "ord_men", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		if ($id == 0) {
			$data = $this->select($array)->where('act_men', 1)->orderBy('ord_men')->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}
}
/* fecha de creacion: 01-02-2024 04:01:49 pm */