<?php 
    include("funciones.php");
    include("conectar.php");
    $link=Conectarse();
    // echo $_GET["id"];

    list($dia,$mes,$anio)=explode("/",$_GET["fci"]); 
    $fec_ini = $anio."-".$mes."-".$dia;

    list($dia,$mes,$anio)=explode("/",$_GET["fcf"]); 
    $fec_fin = $anio."-".$mes."-".$dia;

    if ($_GET["pr1"]!="") {
      $sql="SELECT pe.cod_pedido, 
                   u.cod_usuario, 
                   concat(u.nombre, ' ', u.apellidos) as usuario, 
                   pe.fecpedido, 
                   pe.tipo_pago, 
                   pe.fec_entrega, 
                   pe.hora_entrega, 
                   pe.comprob, 
                   pe.rs_clie, 
                   pe.ruc_clie 
          from comprobante c inner join pedidos pe
          on c.cod_pedido = pe.cod_pedido
          inner join usuario u
          on pe.cod_usuario = u.cod_usuario
          where (concat(u.nombre, ' ', u.apellidos) like '".$_GET["pr1"]."%'
          or u.cod_usuario like '".$_GET["pr1"]."%')";
              // echo $sql; exit();
        $titulo = "CLIENTE : ".$_GET["pr1"];
    }

    if ($_GET["fci"]!="" && $_GET["fcf"]!="") {
      $sql="select pe.cod_pedido, 
                   u.cod_usuario, 
                   concat(u.nombre, ' ', u.apellidos) as usuario, 
                   pe.fecpedido, 
                   pe.tipo_pago, 
                   pe.fec_entrega, 
                   pe.hora_entrega, 
                   pe.comprob, 
                   pe.rs_clie, 
                   pe.ruc_clie 
            from comprobante c inner join pedidos pe
            on c.cod_pedido = pe.cod_pedido
            inner join usuario u
            on pe.cod_usuario = u.cod_usuario
            where pe.fecpedido between '".$fec_ini."' AND '".$fec_fin."'";
      $titulo = "Fechas : ".$fec_ini." al ".$fec_fin;        
    }

 // echo $sql; exit();


 ?>
<style type="text/css" media="screen">
@media screen {
  * {
      /*color: #ff0000;*/
      font-family: sans-serif;
      font-size: 10px;
    }

  .tbl {
    border: none;
    padding: 0;
    margin: 0;
    width: 100%
  }

  .tbl01 tr td {
    border: 1px solid #CECECE;
    margin: 0px;
    padding: 4px;
  }
  #impresora { 
    border: 1px solid #CECECE;
    width: 100%
  }
}
</style>

<style type="text/css" media="print">
@media print {

* {
    color: #000000;
    font-family: Arial;
    font-size: 10px;
}

body {
  text-align: center;
  margin: 0px auto;
  padding-top: 20px;
  padding-left: 30px;
}

.tbl {
  border: none;
  padding: 0;
  margin: 0;
  width: 90%
}

.tbl01 {
  width: 100%;
}

.tbl01 thead th{
  background: #C0C0C0;
  border: 1px solid #CECECE;
}

.tbl01 tr td {
  border: 1px solid #CECECE;
  margin: 0px;
  padding: 4px;
}

#impresora {display:none;}
}
</style>

  <table class="tbl">
      <thead>
        <tr>
          <th colspan="3">&nbsp;
            Mercado Virtual <br> 
            REPORTE DE VENTAS <?php echo $titulo; ?> <br><br>
          </th>
        </tr>
      </thead>

      <tr>
        <td>

        <table cellpadding="0" cellspacing="0" class="tbl01">
          <colgroup>
            <col class="con1" style="width: 5%"/>
            <col class="con1" style="width: 6%"/>
            <col class="con0" style="width: 30%" />
            <col class="con1" style="width: 10%" />
            <col class="con1" style="width: 8%" />
            <col class="con0" style="width: 8%" />
            <col class="con0" style="width: 8%" />
            <col class="con0" style="width: 8%" />
          </colgroup>
          <thead>
            <tr>
              <th class="head1">COD</th>
              <th class="head1">Cod. Us.</th>
              <th class="head1">Usuario</th>
              <th class="head1">Fecha Pedido</th>
              <th class="head1">Hora Pedido</th>
              <th class="head1">T. Pago</th>
              <th class="head1">Fec. Entrega</th>
              <th class="head1">Hora Entrega</th>
            </tr>
          </thead>

          <tbody>

          <?php 

              $rs=@mysql_query("set names utf8",$link);
              $fila=@mysql_fetch_array($res);

              $res=@mysql_query($sql,$link);
              // echo $sql;exit();

              while($row1=@mysql_fetch_array($res))
              {$i++;
          ?>  

              <tr class="gradeX">
                <td align="center"><?php echo $row1[0]; ?></td>
                <td align="center"><?php echo $row1[1]; ?></td>
                <td><?php echo $row1[2]; ?></td>
                <td><?php echo dma_shora($row1[3]); ?></td>
                <td><?php echo substr($row1[3], 11, 8); ?></td>
                <td><?php if ($row1[4]=="E") {
                  echo "Efectivo";
                }else {echo "Tarjeta";} ?></td>
                <td><?php echo dma_shora($row1[5]); ?></td>
                <td><?php echo $row1[6]; ?></td>
              </tr>
          <?php } ?>    
<!--               <tr>
                <td colspan="8">
                  
                </td>
              </tr> -->

            </tbody>
          </table>
        </td>    
      </tr>
    </table>
    <p align="left">Reporte del <?php echo date("Y-m-d H:i:s"); ?></p>
    <div id="impresora">
      <button onclick="javascript:print(document.overviewhead);">
      <img src="images/print.png"  /></button>
    </div>