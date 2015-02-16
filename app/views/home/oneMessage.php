<?php
var_dump($data);
	$message = $data[0];
	echo 'username : '.$message->getUsername().', content : '.$message->getContent().', room : '.$message->getRoom().'<br>';
?>