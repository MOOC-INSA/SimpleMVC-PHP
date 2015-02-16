<?php
class Controller
{

	public function modelDAO($model)
	{
		require_once '../app/models/'.$model.'DAO.php';
		$name = ''.$model.'DAO';
		return new $name;
	}
	public function modelVO($model)
	{
		require_once '../app/models/'.$model.'VO.php';
		$name = ''.$model.'VO';
		return new $name;
	}
	public function view($view, $data = [])
	{
		require_once '../app/views/'.$view.'.php';
	}
}