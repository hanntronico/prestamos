<?php 

  function llenarcombo($tabla,$campos,$condicion,$seleccionado,$parametroselect,$name){
      Global $link;
      $rs=@mysql_query("set names utf8",$link);
      $fila=@mysql_fetch_array($res);

      $rs = mysql_query("select $campos from $tabla".$condicion,$link);
      echo "<select name=".$name." ".$parametroselect." data-placeholder='Seleccione ".$tabla."...' class='form-control chzn-select' tabindex='2'>";
        echo "<option value=''></option>";
        while($cur = mysql_fetch_array($rs)){
          $seleccionar="";
          if($cur[0]==$seleccionado) $seleccionar="selected";
          echo "<option value=".$cur[0]." ".$seleccionar.">".$cur[1]."</option>";
        }
      echo "</select>";
      @mysql_free_result($rs);
  }


  function autogenerado($tabla,$campocodigo,$numcaracteres){
    Global $link;
    //para extraer de la derecha se multiplica por -1
    $numcaracteres=$numcaracteres*(-1);
    $rsTabla=@mysql_query("select count($campocodigo) from $tabla",$link);
    $ATabla=@mysql_fetch_array($rsTabla);
    $nreg=$ATabla[0];
    if($nreg>0) {
      $rsTabla=mysql_query("select $campocodigo from $tabla",$link);
      mysql_data_seek($rsTabla,$nreg-1);
      $ATabla=mysql_fetch_array($rsTabla);
    }
    
    $cod=$ATabla[0]+1;
    $cod="0000000000".$cod;
    $generado=substr($cod,$numcaracteres);
    @mysql_free_result($rsTabla);
    
    return $generado;
  }


function autogenerado2($tabla,$campocodigo,$numcaracteres){
    Global $link;
    //para extraer de la derecha se multiplica por -1
    $numcaracteres=$numcaracteres*(-1);
    $rsTabla=mysql_query("select count($campocodigo) from $tabla",$link);
    $ATabla=mysql_fetch_array($rsTabla);
    $nreg=$ATabla[0];
    if($nreg>0) {
      $rsTabla=mysql_query("select $campocodigo from $tabla",$link);
      mysql_data_seek($rsTabla,$nreg-1);
      $ATabla=mysql_fetch_array($rsTabla);
    }

    $cod=substr($ATabla[0],1)+1;
    $cod="0000000000".$cod;
    $generado="T".substr($cod,$numcaracteres);
    mysql_free_result($rsTabla);
    
    return $generado;
  }

function autogenerado3($tabla,$campocodigo,$numcaracteres){
    Global $link;

    $numcaracteres=$numcaracteres*(-1);
    $rsTabla=mysql_query("select MAX($campocodigo) from $tabla",$link);
    $ATabla=mysql_fetch_array($rsTabla);
    $nreg=$ATabla[0];

    $cod=substr($ATabla[0],1)+1;
    $cod="0000000000".$cod;
    $generado="T".substr($cod,$numcaracteres);
    mysql_free_result($rsTabla);
    
    return $generado;
  }

  function dma_shora($fec)
    {
      list($fecha,$hora)=explode(" ",$fec);
      list($anio,$mes,$dia)=explode("-",$fecha); 
      $fecresult = $dia."/".$mes."/".$anio;
      return $fecresult;
    }

  function dma_chora($fec)
    {
      list($fecha,$hora)=explode(" ",$fec);
      list($anio,$mes,$dia)=explode("-",$fecha); 
      $fecresult = $dia."/".$mes."/".$anio." - ".$hora;
      return $fecresult;
    }

  function fechas_hann($fecha)
  {
    list($dia,$mes,$anio)=explode("/",$fecha); 
    $fec_em = $anio."-".$mes."-".$dia;
    return $fec_em;
  }    

  function extrae($cadena,$num_caracteres){
      //Extracto de los primeros numeros de caracteres definidos en $num_caracteres;
      $cadena_ext = substr($cadena,0, $num_caracteres);
      //Si el extracto ya viene con palabra completa no necesita buscar la siguiente palabra
      if($cadena[$num_caracteres] != " "){
          $sub_cadena = substr($cadena,$num_caracteres, ($tam_cadena - $num_caracteres));
          $miarray = explode (' ', $sub_cadena);
          $res_sub_cadena = $miarray[0];
      }
      $cad = $cadena_ext.$res_sub_cadena;             
      return $cad;    
  }

  function interval_date($init,$finish)
  {
      //formateamos las fechas a segundos tipo 1374998435
      $diferencia = strtotime($finish) - strtotime($init);
   
      //comprobamos el tiempo que ha pasado en segundos entre las dos fechas
      //floor devuelve el número entero anterior, si es 5.7 devuelve 5
      if($diferencia < 60){
          $tiempo = "Hace " . floor($diferencia) . " segundos";
      }else if($diferencia > 60 && $diferencia < 3600){
          $tiempo = "Hace " . floor($diferencia/60) . " minutos'";
      }else if($diferencia > 3600 && $diferencia < 86400){
          $tiempo = "Hace " . floor($diferencia/3600) . " horas";
      }else if($diferencia > 86400 && $diferencia < 2592000){
          $tiempo = "Hace " . floor($diferencia/86400) . " días";
      }else if($diferencia > 2592000 && $diferencia < 31104000){
          $tiempo = "Hace " . floor($diferencia/2592000) . " meses";
      }else if($diferencia > 31104000){
          $tiempo = "Hace " . floor($diferencia/31104000) . " años";
      }else{
          $tiempo = "Error";
      }
      return $tiempo;
  }


  function fechas_espanol($mes)
  {
    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $mes_corto = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
 
    // echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;

    return $mes_corto[$mes-1];
  }

 function fechas_espanol_2($sw,$dat){
    $dias = array("Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $mes_corto = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");

    if ($sw==1) {
      $dato = $dias[$dat-1];
    }elseif ($sw==2) {
      $dato = $meses[$dat-1];
    }elseif ($sw==3) {
      $dato = $mes_corto[$dat-1];
    }
    return $dato;
 }

  function hannquery($consulta,$enlace)
    {
      $rs=@mysql_query("set names utf8",$enlace);
      @mysql_fetch_array($rs);
      $resultado = @mysql_query($consulta,$enlace);
      return $resultado;
    }

?>