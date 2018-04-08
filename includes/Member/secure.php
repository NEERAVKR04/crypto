<?php
session_start();
if(!isset($_SESSION['email']))
{       ob_start();
    header('Location:./../../login.php');
}
else{
    if(($_SESSION['role_id']!='member'))
    {    ob_start();
        header('Location:./../../login.php');
    }
}
?>