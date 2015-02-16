<?php
class MessageDAO extends DAO
{
	public function __construct()
	{
		$db = Db::init();
		parent::__construct($db,"messages","id");
	}
	public function insert($message)
	{
		$ret = -1;
		$sql = "INSERT INTO messages (username, content, room) VALUES (?, ?, ?)";
		$req = $this->_db->prepare($sql);
		if($req->execute(array(
			$message->getUsername(),
			$message->getContent(),
			$message->getRoom()
			)))
		{
			$ret = $this->_db->lastInsertId();
		}
		echo $ret;
		return $ret;
	}
	public function deleteMessageByRoom($room)
	{
		$ret = false;
		$sql = "DELETE FROM messages WHERE room = :room";
		$req = $this->_db->prepare($sql);
		$req->bindValue(":room",$room);
		if($req->execute())
		{
			$ret = true;
		}
		return $ret;
	}
	public function findAll()
	{
		$arrayResult = parent::findAll();
		$i = 0;
		foreach($arrayResult as $entry)
		{
			echo "'<br> entry ".$i.'<br>';
			$i++;
			$j = 0;
			foreach($entry as $value)
			{
				$j++;
				echo '<br> value '.$j.' : '.$value.'<br>';
			}
		}
	}

}