<?php
namespace App\Models\web;
use CodeIgniter\Model;

class JuradosWebModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'jurados';
	protected $primaryKey           = 'cod_jur';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["nom_jur","des_jur","cor_jur","img_jur","img_hom_jur","cod_ciu_jur","ano_nac_jur","act_jur","ord_jur","car_jur","cod_sim_jur","fec_crea","fec_modif","usu_acce","reg_eli"];

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
		$array = ['cod_jur',"nom_jur","des_jur","cor_jur","img_jur","img_hom_jur","cod_ciu_jur","ano_nac_jur","act_jur","ord_jur","car_jur","cod_sim_jur","fec_crea","fec_modif","usu_acce","reg_eli"];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->where('cod_sim_jur',$id)->orderBy('ord_jur ASC')->find();
		}
		return $data;
	}


	public function jurado($id = 0)
	{
		$array = ['cod_jur',"nom_jur","des_jur","cor_jur","img_jur","img_hom_jur","cod_ciu_jur","ano_nac_jur","act_jur","ord_jur","car_jur","cod_sim_jur","fec_crea","fec_modif","usu_acce","reg_eli"];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->where('cod_jur',$id)->find();
		}
		return $data;
	}
}
/* fecha de creacion: 12-19-2023 06:39:35 pm */