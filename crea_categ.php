<?php
$miArchivo = fopen("categorias.php", "w") or die("No se puede abrir/crear el archivo!");

$php = "
<?php include 'inc_seguridad.php'; ?>
<?php include 'funciones.php'; ?>
      
  <div class=\"outer\">
    <div class=\"inner bg-light lter\">

<?php 
  include(\"conectar.php\");
  \$link=Conectarse();
  \$pag = \"GESTION DE USUARIOS\";
?>
      

    </div>  
  </div>  

<?php 

echo \"hanntronico\";

?>

<table>
	<caption>table title and/or explanatory text</caption>
	<thead>
		<tr>
			<th>header</th>
			<th>header</th>
			<th>header</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>data</td>
			<td>data</td>
			<td>data</td>
		</tr>
	</tbody>
</table>


";

// fwrite($miArchivo, $php);
// fclose($miArchivo);


?>