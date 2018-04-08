<?php
session_start();
//ob_start();
if(!isset($_SESSION['email']))
{   ob_start();
    header('Location:./../../login.php');
}
else{
    if(($_SESSION['role_id']!='admin'))
    {   ob_start();
        header('Location:./../../login.php');
    }
}
?>