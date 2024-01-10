<?php
namespace App\Models\web;
use CodeIgniter\Model;

class SitioWebModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'sitio';
	protected $primaryKey           = 'cod_sit';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["fac_sit","nom_sit","twt_sit","ins_sit","you_sit","mai_sit","dir_sit","tel_sit","con_sit","sel_sit","pro_sit","key_sit","ana_sit","vidaobra_sit","perano_sit","gana_dit","jurado_sit","invitado_sit","discursos","videos_sit","banner_sit","bases_sit","libro_sit","cronometro_sit"];

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
		$array = ["fac_sit","nom_sit","twt_sit","ins_sit","you_sit","mai_sit","dir_sit","tel_sit","con_sit","sel_sit","pro_sit","key_sit","ana_sit","vidaobra_sit","perano_sit","gana_dit","jurado_sit","invitado_sit","discursos","videos_sit","banner_sit","bases_sit","libro_sit","cronometro_sit"];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}
}
/* fecha de creacion: 12-19-2023 03:35:34 pm */