<?php 
	session_start();
	include("funciones/function.php");
	include("conectar.php");
	$link=Conectarse();

	if ($_POST["sw"]==1) {
		$rs=@mysql_query("set names utf8",$link);
	  @mysql_fetch_array($rs);	

	  if(isset($_POST["editor2"]))
	    {
	      $filename = $_POST["descripcontra"].".txt";
	      $miArchivo = fopen("contratos/".$filename, "w") or die("No se puede abrir/crear el archivo!");
	      
	      $text = $_POST['editor2'];
	    	// $text = trim($text);
	      fwrite($miArchivo,$text);
				fclose($miArchivo);
	    }

		$consulta="INSERT INTO contratos(desc_contrato, file_contrato, estado_contrato) 
							 VALUES ('".$_POST["descripcontra"]."','".$filename."',1)";
		@mysql_query($consulta,$link);



	}elseif ($_POST["sw"]==2) {

		$rs=@mysql_query("set names utf8",$link);
	  @mysql_fetch_array($rs);
					
// desc_contrato | file_contrato | estado_contrato |

		$sql="SELECT * FROM contratos WHERE idContrato =".$_POST["id"];
		$rs=@mysql_query($sql, $link);
		$fila = @mysql_fetch_object($rs);
		
		$id = $fila->idContrato;
		$descContrato = $fila->desc_contrato;
		$fileContrato = $fila->file_contrato;
		$estadoContrato = $fila->estado_contrato;

		if (file_exists("contratos/".$fileContrato)){
			unlink("contratos/".$fileContrato);
		}

		$filename = $_POST["descripcontra"].".txt";
	  $miArchivo = fopen("contratos/".$filename, "w") or die("No se puede abrir/crear el archivo!");
	  $text = $_POST['editor2'];
	  fwrite($miArchivo,$text);
		fclose($miArchivo);

	}

	header('location: main.php'.'?msn='.$msn)
?>