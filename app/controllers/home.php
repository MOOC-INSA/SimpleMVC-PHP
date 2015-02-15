<?php
class Home extends Controller
{
	public function index($name = '')
	{
		echo "salut ".$name;
	}
}