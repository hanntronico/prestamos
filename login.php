<?php 

		session_start();
		include("conectar.php");
		$link=Conectarse();

		$login=htmlentities($_POST["login"]);
		$clave=md5($_POST["password"]);

		// echo "llego a login.php <br>";
		// echo $login."<br>".$clave;
		// exit();

	$res=@mysql_query("select * from usuario where login='$login'",$link);
	if (@mysql_num_rows($res)==0)
	{
		header("location: index.php?deny=6");
		exit();	
	}
	$row=@mysql_fetch_array($res);
	$codu=$row[0];
	
	$res=@mysql_query("select * from usuario where cod_usuario='$codu' and clave='$clave' and estado=1",$link);
	if (@mysql_num_rows($res)>0)
	{
		$row=@mysql_fetch_array($res);


		$_SESSION["s_cod"]=$row[0];
		$_SESSION["s_tipo"]=$row["cod_nivel"];
		$_SESSION["s_solonom"]=htmlentities($row["nombre"]);
		$_SESSION["s_nombreC"]=htmlentities($row["nombre"]." ".$row["apellidos"]);
		$_SESSION["s_correousu"]=htmlentities($row["correo"]);
		$_SESSION["s_estado"]=$row["estado"];

		// echo $_SESSION["s_cod"]." ".$_SESSION["s_tipo"]." ".$_SESSION["s_nombreC"];
		// exit();
		

		if ($row["cod_nivel"]==1)
		{


			
			header("location: main.php");
			exit;
		}

		if ($row["cod_nivel"]==2)
		{
			// header("location: modulos/admin/main_admin.php");
			header("location: main.php");
			exit;
		}
		

		if ($row["cod_nivel"]==3)
		{
			// $id=$row[0];
			// $res2=mysql_query("select * from admin where adm_codigo='$id'",$link);
			// $row2=mysql_fetch_array($res2);
			
			// $_SESSION["s_nivel"]=$row2[3];
			// $_SESSION["s_fac"]=$row2[1];
			// $_SESSION["s_esc"]=$row2[2];
			// $_SESSION["s_sede"]=$row2["sed_codigo"];
			// $esc=$row2[2];

			header("location: main.php");			
			exit;
		}
	}
	else
	{
		header("location: index.php?deny=6");
		exit;	
	}
exit;


	
?>