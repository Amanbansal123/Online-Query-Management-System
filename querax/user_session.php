<?php

//checking if session id is set
if (!isset($_SESSION['id']))
{
	header('location: ../');
    exit;
}
elseif($_SESSION['id']!="@user$")//checking if it is a student id or not
{
   header('location: ../');
    exit;
}

?>
