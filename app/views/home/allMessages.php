<?php
$i = 0;
foreach($data as $message)
{
	echo 'message '.$i.' : <br>';
	$i++;
	echo 'username :'.$message->getUsername().', content : '.$message->getContent().', room : '.$message->getRoom().'<br>';
}
?>