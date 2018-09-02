<?php
	include("funciones/function.php");
	include("conectar.php");
	$link=Conectarse();
	$loc="location: ".$_POST["pag"].".php";
  $varnull=NULL;
	// echo $loc; echo "--".$_POST["pag"]; echo "   sw: ".$_POST["sw"];  exit();

	switch ($_POST["pag"]) {

		case 'aproba2':

			if($_POST["sw"]==1){
				// echo "entro a aproba2 con sw: ".$_POST["sw"]."<br>";

				// echo $_POST["nombre"]."<br>";
				// echo $_POST["apepat"]."<br>";
				// echo $_POST["apemat"]."<br>";
				// echo $_POST["dni"]."<br>";
				// echo $_POST["telefono"]."<br>";
				// echo $_POST["email"]."<br>";

				// echo "id: ".$_POST["id"]."<br>";
				// echo "codProd: ".$_POST["codProd"]."<br>";
				// echo "nrosec: ".$_POST["nrosec"]."<br>";
				// echo "fecaaprob: ".$_POST["fecaprob"]."<br>";
				// echo "codPlan: ".$_POST["codPlan"]."<br>";
				// echo "operacion: ".$_POST["operacion"]."<br>";
				// echo "canal: ".$_POST["canal"]."<br>";
				// echo "comentario: ".$_POST["comentario"]."<br>";
				// echo "codCiudad: ".$_POST["codCiudad"]."<br>";


				$rs=@mysql_query("set names utf8",$link);
        @mysql_fetch_array($rs);

				$sql="INSERT INTO clientes(nomClie,
                         				   apepatClie,
                         				   apematClie,
                         				   nroDNI,
                         				   nroSec,
                         				   telefono,
                         				   email,
                         				   nomInbox,
                         				   estClie) 
					         VALUES('".strtoupper($_POST["nombre"])."','".
					         	       strtoupper($_POST["apepat"])."','".
					         	       strtoupper($_POST["apemat"])."','".
					         	       $_POST["dni"]."','".
					         	       $_POST["nrosec"]."','".
					         	       $_POST["telefono"]."','".
					         	       $_POST["email"]."','".
					         	       ""."',1)";
				// echo $sql; exit();
				@mysql_query($sql,$link);

				$sql="SELECT codCliente FROM clientes WHERE nroDNI='".$_POST["dni"]."'";
				$res = @mysql_query($sql,$link);
        $row1 = @mysql_fetch_array($res);
        $numfilas=@mysql_num_rows($res);

		        if ($numfilas > 0) {
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
																							campania, 
																							canal, 
																							fechaAContac, 
																							comentario, 
																							codCiudad, 
																							estOport) 
										VALUES (".$row1[0].", ".
											      $_POST["codProd"].", '".
										    	  $_POST["nrosec"]."', '".
											      $_POST["fecaprob"]."', ".
											      $_POST["codPlan"].", '".
										    	  $_POST["operacion"]."', '".
										    	  $_POST["camp"]."', '".
										      	$_POST["canal"]."', '".
										     	  $fechaAContac."', '".
										      	$_POST["comentario"]."', ".
											  	  $_POST["codCiudad"].", "."1)";

											  // echo $sql; exit();	
												@mysql_query($sql,$link);						
		        }
		    }elseif($_POST["sw"]==2){

		    			$rs=@mysql_query("set names utf8",$link);
			        @mysql_fetch_array($rs);

							$sql="UPDATE clientes 
								         SET nomClie='".strtoupper($_POST["nombre"]).
								         "', apepatClie='".strtoupper($_POST["apepat"]).
								         "', apematClie='".strtoupper($_POST["apemat"]).
								         "', nroSec='".$_POST["nrosec"].
								         "', nroDNI='".$_POST["dni"].
								         "', telefono='".$_POST["telefono"].
								         "', email='".$_POST["email"].
								         "' WHERE codCliente='".$_POST["id"]."'";
							// echo $sql; exit();
							@mysql_query($sql,$link);


							$sql="UPDATE oportunidades SET codProducto=".$_POST["codProd"].", 
																					   nroSec='".$_POST["nrosec"]."',
																					   fechaAproba='".$_POST["fecaprob"]."',
																					   codPlan=".$_POST["codPlan"].",
																					   operacion='".$_POST["operacion"]."',
																					   campania='".$_POST["camp"]."',
																					   canal='".$_POST["canal"]."',
																					   comentario='".$_POST["comentario"]."',
																					   codCiudad=".$_POST["codCiudad"]." WHERE codCliente=".$_POST["id"];
							@mysql_query($sql,$link);														   
		    }


        // echo $row1[0];

				// exit();

		break;
/*****************************************************************************************************************************/

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

								  // echo $sql; exit();	
									@mysql_query($sql,$link);
 
				$consulta="SELECT codOportunidad from oportunidades where codCliente=".$_POST[id];
				$rs=@mysql_query($consulta,$link);
				$numfilas=@mysql_num_rows($rs);

				// echo $numfilas; exit();

					if($numfilas > 0){
						$sql="UPDATE clientes 
					         SET nroSec='".$_POST["nrosec"].
					         "' WHERE codCliente='".$_POST["id"]."'";
						// echo $sql; exit();
						@mysql_query($sql,$link);

					}

				}

				break;
