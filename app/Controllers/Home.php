<?php
namespace App\Controllers;

class Home extends MyApiRest
{
	protected $format = 'json';


	public function index()
	{
		return view('home');
	}




}























