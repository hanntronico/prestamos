<?php 
  session_start();
  include("conectar.php");
  $link=Conectarse();

  include 'funciones.php';

	date_default_timezone_set('America/Lima');

  $rs=@mysql_query("set names utf8",$link);
  $fila=@mysql_fetch_array($res);
  $sql="SELECT * FROM categorias WHERE idCategoria = ".$_GET["id"]." AND categ_estado=1"; 
  $res=@mysql_query($sql,$link);
  $fila =mysql_fetch_object($res);

						$id = $fila->idCategoria;
		$catdescrip = $fila->cate_descrip;
 		 $catobserv = $fila->categ_observ;
  $categperiodo = $fila->categ_periodo;
	  $categplazo = $fila->categ_plazo;
		$catinteres = $fila->categ_interes;
 		 $catestado = $fila->categ_estado;

$fecha = fechas_hann($_GET["fec"]);
$nuevafecha = strtotime ( '+'.$categplazo*$categperiodo.' day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-d' , $nuevafecha );

?>

<div class="col-lg-12">
	<div class="box" style="padding: 10px;">
		<?php echo "En la categoría de <b>".$catdescrip."</b> se maneja un interés de ".$catinteres."%, durante ".$categplazo." plazo(s) de ".$categperiodo." días ".dma_shora($nuevafecha); 
			$_SESSION["catinteres"] = $catinteres;
		?>
		<input type="hidden" name="fecvenc" id="fecvenc" value="<?php echo $nuevafecha;?>">

	</div>
</div>