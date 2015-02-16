<?php

class DAO
{
	protected $_db;
	public $tableName;
	protected $idColumn;

	public function __construct($db,$tableName,$idColumn)
	{
		if(!$db)
		{
			$this->_db = Db::init();

		}
		else
		{
			$this->_db = $db;
		}
		$this->tableName = $tableName;
		$this->idColumn = $idColumn;
	}
	public function findAll()
	{
		$ret = null;
		$sql = "SELECT * FROM ".$this->tableName;
		$req = $this->_db->prepare($sql);
		if($req->execute())
		{
			if($donnees = $req->fetchAll())
			{
				$ret = $donnees;
			}
		}
		return $ret;
	}
	public function findAllAdvanced($sortingExpr, $from, $to)
	{
		$ret = null;
		$sql = "SELECT * FROM ".$this->tableName;
		if($sortingExpr)
		{
			$sql.=" ORDER BY ".$sortingExpr;
		}
		if($from && $to)
		{
			$sql .= " LIMIT ".$from.",".$to;
		}
		$req=$this->_db->prepare($sql);
		if($req->execute())
		{
			if($donnees = $req->fetch())
			{
				$ret = $donnees;
			}
		}
		return $ret;
	}
	public function findById($id)
	{
		$ret = null;
		$sql = "SELECT * FROM ".
		$this->tableName.
		" WHERE ".
		$this->idColumn." = :id";
		$req = $this->_db->prepare($sql);
		$req->bindValue(":id",$id);
		if($req->execute())
		{
			if($donnees = $req->fetch())
			{
				$ret = $donnees;
			}
		}
		return $ret;
	}
	public function deleteById($id)
	{
		$ret = null;
		$sql = "DELETE FROM ".
		$this->tableName.
		"WHERE ".
		$this->idColumn." = :id";
		$req= $this->_db->prepare($sql);
		$req->bindValue(":id", $id);
		if($req->execute())
		{
			if($donnees = $req->fetch())
			{
				$ret = $donnees;
			}
		}
		return $ret;
	}
	public function updateColumns($colNames,$newVals, $id)
	{
		$ret = false;
		$sql = "UPDATE ".
		$this->tableName.
		" SET ";
		for($i=0;$i<count($colNames); $i++)
		{
			$sql.=$colNames[$i]." =:v".$i;
			if($i<count($colNames)-1){
				$sql.=",";
			}
		}
		$sql .= " WHERE ".$this->idColumn ." = :id";
		$req = $this->_db->prepare($sql);
		for($i=0;$i<count($colNames);$i++)
		{
			$req->bindValue(":v".$i,$newVals[$i]);
		}
		$req->bindValue(":id",$id);
		if($req->execute())
		{
			$ret = true;
		}
		return $ret;
	}
}