<?php

function Conectarse()
{ 
	// if (!($enlace=mysql_connect("localhost","root","*274053*")))
	if (!($enlace=mysql_connect("localhost","root","*123456*")))
	{
	echo "ERROR EN LA CONEXION: NUEVOS ELEMENTOS HAN SIDO CREADOS";
	exit();
	}
	if (!mysql_select_db("bdprestacix",$enlace))
	// if (!mysql_select_db("bdpresta_may10ind",$enlace))
	{
	echo "ERROR EN LA CONEXION BD";
	exit();
	}
return $enlace;
}
?>