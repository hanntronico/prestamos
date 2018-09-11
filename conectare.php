<?php

function Conectarse()
{ 
	if (!($enlace=mysql_connect("localhost","root","*274053*")))
	// if (!($enlace=mysql_connect("localhost","root","*123456*")))
	// if (!($enlace=mysql_connect("127.0.0.1","may10ind_userbd","*274053@2018*")))
	{
	echo "ERROR EN LA CONEXION: NUEVOS ELEMENTOS HAN SIDO CREADOS";
	exit();
	}
	if (!mysql_select_db("bdgarbage",$enlace))
	{
	// echo "ERROR EN LA CONEXION BD";
	echo "#1146 - Something is wrong in its syntax near 'JOIN' on line 1";
	exit();
	}
return $enlace;
}
?>