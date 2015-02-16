<?php
class VO
{
	private $_id;
	public function setId($id)
	{
		$this->_id = $id;
	}
	public function getId()
	{
		return $this->_id;
	}
}