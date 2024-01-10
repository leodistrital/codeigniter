<?php
namespace App\Models\web;
use CodeIgniter\Model;

class Ganadores_historicoWebModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'ganadores_historico';
	protected $primaryKey           = 'cod_gan';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ["nom_gan","url_gan","url1_gan","url2_gan","tra_gan","des_gan","cod_sim_gan","cod_cat_old","cod_cat_gan","cod_med_gan","orden_gan","cat_esp_gan","cod_ciu_gan","cod_ciu2_gan","num_trab_gan","med_gan","img_gan","ba_gan","vid_gan","equ_gan","fec_crea","fec_modif","usu_acce","reg_eli"];

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
		$array = ["nom_gan","url_gan","url1_gan","url2_gan","tra_gan","des_gan","cod_sim_gan","cod_cat_old","cod_cat_gan","cod_med_gan","orden_gan","cat_esp_gan","cod_ciu_gan","cod_ciu2_gan","num_trab_gan","med_gan","img_gan","ba_gan","vid_gan","equ_gan", 'nom_cat', 'nom_med'];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->join('categorias', 'categorias.cod_cat = cod_cat_gan')->join('medios', 'medios.cod_med = cod_med_gan')->where('cod_sim_gan', $id)->orderBy('nom_gan','RANDOM')->limit(6)->find();
		}
		return $data;
	}


	public function listatardatosOld($categoria = 0, $ano=0)
	{
		$array = ["nom_gan","url_gan","url1_gan","url2_gan","tra_gan","des_gan","cod_sim_gan","cod_cat_old","cod_cat_gan","cod_med_gan","orden_gan","cat_esp_gan","cod_ciu_gan","cod_ciu2_gan","num_trab_gan","med_gan","img_gan","ba_gan","vid_gan","equ_gan", 'nom_med'];
		$where = ['cod_cat_gan' => $categoria];
		$data = $this->select($array)->join('medios', 'medios.cod_med=cod_med_gan')->where($where)->find();
		return $data;
	}


	public function listatardatostotal($id = 0)
	{
		$array = ["nom_gan","url_gan","url1_gan","url2_gan","tra_gan","des_gan","cod_sim_gan","cod_cat_old","cod_cat_gan","cod_med_gan","orden_gan","cat_esp_gan","cod_ciu_gan","cod_ciu2_gan","num_trab_gan","med_gan","img_gan","ba_gan","vid_gan","equ_gan", 'nom_cat', 'nom_med'];
		if ($id == 0) {
			$data = $this->select($array)->findAll();
		} else {
			$data = $this->select($array)->join('categorias', 'categorias.cod_cat = cod_cat_gan')->join('medios', 'medios.cod_med = cod_med_gan','left')->where('cod_sim_gan', $id)->where('vid_gan!=', '')->find();
		}
		return $data;
	}

	public function listatardatosGanadores($id = 0, $categoria='')
	{
		$array = ["nom_gan","url_gan","url1_gan","url2_gan","tra_gan","des_gan","cod_sim_gan","cod_cat_old","cod_cat_gan","cod_med_gan","orden_gan","cat_esp_gan","cod_ciu_gan","cod_ciu2_gan","num_trab_gan","med_gan","img_gan","ba_gan","vid_gan","equ_gan", 'nom_cat', 'nom_med'];
		
			$data = $this->select($array)->join('categorias', 'categorias.cod_cat = cod_cat_gan')->join('medios', 'medios.cod_med = cod_med_gan','left')->where('cod_sim_gan', $id)->where('cod_cat_gan', $categoria)->orderBy('orden_gan')->find();
	
		return $data;
	}
}
/* fecha de creacion: 12-19-2023 07:36:47 pm */