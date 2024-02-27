<?php

namespace App\Models\api;

use CodeIgniter\Model;

class Simon_bolivarApiModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'simon_bolivar';
	protected $primaryKey = 'cod_sim';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = [
		"cod_sim as id",
		"ver_sim",
		"ano_sim",
		"ape_ini_sim",
		"ape_fin_sim",
		"ape_act_sim",
		"ins_ini_sim",
		"ins_fin_sim",
		"ins_act_sim",
		"pro_ini_sim",
		"pro_fin_sim",
		"pro_act_sim",
		"stre_ini_sim",
		"stre_fin_sim",
		"stre_act_sim",
		"pdf_act_sim",
		"pdf_bas_sim",
		"url_str_sim",
		"act_str_sim",
		"des_gan_sim",
		"img_dis_sim",
		"img_gan_sim",
		"img_inv_sim",
		"cod_gal_sim",
		"edi_sim",
		"vid_dis_sim",
		"pdf_dis_sim",
		"act_sim",
		"pdf_lib_sim",
		"fec_crea",
		"fec_modif",
		"usu_acce",
		"reg_eli",
		"fan_vid_sim",
		"fan_dis_sim",
		"fan_gan_sim"
	];

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
		$array = [
			"cod_sim as id",
			"ver_sim",
			"ano_sim",
			"ape_ini_sim",
			"ape_fin_sim",
			"ape_act_sim",
			"ins_ini_sim",
			"ins_fin_sim",
			"ins_act_sim",
			"pro_ini_sim",
			"pro_fin_sim",
			"pro_act_sim",
			"stre_ini_sim",
			"stre_fin_sim",
			"stre_act_sim",
			"pdf_act_sim",
			"pdf_bas_sim",
			"url_str_sim",
			"act_str_sim",
			"des_gan_sim",
			"img_dis_sim",
			"img_gan_sim",
			"img_inv_sim",
			"cod_gal_sim",
			"edi_sim",
			"vid_dis_sim",
			"pdf_dis_sim",
			"act_sim",
			"pdf_lib_sim",
			"fec_crea",
			"fec_modif",
			"usu_acce",
			"reg_eli",
			"fan_vid_sim",
			"fan_dis_sim",
			"fan_gan_sim",
			"fan_ban_sim"
		];
		if ($id == 0) {
			$data = $this->select($array)->orderBy('cod_sim', 'DESC')->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}

	public function guardar($request)
	{

		$data = [
			'ver_sim' => $request->getVar('ver_sim'),
			'ano_sim' => $request->getVar('ano_sim'),
			'ape_ini_sim' => $request->getVar('ape_ini_sim'),
			'ape_fin_sim' => $request->getVar('ape_fin_sim'),
			'ape_act_sim' => $request->getVar('ape_act_sim'),
			'ins_ini_sim' => $request->getVar('ins_ini_sim'),
			'ins_fin_sim' => $request->getVar('ins_fin_sim'),
			'ins_act_sim' => $request->getVar('ins_act_sim'),
			'pro_ini_sim' => $request->getVar('pro_ini_sim'),
			'pro_fin_sim' => $request->getVar('pro_fin_sim'),
			'pro_act_sim' => $request->getVar('pro_act_sim'),
			'stre_ini_sim' => $request->getVar('stre_ini_sim'),
			'stre_fin_sim' => $request->getVar('stre_fin_sim'),
			'stre_act_sim' => $request->getVar('stre_act_sim'),
			'pdf_act_sim' => $request->getVar('pdf_act_sim'),
			'pdf_bas_sim' => $request->getVar('pdf_bas_sim'),
			'url_str_sim' => $request->getVar('url_str_sim'),
			'act_str_sim' => $request->getVar('act_str_sim'),
			'des_gan_sim' => $request->getVar('des_gan_sim'),
			'img_dis_sim' => $request->getVar('img_dis_sim'),
			'img_gan_sim' => $request->getVar('img_gan_sim'),
			'img_inv_sim' => $request->getVar('img_inv_sim'),
			'cod_gal_sim' => $request->getVar('cod_gal_sim'),
			'edi_sim' => $request->getVar('edi_sim'),
			'vid_dis_sim' => $request->getVar('vid_dis_sim'),
			'pdf_dis_sim' => $request->getVar('pdf_dis_sim'),
			'act_sim' => $request->getVar('act_sim'),
			'pdf_lib_sim' => $request->getVar('pdf_lib_sim'),
			'fec_crea' => $request->getVar('fec_crea'),
			'fec_modif' => $request->getVar('fec_modif'),
			'usu_acce' => $request->getVar('usu_acce'),
			'reg_eli' => $request->getVar('reg_eli'),
			'fan_vid_sim' => $request->getVar('fan_vid_sim'),
			'fan_dis_sim' => $request->getVar('fan_dis_sim'),
			'fan_gan_sim' => $request->getVar('fan_gan_sim'),
			'fan_gan_sim' => $request->getVar('fan_ban_sim')

		];





		// print_r($data);
		// return 1;
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_sim' => $id,
			'ver_sim' => $request->getVar('ver_sim'),
			'ano_sim' => $request->getVar('ano_sim'),
			'ape_ini_sim' => $request->getVar('ape_ini_sim'),
			'ape_fin_sim' => $request->getVar('ape_fin_sim'),
			'ape_act_sim' => $request->getVar('ape_act_sim'),
			'ins_ini_sim' => $request->getVar('ins_ini_sim'),
			'ins_fin_sim' => $request->getVar('ins_fin_sim'),
			'ins_act_sim' => $request->getVar('ins_act_sim'),
			'pro_ini_sim' => $request->getVar('pro_ini_sim'),
			'pro_fin_sim' => $request->getVar('pro_fin_sim'),
			'pro_act_sim' => $request->getVar('pro_act_sim'),
			'stre_ini_sim' => $request->getVar('stre_ini_sim'),
			'stre_fin_sim' => $request->getVar('stre_fin_sim'),
			'stre_act_sim' => $request->getVar('stre_act_sim'),
			'pdf_act_sim' => $request->getVar('pdf_act_sim'),
			'pdf_bas_sim' => $request->getVar('pdf_bas_sim'),
			'url_str_sim' => $request->getVar('url_str_sim'),
			'act_str_sim' => $request->getVar('act_str_sim'),
			'des_gan_sim' => $request->getVar('des_gan_sim'),
			'img_dis_sim' => $request->getVar('img_dis_sim'),
			'img_gan_sim' => $request->getVar('img_gan_sim'),
			'img_inv_sim' => $request->getVar('img_inv_sim'),
			'cod_gal_sim' => $request->getVar('cod_gal_sim'),
			'edi_sim' => $request->getVar('edi_sim'),
			'vid_dis_sim' => $request->getVar('vid_dis_sim'),
			'pdf_dis_sim' => $request->getVar('pdf_dis_sim'),
			'act_sim' => $request->getVar('act_sim'),
			'pdf_lib_sim' => $request->getVar('pdf_lib_sim'),
			'fec_crea' => $request->getVar('fec_crea'),
			'fec_modif' => $request->getVar('fec_modif'),
			'usu_acce' => $request->getVar('usu_acce'),
			'reg_eli' => $request->getVar('reg_eli'),
			'fan_vid_sim' => $request->getVar('fan_vid_sim'),
			'fan_dis_sim' => $request->getVar('fan_dis_sim'),
			'fan_gan_sim' => $request->getVar('fan_gan_sim'),
			'fan_gan_sim' => $request->getVar('fan_ban_sim')

		];



		$confirmacion = $this->save($data);

		if ($confirmacion == 1) {
			return $id;
		}
	}

	public function borrar($id)
	{
		$id = $this->delete($id);
		return $id;
	}

	public function parametros()
	{
		$array = ["cod_sim as id", "ver_sim", "ano_sim", "ape_ini_sim", "ape_fin_sim", "ape_act_sim", "ins_ini_sim", "ins_fin_sim", "ins_act_sim", "pro_ini_sim", "pro_fin_sim", "pro_act_sim", "stre_ini_sim", "stre_fin_sim", "stre_act_sim", "pdf_act_sim", "pdf_bas_sim", "url_str_sim", "act_str_sim", "des_gan_sim", "img_dis_sim", "img_gan_sim", "img_inv_sim", "cod_gal_sim", "edi_sim", "vid_dis_sim", "pdf_dis_sim", "act_sim", "pdf_lib_sim", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 01-22-2024 01:04:36 pm */