<?php

function Conectarse()
{
	if (!($enlace=mysql_connect("127.0.0.1","may10ind_userbd","*274053@2018*")))
	{
	echo "ERROR EN LA CONEXION: NUEVOS ELEMENTOS HAN SIDO CREADOS";
	exit();
	}
	if (!mysql_select_db("may10ind_bdprestacix",$enlace))
	{
	echo "ERROR EN LA CONEXION BD";
	exit();
	}
return $enlace;
}
?>