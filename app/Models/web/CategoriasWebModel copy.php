<?php
namespace App\Models\web;
use CodeIgniter\Model;

class CategoriasWebModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'categorias';
	protected $primaryKey           = 'cod_cat';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['cod_cat',"nom_cat","relacion_cat","orden_cat","ord_cat","imp_cat","cod_sim_cat","annio_cat","fec_crea","fec_modif","usu_acce","reg_eli", 'slu_cat' ];

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
		$array = ['cod_cat',"nom_cat","relacion_cat","orden_cat","ord_cat","imp_cat","cod_sim_cat","annio_cat","fec_crea","fec_modif","usu_acce","reg_eli" , 'slu_cat'];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->where('cod_sim_cat',$id)->orderBy('ord_cat ASC')->find();
		}
		return $data;
	}
}
/* fecha de creacion: 12-19-2023 07:03:23 pm */