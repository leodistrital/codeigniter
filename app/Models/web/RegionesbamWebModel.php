<?php

namespace App\Models\web;

use CodeIgniter\Model;

class RegionesbamWebModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table = 'regionesbam';
	protected $primaryKey = 'cod_reg';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields =
	['slu_reg','nom_reg','fec_reg','ord_reg','tit_reg','sit_reg','des_reg','acr_reg','ade_reg','apd_reg','ter_reg','tpd_reg','log_reg','tit_reg_ing','sit_reg_ing','des_reg_ing','ter_reg_ing',
	'gal_reg'];

	// Dates
	protected $useTimestamps        = false;
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

		$array = ['cod_sit as id', 'fac_sit', 'twt_sit', 'lla_sit', 'mai_sit', 'dir_sit', 'ciu_sit', 'log_sit', 'nom_sit'];

		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}

		return $data;
	}
}