<?php
class MessageDAO extends DAO
{
	public function __construct()
	{
		require_once 'MessageVO.php';
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
		$messages = null;
		if($arrayResult = parent::findAll())
		{
			$messages = array();
			foreach($arrayResult as $entry)
			{
				$message = new MessageVO($entry['username'],$entry['content'],$entry['username']);
				array_push($messages, $message);
			}
		}
		return $messages;
	}
	public function findById($id)
	{
		$message = null;
		if($retFromDAO = parent::findById($id))
		{
			$message = new MessageVO($retFromDAO['username'],$retFromDAO['content'],$retFromDAO['room']);
		}
		return $message;
	}

}