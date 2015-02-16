<?php
class Home extends Controller
{
	protected $messages = array();
	private $messageDAO;
	public function __construct(){
		//$this->message = $this->model('Message');
		$this->messageDAO = $this->modelDAO('Message');
	}
	public function index($name = '')
	{
		$this->view('home/index', ['name' => $name]);
	}
	public function addMessage($username, $content, $room)
	{
		$message = $this->modelVO('Message');
		$message->setUsername($username);
		$message->setContent($content);
		$message->setRoom($room);
		$this->messageDAO->insert($message);
	}
	public function deleteMessageByRoom($room)
	{
		echo '\n';
		print_r($this->messageDAO->findAll());
		echo '\n';
		if($this->messageDAO->deleteMessageByRoom($room))
		{
			echo 'success deleting from '.$room;
			echo '\n';
			print_r($this->messageDAO->findAll());
		}
		else
		{
			echo 'failure deleting from '.$room;
		}
	}
	public function findAll()
	{
		$this->messageDAO->findAll();
		echo '<br>';
		//$this->view('home/allMessages', );
	}

}