<?php
	session_start();
	include("funciones/function.php");
	include("conectar.php");
	$link=Conectarse();
	$loc="location: ".$_POST["pag"].".php";
  $varnull=NULL;
	// echo $loc; echo "--".$_POST["pag"]; echo "   sw: ".$_POST["sw"];  exit();
	
	function fechas_hann($value)
	{
		list($dia,$mes,$anio)=explode("/",$value); 
	  $fec_em = $anio."-".$mes."-".$dia;
		return $fec_em;
	}


	switch ($_POST["pag"]) {

/******************** APROBADOS ************************************************************************/

		case 'aprobados':

			if($_POST["sw"]==1){
				$rs=@mysql_query("set names utf8",$link);
        @mysql_fetch_array($rs);

				date_default_timezone_set('America/Lima');
				$fecap = date_format(date_create($_POST[fecaprob]), 'd-m-Y H:i:s');
				$fechaAContac = date('Y-m-d', strtotime ( '+7 day' , strtotime ($fecap) ));

				$sql="INSERT INTO oportunidades(codCliente, 
																				codProducto, 
																				nroSec, 
																				fechaAproba, 
																				codPlan, 
																				operacion, 
																				canal, 
																				fechaAContac, 
																				comentario, 
																				codCiudad, 
																				estOport) 
							VALUES (".$_POST["id"].", ".
								      $_POST["codProd"].", '".
							    	  $_POST["nrosec"]."', '".
								      $_POST["fecaprob"]."', ".
								      $_POST["codPlan"].", '".
							    	  $_POST["operacion"]."', '".
							      	$_POST["canal"]."', '".
							     	  $fechaAContac."', '".
							      	$_POST["comentario"]."', ".
								  	  $_POST["codCiudad"].", "."1)";

									@mysql_query($sql,$link);
 
				$consulta="SELECT codOportunidad from oportunidades where codCliente=".$_POST[id];
				$rs=@mysql_query($consulta,$link);
				$numfilas=@mysql_num_rows($rs);

					if($numfilas > 0){
						$sql="UPDATE clientes 
					         SET nroSec='".$_POST["nrosec"].
					         "' WHERE codCliente='".$_POST["id"]."'";
						@mysql_query($sql,$link);

					}

				}

				break;
/*********************************  CLIENTES  ********************************************/

		case 'clientes':
			if($_POST["sw"]==1){
			
			$rs=@mysql_query("SELECT * FROM clientes WHERE nroDNI='".$_POST["dni"]."'",$link);
			$numfilas=@mysql_num_rows($rs);

			if($numfilas == 0 ){

				$rs=@mysql_query("set names utf8",$link);
          	@mysql_fetch_array($rs);

// list($dia,$mes,$anio)=explode("/",$_POST["fec_em"]); 
//   $fec_em = $anio."-".$mes."-".$dia;

				$sql="INSERT INTO clientes(nomClie,
                         				   apepatClie,
                         				   apematClie,
                         				   nroDNI,
                         				   fecNac,
                         				   telefono,
                         				   direccion,
                         				   facebook,
                         				   email,
                         				   nomInbox,
                         				   estClie) 
					         VALUES('".strtoupper($_POST["nombre"])."','".
					         	       strtoupper($_POST["apepat"])."','".
					         	       strtoupper($_POST["apemat"])."','".
					         	       $_POST["dni"]."','".
					         	       fechas_hann($_POST["fecnac"])."','".
					         	       $_POST["telefono"]."','".
					         	       $_POST["direccion"]."','".
					         	       $_POST["facebook"]."','".
					         	       $_POST["email"]."','".
					         	       ""."',1)";
				// echo $sql; exit();
				@mysql_query($sql,$link);
				$msn='u1';				
				}
			else
			{ 
			
			// $msg_error="Login ya existe, intente otro...";
			$msn='err_cli';
			 }
			}elseif($_POST["sw"]==2){

				$rs=@mysql_query("set names utf8",$link);
        @mysql_fetch_array($rs);
				

				$sql="UPDATE clientes 
					         SET nomClie='".strtoupper($_POST["nombre"]).
					         "', apepatClie='".strtoupper($_POST["apepat"]).
					         "', apematClie='".strtoupper($_POST["apemat"]).
					         "', nroDNI='".$_POST["dni"].
					         "', fecNac='".fechas_hann($_POST["fecnac"]).
					         "', telefono='".$_POST["telefono"].
					         "', direccion='".$_POST["direccion"].
					         "', facebook='".$_POST["facebook"].
					         "', email='".$_POST["email"].
					         "' WHERE codCliente='".$_POST["id"]."'";
				// echo $sql; exit();
				@mysql_query($sql,$link);
				$msn='u1';
	
			}else{

				$numreg=count($_POST["check"]);
				for ($i=0;$i<=$numreg-1;$i++){
						mysql_query("DELETE FROM clientes WHERE codCliente='".$_POST["check"][$i]."'",$link);
				}
				$msn='ue1';
			}
			break;

/*********************************  PRESTAMOS  **********************************************/

		case 'new_prestamo':
			if($_POST["sw"]==1){

				// echo $_POST["idCliente"]."<br>"; 
				// echo $_POST["codCateg"]."<br>"; 
				// echo $_POST["fecPrest"]."<br>"; 
				// echo $_POST["idUsu"]."<br>"; 

				// echo "entro a grabar prestamos";
				// echo $_POST["idUsu"]." -- fec.venc.= ".
				//      $_POST["fecvenc"]." -- total prestamo : ".
				//      $_POST["totprendas"]." -- interes : ".
				//      $_SESSION["catinteres"]; 
				// exit();

// codPrestamo	codCliente	codCategoria	fec_prestamo	fec_vencim cod_usuario	prestamo_estado	

			// if($numfilas == 0 ){

				$rs=@mysql_query("set names utf8",$link);
          	@mysql_fetch_array($rs);

			$sql="INSERT INTO prestamos (codCliente, codCategoria, fec_prestamo, fec_vencim, cod_usuario, prestamo_estado) 
						VALUES(".$_POST["idCliente"].",".$_POST["codCateg"].",'".fechas_hann($_POST["fecPrest"])."','".$_POST["fecvenc"]."',".$_POST["idUsu"].",1)";

				@mysql_query($sql,$link);			

				// echo $sql; exit();	
				$idprestamo = mysql_insert_id();
				// echo $idprestamo; 
				// echo "<br>";
						// exit()

					foreach($_SESSION['prendas'] as $fila)
	        	{
							$sql = "INSERT INTO prendas(prenda_descrip, prenda_marca, prenda_modelo, prenda_serie, prenda_observ, prenda_avaluo, prenda_prest, prenda_img, idTipo, prenda_estado) 
							VALUES ('".$fila['descripcion']."','".$fila['marca']."','".$fila['modelo']."','".$fila['serie']."','".$fila['observacion']."','".$fila['avaluo']."','".$fila['prestamo']."', 'no_image.jpg','".$_POST["codTipo"]."',1)";
							@mysql_query($sql,$link);

							$idprenda = mysql_insert_id();

							$sql1 = "INSERT INTO detalle_prestamo(codPrestamo, idPrenda, avaluo, monto, interes) 
							         VALUES (".$idprestamo.",".
							         					 $idprenda.",".
							         					 $fila['avaluo'].",".
							         					 $fila['prestamo'].",".($_SESSION["catinteres"]/100)."*".$fila['prestamo'].")";
							@mysql_query($sql1,$link);
							
							include 'limpia_prenda.php';
	          }

 // codPago, pago_descrip, codPrestamo, fec_pago, pago_cargo, pago_abono, pago_saldo, cod_usuario, pago_estado

	   	$sql2="INSERT INTO pagos(pago_descrip, codPrestamo, fec_pago, pago_cargo, pago_abono, pago_saldo, cod_usuario, pago_estado) 
	    			 VALUES ('Préstamo', ".$idprestamo.",'".fechas_hann($_POST["fecPrest"])."', ".$_POST["totprendas"].", 0, ".$_POST["totprendas"].", ".$_POST["idUsu"].",1)";

	      @mysql_query($sql2,$link);

     

	    $sql2="INSERT INTO pagos(pago_descrip, codPrestamo, fec_pago, pago_cargo, pago_abono, pago_saldo, cod_usuario, pago_estado) 
	    			 VALUES ('Intereses generados', ".$idprestamo.",'".fechas_hann($_POST["fecPrest"])."', ".(($_SESSION["catinteres"]/100)*$_POST["totprendas"]).", 0, ".((1+($_SESSION["catinteres"]/100))*$_POST["totprendas"]).", ".$_POST["idUsu"].", 1)";

	      @mysql_query($sql2,$link);


			}
			break;

/*********************************  CATEGORIAS    ***********************************************/

		case 'categorias':
			if($_POST["sw"]==1){
			
			$rs=@mysql_query("SELECT * FROM categorias WHERE idCategoria='".$_POST["id"]."'",$link);
			$numfilas=@mysql_num_rows($rs);

			if($numfilas == 0 ){

				$rs=@mysql_query("set names utf8",$link);
          		@mysql_fetch_array($rs);

				$sql="INSERT INTO categorias (cate_descrip,
																			categ_observ, 
																			categ_periodo, 
																			categ_plazo, 
																			categ_interes, 
																			categ_estado) 
					         VALUES('".$_POST["catedescrip"]."','".
					         					 $_POST["categobserv"]."','".
					         					 $_POST["categperiodo"]."','".
					         					 $_POST["categplazo"]."','".
					         					 $_POST["categinteres"]."', 1)";
				@mysql_query($sql,$link);
				$msn='u1';				
				}
			else
			{ 
			
				$msg_error="Login ya existe, intente otro...";
			
			 }
			}elseif($_POST["sw"]==2){

				$rs=@mysql_query("set names utf8",$link);
        @mysql_fetch_array($rs);
				

				$sql="UPDATE categorias
							SET cate_descrip='".$_POST["catedescrip"].
					         "', categ_observ='".$_POST["categobserv"].
					         "', categ_periodo='".$_POST["categperiodo"].
					         "', categ_plazo='".$_POST["categplazo"].
					         "', categ_interes='".$_POST["categinteres"].
					         "' WHERE idCategoria=".$_POST["id"];
				@mysql_query($sql,$link);
				$msn='u1';
	
			}else{

				$numreg=count($_POST["check"]);
				for ($i=0;$i<=$numreg-1;$i++){
						mysql_query("DELETE FROM categorias WHERE idCategoria='".$_POST["check"][$i]."'",$link);
				}
				$msn='ue1';
			}
			break;

/*********************************  USUARIOS  **********************************************/		
		case 'usuarios':
			if($_POST["sw"]==1){
			
				// echo "entro a usuarios";
				// echo $_POST["id"];
				// exit();

			// $rs=mysql_query("SELECT * FROM usuario WHERE login='".$_POST["log"]."'",$link);
			$rs=mysql_query("SELECT * FROM usuario WHERE cod_usuario='".$_POST["id"]."'",$link);
			$numfilas=mysql_num_rows($rs);
			
	
			if($numfilas == 0 ){
				if ($_POST["estado"]=="on") {
					$valestado="1";
				}else{
					$valestado="0";
				}

				$rs=@mysql_query("set names utf8",$link);
          		@mysql_fetch_array($rs);
				$sql="INSERT INTO usuario(login, 
										  clave,
										  nombre,
										  apellidos,
										  dni,
										  direccion,
										  telefono,
										  correo,
										  cod_nivel, estado)

					         VALUES('".$_POST["login"]."','".
					         	       md5($_POST["clave"])."','".
					         	       $_POST["nombre"]."','".
					         	       $_POST["apellidos"]."','".
					         	       $_POST["dni"]."','".
					         	       $_POST["direccion"]."','".
					         	       $_POST["telefono"]."','".
					         	       $_POST["correo"]."',".
					         	       $_POST["codnivel"].",".$valestado.")";
				// echo $sql; exit();	
				@mysql_query($sql,$link);
				$msn='u1';				
				}
			else
			{ 
			
			$msg_error="Login ya existe, intente otro...";
			
			 }
			}elseif($_POST["sw"]==2){
				$rs=@mysql_query("set names utf8",$link);
          		@mysql_fetch_array($rs);
				
				if ($_POST["clave"]==$_POST["ant_clave"]) {
					$pass=$_POST["ant_clave"];
				}else{
					$pass=md5($_POST["clave"]);
				}

				if ($_POST["estado"]=="on") {
					$valestado="1";
				}else{
					$valestado="0";
				}

				$sql="UPDATE usuario 
					         SET login='".$_POST["login"].
					         "', clave='".$pass.
					         "', nombre='".$_POST["nombre"].
					         "', apellidos='".$_POST["apellidos"].
					         "', dni='".$_POST["dni"].
					         "', direccion='".$_POST["direccion"].
					         "', telefono='".$_POST["telefono"].
					         "', correo='".$_POST["correo"].
					         "', cod_nivel=".$_POST["codnivel"].
					         ", estado=".$valestado.
					         " WHERE cod_usuario='".$_POST["id"]."'";
				// echo $sql; exit();
				@mysql_query($sql,$link);
				$msn='u1';
	
			}else{
				$numreg=count($_POST["check"]);
				for ($i=0;$i<=$numreg-1;$i++){
						mysql_query("DELETE FROM usuario WHERE cod_usuario='".$_POST["check"][$i]."'",$link);
				}
				$msn='ue1';
			}
			break;

/************************ MENU PERMISOS ******************************************************/

		case 'mnu_permisos':
			if($_POST["sw"]==1){
			
			$rs=@mysql_query("SELECT * FROM mnu_permisos WHERE cod_nivel='".$_POST["id"]."'",$link);
			$numfilas=@mysql_num_rows($rs);
			
	
			if($numfilas == 0){

				// echo "no hay registros en mnu_permisos".$_POST["id"];
				// if ($_POST["estado"]=="on") {
				// 	$valestado="1";
				// }else{
				// 	$valestado="0";
				// }


				// $rs=@mysql_query("set names utf8",$link);
    //     @mysql_fetch_array($rs);
// INSERT INTO mnu_permisos (cod_nivel, desc_menu, est_menu) 
// VALUES ('2', 'Panel de control', '1'), 
// 	   	 ('2', 'Clientes', '1'),
// 	   	 ('2', 'Préstamos', '1'),
// 	   	 ('2', 'Prendas', '1'),
// 	   	 ('2', 'Historial', '1'),
// 	   	 ('2', 'Reportes', '1'),
// 	   	 ('2', 'Ayuda', '1');


				// echo $sql; exit();	
			//	@mysql_query($sql,$link);
				$msn='u1';				
				}
			else
			{ 
			
			$msg_error="Login ya existe, intente otro...";
			
			 }
			}elseif($_POST["sw"]==2){

				$rs=@mysql_query("SELECT * FROM mnu_permisos WHERE cod_nivel='".$_POST["id"]."'",$link);
				$numfilas=@mysql_num_rows($rs);

				if ($_POST["panel"]=="on") {$estpanel="1";}else{$estpanel="0";}
				if ($_POST["clientes"]=="on") {$estclie="1";}else{$estclie="0";}
				if ($_POST["prestamos"]=="on") {$estpresta="1";}else{$estpresta="0";}
				if ($_POST["prendas"]=="on") { $estprenda="1";}else{ $estprenda="0";}
				if ($_POST["historial"]=="on") {$esthistorial="1";}else{$esthistorial="0";}
				if ($_POST["reportes"]=="on") {$estreportes="1";}else{$estreportes="0";}
				if ($_POST["ayuda"]=="on") {$estayuda="1";}else{$estayuda="0";}


				if($numfilas == 0){
					// echo "no hay registros en mnu_permisos para nivel =".$_POST["id"];
					// exit();
					$sql = "INSERT INTO mnu_permisos (cod_nivel, desc_menu, est_menu) 
									VALUES ('".$_POST["id"]."', 'Panel de control', ".$estpanel."), 
						   	 				 ('".$_POST["id"]."', 'Clientes', ".$estclie."),
						   	 				 ('".$_POST["id"]."', 'Préstamos', ".$estpresta."),
						   	 				 ('".$_POST["id"]."', 'Prendas', ".$estprenda."),
						   	 				 ('".$_POST["id"]."', 'Historial', ".$esthistorial."),
						   	 				 ('".$_POST["id"]."', 'Reportes', ".$estreportes."),
						   	 				 ('".$_POST["id"]."', 'Ayuda', ".$estayuda.")";
		   	 	// echo $sql;
		   	 	// exit();			 
					@mysql_query($sql,$link);


				}else{

									// $rs=@mysql_query("set names utf8",$link);
    //     @mysql_fetch_array($rs);


					$sql = "UPDATE mnu_permisos 
									SET est_menu = '".$estpanel."' WHERE mnu_permisos.codMnuPrestamo = ".$_POST["panelh"];
					@mysql_query($sql,$link);

					$sql = "UPDATE mnu_permisos 
									SET est_menu = '".$estclie."' WHERE mnu_permisos.codMnuPrestamo = ".$_POST["clientesh"];
					@mysql_query($sql,$link);

					$sql = "UPDATE mnu_permisos 
									SET est_menu = '".$estpresta."' WHERE mnu_permisos.codMnuPrestamo = ".$_POST["prestamosh"];
					@mysql_query($sql,$link);

					$sql = "UPDATE mnu_permisos 
									SET est_menu = '".$estprenda."' WHERE mnu_permisos.codMnuPrestamo = ".$_POST["prendash"];
					@mysql_query($sql,$link);

					$sql = "UPDATE mnu_permisos 
									SET est_menu = '".$esthistorial."' WHERE mnu_permisos.codMnuPrestamo = ".$_POST["historialh"];
					@mysql_query($sql,$link);

					$sql = "UPDATE mnu_permisos 
									SET est_menu = '".$estreportes."' WHERE mnu_permisos.codMnuPrestamo = ".$_POST["reportesh"];
					@mysql_query($sql,$link);

					$sql = "UPDATE mnu_permisos 
									SET est_menu = '".$estayuda."' WHERE mnu_permisos.codMnuPrestamo = ".$_POST["ayudah"];
					@mysql_query($sql,$link);


				$msn='u1';

				}


	
			}else{
				$numreg=count($_POST["check"]);
				for ($i=0;$i<=$numreg-1;$i++){
						mysql_query("DELETE FROM usuario WHERE cod_usuario='".$_POST["check"][$i]."'",$link);
				}
				$msn='ue1';
			}
			break;

/***********************  PRODUCTOS  ******************************************************/

case 'productos':

	if($_POST["sw"]==1){
			
	$rs=mysql_query("SELECT * FROM productos WHERE codProducto='".$_POST["id"]."'",$link);
	$numfilas=mysql_num_rows($rs);
			
			//move_uploaded_file($_FILES[imag][tmp_name],"Productos/img".$_POST["id"].".jpg");

			// $temporal=$_FILES['imag']['tmp_name'];
			// $nombre=$_FILES['imag']['name'];
			
			// move_uploaded_file($temporal,"../productos/".$nombre);
			   
			// if ($nombre=="")
			//   {   
			//    $nombre ="no_image.png";
			//   }

			/*			move_uploaded_file($_FILES[imag][tmp_name],"../../imagenes/Productos/img".$_POST["id"]);*/
			// cod_producto, descripcion, cod_subcat, precio, imagen, stock, cod_marca, prom
			// cod_producto, descripcion, cod_subcat, precio, imagen, stock, cod_marca, estado, igv			
	
			$rs=@mysql_query("set names utf8",$link);
			$fila=@mysql_fetch_array($rs);

			mysql_query("INSERT INTO productos (nombreComercial, tecnologia, estadoProducto)
						 VALUES('".$_POST["nombreprod"]."','" 
     								  .$_POST["tecno"]."', 1)",$link);
			$msn='p1';
	
			}	
			elseif($_POST["sw"]==2){


			 //   $temporal=$_FILES['imag']['tmp_name'];
			 //   $nombre=$_FILES['imag']['name'];
			   
			 //   $ruta=$nombre;
			   
			 //   if ($nombre =="")
				// {
				//  $ruta=$_POST["imgDef"];
				// }
			
			   // move_uploaded_file($temporal,"../productos/".$nombre);
	
				$rs=@mysql_query("set names utf8",$link);
				$fila=@mysql_fetch_array($rs);
				
				mysql_query("UPDATE productos SET nombreComercial='".$_POST["nombreprod"].
											 "', tecnologia='".$_POST["tecno"].
											 "' WHERE codProducto=".$_POST["id"],$link);
				$msn='p1';
				
	
			}else{
				$numreg=count($_POST["check"]);
				for ($i=0;$i<=$numreg-1;$i++){
								
					if($numfilas==0 && $numfilas1==0 ){
						mysql_query("DELETE FROM productos WHERE codProducto='".$_POST["check"][$i]."'",$link);

						
					}
				}
				$msn='e1';
			}
			break;


/***************************** Fin de Case *********************************************************/
									
	}
	// header($loc.'?msn='.$msn);
	header('location: main.php'.'?msn='.$msn)
?>