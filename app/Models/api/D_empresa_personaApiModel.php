<?php

namespace App\Models\api;

use CodeIgniter\Model;

class D_empresa_personaApiModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'd_empresa_persona';
	protected $primaryKey = 'cod_dep';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ["cod_dep as id", "cod_per_dpe", "cod_emp", "dep_dep", "car_dpe", "mail_dpe", "tel_dpe", "dir_dpe", "cod_suc", "pri_dpe", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];

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
		$array = ["cod_dep as id", "cod_per_dpe", "cod_emp", "dep_dep", "car_dpe", "mail_dpe", "tel_dpe", "dir_dpe", "cod_suc", "pri_dpe", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->find($id);
		}
		return $data;
	}

	public function guardar($request)
	{

		$data = [
			'cod_per_dpe' => $request->getVar('cod_per_dpe'),
			'cod_emp' => $request->getVar('cod_emp'),
			'dep_dep' => $request->getVar('dep_dep'),
			'car_dpe' => $request->getVar('car_dpe'),
			'mail_dpe' => $request->getVar('mail_dpe'),
			'tel_dpe' => $request->getVar('tel_dpe'),
			'dir_dpe' => $request->getVar('dir_dpe'),
			'cod_suc' => $request->getVar('cod_suc'),
			'pri_dpe' => $request->getVar('pri_dpe'),
			'fec_crea' => $request->getVar('fec_crea'),
			'fec_modif' => $request->getVar('fec_modif'),
			'usu_acce' => $request->getVar('usu_acce'),
			'reg_eli' => $request->getVar('reg_eli')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_dep' => $id,
			'cod_per_dpe' => $request->getVar('cod_per_dpe'),
			'cod_emp' => $request->getVar('cod_emp'),
			'dep_dep' => $request->getVar('dep_dep'),
			'car_dpe' => $request->getVar('car_dpe'),
			'mail_dpe' => $request->getVar('mail_dpe'),
			'tel_dpe' => $request->getVar('tel_dpe'),
			'dir_dpe' => $request->getVar('dir_dpe'),
			'cod_suc' => $request->getVar('cod_suc'),
			'pri_dpe' => $request->getVar('pri_dpe'),
			'fec_crea' => $request->getVar('fec_crea'),
			'fec_modif' => $request->getVar('fec_modif'),
			'usu_acce' => $request->getVar('usu_acce'),
			'reg_eli' => $request->getVar('reg_eli')

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
		$array = ["cod_dep as id", "cod_per_dpe", "cod_emp", "dep_dep", "car_dpe", "mail_dpe", "tel_dpe", "dir_dpe", "cod_suc", "pri_dpe", "fec_crea", "fec_modif", "usu_acce", "reg_eli"];
		$data = $this->select($array)->findAll();
		return $data;
	}

	public function edicionPersona($id, $request)
	{

		// echo $id;
		$this->where('cod_per_dpe', $id)->delete();
		foreach ($request->getVar('empresas') as $clave) {
			// print_r($clave);
			$data = [
				'cod_per_dpe' => $id,
				'cod_emp' => $clave->cod_emp,
				'dep_dep' => $clave->dep_dep,
				'car_dpe' => $clave->car_dpe,
				'mail_dpe' => $clave->mail_dpe,
				'tel_dpe' => $clave->tel_dpe,
				'dir_dpe' => $clave->dir_dpe,
				'pri_dpe' => $clave->pri_dpe,
				'cod_suc' => $clave->cod_suc,
			];
			$confirmacion = $this->save($data);
		}
	}

	public function empresasPersona($id = 0)
	{
		$array = ["cod_dep as id", "cod_per_dpe", "d_empresa_persona.cod_emp", "dep_dep", "car_dpe", "mail_dpe", "tel_dpe", "dir_dpe", "cod_suc", "pri_dpe", "nom_emp"];
		$data = $this->select($array)->join('empresas', 'empresas.cod_emp=d_empresa_persona.cod_emp')->where('cod_per_dpe', $id)->find();
		// echo $this->getLastQuery();
		return $data;
	}
}
/* fecha de creacion: 02-20-2024 02:07:00 pm */