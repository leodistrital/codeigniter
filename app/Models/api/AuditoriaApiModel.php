<?php

namespace App\Models\api;

use CodeIgniter\Model;

class AuditoriaApiModel extends Model
{
	protected $DBGroup = 'default';
	protected $table = 'auditoria';
	protected $primaryKey = 'cod_aud';
	protected $useAutoIncrement = true;
	protected $insertID = 0;
	protected $returnType = 'array';
	protected $useSoftDeletes = true;
	protected $protectFields = true;
	protected $allowedFields = ["cod_aud as id", "cod_usu_aud", "nom_tab_aud", "fec_aud", "transaccion", "sql_aud", "id_int_aud", "id_reg_aud", "cliente_aud"];

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
		$array = ["cod_aud as id", "cod_usu_aud", "nom_tab_aud", "fec_aud", "transaccion", "sql_aud", "id_int_aud", "id_reg_aud", "cliente_aud"];
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
			'cod_usu_aud' => $request->getVar('cod_usu_aud'),
			'nom_tab_aud' => $request->getVar('nom_tab_aud'),
			'transaccion' => $request->getVar('transaccion'),
			'sql_aud' => $request->getVar('sql_aud'),
			'id_int_aud' => $request->getVar('id_int_aud'),
			'id_reg_aud' => $request->getVar('id_reg_aud'),
			'cliente_aud' => $request->getVar('cliente_aud')

		];
		$id = $this->insert($data);
		return $id;
	}

	public function edicion($id, $request)
	{
		$data = [
			'cod_aud' => $id,
			'cod_usu_aud' => $request->getVar('cod_usu_aud'),
			'nom_tab_aud' => $request->getVar('nom_tab_aud'),
			'fec_aud' => $request->getVar('fec_aud'),
			'transaccion' => $request->getVar('transaccion'),
			'sql_aud' => $request->getVar('sql_aud'),
			'id_int_aud' => $request->getVar('id_int_aud'),
			'id_reg_aud' => $request->getVar('id_reg_aud'),
			'cliente_aud' => $request->getVar('cliente_aud')

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
		$array = ["cod_aud as id", "cod_usu_aud", "nom_tab_aud", "fec_aud", "transaccion", "sql_aud", "id_int_aud", "id_reg_aud", "cliente_aud"];
		$data = $this->select($array)->findAll();
		return $data;
	}
}
/* fecha de creacion: 03-16-2024 04:19:11 pm */