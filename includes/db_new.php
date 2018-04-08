<?php
mysql_connect('localhost','root','') or die('server is not available');
mysql_select_db('crypto') or die('database not Found');

$password=  sha1('neerav0408');
//$answer=sha1('matrix');
$query="insert into user values('neeravkr.04@gmail.com','Neerav','9690531162','$password','admin','','Y')";
mysql_query($query);
?>
