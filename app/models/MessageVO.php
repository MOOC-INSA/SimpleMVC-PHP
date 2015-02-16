<?php

class MessageVO
{
	private $_username;
	private $_content;
	private $_room;
	public function __construct($username = null,$content = null,$room = null)
	{
		$this->_username = $username;
		$this->_room = $room;
		$this->_content = $content;
		return $this;
	}

	public function setContent($content)
	{
		$this->_content = $content;
	}
	public function getContent()
	{
		return $this->_content;
	}
	public function setUsername($username)
	{
		$this->_username = $username;
	}
	public function getUsername()
	{
		return $this->_username;
	}


	public function setRoom($room)
	{
		$this->_room = $room;
	}
	public function getRoom()
	{
		return $this->_room;
	}
}