<?php
$miArchivo = fopen("a1.php", "w") or die("No se puede abrir/crear el archivo!");

//Creamos una variable personalizada
$var = "testDatosPersonalizados";



$php = "<?php 
echo \"hola mundo\";

// Esto sería un comentario

// Un bucle para probar que funciona.
for (\$i=0; \$i < 10; \$i++) { 
	echo \$i;
}

// Creamos una variable y probamos que funciona con la variable creada anteriormente
\$variable = \"".$var."\";

// Damos un salto de linea para que sea más legible
echo \"<br>\";

// Mostramos la variable que acabamos de crear.
echo \$variable;


?>";

fwrite($miArchivo, $php);
fclose($miArchivo);
?>