/********************************************  CLIENTES  ***********************************************/

		case 'clientes':
			if($_POST["sw"]==1){
			
			$rs=@mysql_query("SELECT * FROM clientes WHERE codCliente='".$_POST["id"]."'",$link);
			$numfilas=@mysql_num_rows($rs);

			

			if($numfilas == 0 ){

				$rs=@mysql_query("set names utf8",$link);
          		@mysql_fetch_array($rs);

				$sql="INSERT INTO clientes(nomClie,
                         				   apepatClie,
                         				   apematClie,
                         				   nroDNI,
                         				   nroSec,
                         				   telefono,
                         				   email,
                         				   nomInbox,
                         				   estClie) 
					         VALUES('".strtoupper($_POST["nombre"])."','".
					         	       strtoupper($_POST["apepat"])."','".
					         	       strtoupper($_POST["apemat"])."','".
					         	       $_POST["dni"]."',".
					         	       "NULL".",'".
					         	       $_POST["telefono"]."','".
					         	       $_POST["email"]."','".
					         	       ""."',1)";
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
				

				$sql="UPDATE clientes 
					         SET nomClie='".strtoupper($_POST["nombre"]).
					         "', apepatClie='".strtoupper($_POST["apepat"]).
					         "', apematClie='".strtoupper($_POST["apemat"]).
					         "', nroDNI='".$_POST["dni"].
					         "', telefono='".$_POST["telefono"].
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

/********************************************  USUARIOS   ***********************************************/

		case 'planes':
			if($_POST["sw"]==1){
			

			$rs=@mysql_query("SELECT * FROM planes WHERE plan_desc='".$_POST["plan"]."'",$link);
			$numfilas=@mysql_num_rows($rs);

			// echo "entro a planes";
			// exit();

			if($numfilas == 0 ){

				$rs=@mysql_query("set names utf8",$link);
          		@mysql_fetch_array($rs);

				$sql="INSERT INTO planes(plan_desc,
                         				 plan_Observ,
                         				 estadoPlan) 
					         VALUES('".$_POST["plan"]."','".
					         	       $_POST["observ"]."', 1)";
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
				

				$sql="UPDATE planes 
					         SET plan_desc='".$_POST["plan"].
					         "', plan_Observ='".$_POST["observ"].
					         "' WHERE codPlan='".$_POST["id"]."'";
				// echo $sql; exit();
				@mysql_query($sql,$link);
				$msn='u1';
	
			}else{

				$numreg=count($_POST["check"]);
				for ($i=0;$i<=$numreg-1;$i++){
						mysql_query("DELETE FROM planes WHERE codPlan='".$_POST["check"][$i]."'",$link);
				}
				$msn='ue1';
			}
			break;

/****************************************************************************************************************************/		
		case 'usuarios':
			if($_POST["sw"]==1){
			
				// echo $_POST["id"];
				// exit();

			// $rs=mysql_query("SELECT * FROM usuario WHERE login='".$_POST["log"]."'",$link);
			$rs=mysql_query("SELECT * FROM usuario WHERE cod_usuario='".$_POST["id"]."'",$link);
			$numfilas=mysql_num_rows($rs);
			
	
			if($numfilas == 0 ){
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
					         VALUES('".$_POST["log"]."','".
					         	       md5($_POST["clave"])."','".
					         	       $_POST["nombre"]."','".
					         	       $_POST["apellidos"]."','".
					         	       $_POST["dni"]."','".
					         	       $_POST["dir"]."','".
					         	       $_POST["tel"]."','".
					         	       $_POST["correo"]."','".
					         	       $_POST["codnivel"]."',1)";
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

				$sql="UPDATE usuario 
					         SET login='".$_POST["log"].
					         "', clave='".$pass.
					         "', nombre='".$_POST["nombre"].
					         "', apellidos='".$_POST["apellidos"].
					         "', dni='".$_POST["dni"].
					         "', direccion='".$_POST["dir"].
					         "', telefono='".$_POST["tel"].
					         "', correo='".$_POST["correo"].
					         "', cod_nivel='".$_POST["codnivel"].
					         "' WHERE cod_usuario='".$_POST["id"]."'";
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
				
/**********************************************************************************************************/

case 'productos':

	if($_POST["sw"]==1){
			
		// echo "entro a productos grabar";
		// exit();

// codProducto
// nombreComercial
// tecnologia
// estadoProducto

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


/*********************************************************************************************************/
									
	}
	// header($loc.'?msn='.$msn);
	header('location: main.php'.'?msn='.$msn)
?>