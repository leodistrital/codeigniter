<?php
namespace App\Models\web;

use CodeIgniter\Model;

class Simon_bolivarWebModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'simon_bolivar';
	protected $primaryKey = 'cod_sim';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ["ver_sim", "ano_sim", "ape_ini_sim", "ape_fin_sim", "ape_act_sim", "ins_ini_sim", "ins_fin_sim", "ins_act_sim", "pro_ini_sim", "pro_fin_sim", "pro_act_sim", "stre_ini_sim", "stre_fin_sim", "stre_act_sim", "pdf_act_sim", "pdf_bas_sim", "url_str_sim", "act_str_sim", "des_gan_sim", "img_dis_sim", "img_gan_sim", "img_inv_sim", "cod_gal_sim", "edi_sim", "vid_dis_sim", "pdf_dis_sim", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];

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
		$array = ["cod_sim", "ver_sim", "ano_sim", "ape_ini_sim", "ape_fin_sim", "ape_act_sim", "ins_ini_sim", "ins_fin_sim", "ins_act_sim", "pro_ini_sim", "pro_fin_sim", "pro_act_sim", "stre_ini_sim", "stre_fin_sim", "stre_act_sim", "pdf_act_sim", "pdf_bas_sim", "url_str_sim", "act_str_sim", "des_gan_sim", "img_dis_sim", "img_gan_sim", "img_inv_sim", "cod_gal_sim", "edi_sim", "vid_dis_sim", "pdf_dis_sim", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}

	public function edicionActual($id = 0)
	{
		$array = ["cod_sim", "ver_sim", "ano_sim", "ape_ini_sim", "ape_fin_sim", "ape_act_sim", "ins_ini_sim", "ins_fin_sim", "ins_act_sim", "pro_ini_sim", "pro_fin_sim", "pro_act_sim", "stre_ini_sim", "stre_fin_sim", "stre_act_sim", "pdf_act_sim", "pdf_bas_sim", "url_str_sim", "act_str_sim", "des_gan_sim", "img_dis_sim", "img_gan_sim", "img_inv_sim", "cod_gal_sim", "edi_sim", "vid_dis_sim", "pdf_dis_sim", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		if ($id == 0) {
			$data = $this->select($array)->orderBy('ano_sim', 'DESC')->limit(1)->find();
		} else {
			$data = $this->select($array)->where('ano_sim', $id)->find();
		}

		// var_dump($data[0]);
		return $data[0];
	}

	public function edicionActualAno($anosim)
	{
		$array = ["cod_sim", "ver_sim", "ano_sim", "ape_ini_sim", "ape_fin_sim", "ape_act_sim", "ins_ini_sim", "ins_fin_sim", "ins_act_sim", "pro_ini_sim", "pro_fin_sim", "pro_act_sim", "stre_ini_sim", "stre_fin_sim", "stre_act_sim", "pdf_act_sim", "pdf_bas_sim", "url_str_sim", "act_str_sim", "des_gan_sim", "img_dis_sim", "img_gan_sim", "img_inv_sim", "cod_gal_sim", "edi_sim", "vid_dis_sim", "pdf_dis_sim", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		$data = $this->select($array)->where('ano_sim', $anosim)->find();
		// var_dump($data[0]);
		return $data[0];
	}






}
/* fecha de creacion: 12-18-2023 04:11:36 pm */