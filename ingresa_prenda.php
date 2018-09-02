<?php

// echo "aca va lo que seleccionaste ".$_GET["id"];

?>
<!-- descripcion
marca
modelo
serie
observaciones
avaluo
prestamo -->


<!-- idPrenda	prenda_descrip	prenda_marca	prenda_modelo	prenda_serie	prenda_observ	prenda_avaluo	prenda_prest	idTipo	prenda_estado -->



<div class="col-lg-12">
	<div>	

		<div class="form-group">
		  <label for="text2" class="control-label col-lg-3">Descripción :</label>
		  <div class="col-lg-5">
		    <!-- <input type="text" name="prenda_descrip" id="prenda_descrip" value="<?=$prenda_descrip?>" placeholder="Descripción" class="validate[required] form-control"> -->
		    <input type="text" name="prenda_descrip" id="prenda_descrip" value="<?=$prenda_descrip?>" placeholder="Descripción" class="form-control">
			</div>
		</div>

		<div class="form-group">
	    <label for="text2" class="control-label col-lg-3">Marca :</label>
	    <div class="col-lg-5">
	      <!-- <input type="text" name="prenda_marca" id="prenda_marca" value="<?=$prenda_marca?>" placeholder="Marca" class="validate[required] form-control"> -->
	      <input type="text" name="prenda_marca" id="prenda_marca" value="<?=$prenda_marca?>" placeholder="Marca" class="form-control">
			</div>
		</div>

	  <div class="form-group">
	    <label for="text2" class="control-label col-lg-3">Modelo :</label>
	    <div class="col-lg-5">
	      <!-- <input type="text" name="prenda_modelo" id="prenda_modelo" value="<?=$prenda_modelo?>" placeholder="Modelo" class="validate[required] form-control"> -->
	      <input type="text" name="prenda_modelo" id="prenda_modelo" value="<?=$prenda_modelo?>" placeholder="Modelo" class="form-control">
			</div>
		</div>

	  <div class="form-group">
	    <label for="text2" class="control-label col-lg-3">Serie :</label>
	    <div class="col-lg-5">
	      <!-- <input type="text" name="prenda_serie" id="prenda_serie" value="<?=$prenda_serie?>" placeholder="Serie" class="validate[required] form-control"> -->
	      <input type="text" name="prenda_serie" id="prenda_serie" value="<?=$prenda_serie?>" placeholder="Serie" class="form-control">
			</div>
		</div>

	  <div class="form-group">
	    <label for="text2" class="control-label col-lg-3">Observaciones :</label>
	    <div class="col-lg-5">
	    	<!-- <textarea name="prenda_observ" id="prenda_observ" value="<?=$prenda_observ?>" class="validate[required] form-control"></textarea> -->
	    	<textarea name="prenda_observ" id="prenda_observ" value="<?=$prenda_observ?>" class="form-control"></textarea>
			</div>
		</div>

	  <div class="form-group">
	    <label for="text2" class="control-label col-lg-3">Avalúo :</label>
	    <div class="col-lg-5">
	      <!-- <input type="text" name="prenda_avaluo" id="prenda_avaluo" value="<?=$prenda_avaluo?>" placeholder="Avalúo" class="validate[required] form-control">	    	 -->
	      <input type="text" name="prenda_avaluo" id="prenda_avaluo" value="<?=$prenda_avaluo?>" placeholder="Avalúo" class="form-control">	    	
			</div>
		</div>

	  <div class="form-group">
	    <label for="text2" class="control-label col-lg-3">Préstamo :</label>
	    <div class="col-lg-5">
	      <!-- <input type="text" name="prenda_prest" id="prenda_prest" value="<?=$prenda_prest?>" placeholder="Préstamo" class="validate[required] form-control">	    	 -->
	      <input type="text" name="prenda_prest" id="prenda_prest" value="<?=$prenda_prest?>" placeholder="Préstamo" class="form-control">	    	
			</div>
		</div>		

	  <div class="form-group">
	    <div class="col-lg-8">
	      <a href="javascript:;" id="btnOtraPrenda" class="btn btn-danger btn-round btn-grad">
		      <i class="fa fa-plus-square"></i>
		    	Agregar prenda
		    </a>
	      <a href="javascript:;" id="btnLimpiaPrenda" class="btn btn-danger btn-round btn-grad">
		      <i class="fa fa-eraser"></i>
		    	Limpiar
		    </a>
	    </div>

	    <div class="col-lg-8">
				<div id="lista_prendas"><!-- Aquí se mostrarán los parámetros enviados --></div>	    	
	    </div>
	    
	  
	  </div>

	</div>  

</div>

<script src="assets/js/hann.js" type="text/javascript" charset="utf-8"></script>

<!-- 	<div class="form-group">
		<div class="col-lg-5">
		  <a href="javascript:;" id="btnOtraPrenda" class="btn btn-danger btn-round btn-grad">
	      <i class="fa fa-plus-square"></i>
	    	Agregar otra prenda
	    </a>
    </div>
  </div>   -->

<!-- <div id="ing_prenda2" class="form-group"></div> -->



<!--     <label class="col-lg-3">Fecha de Préstamo :</label>
    <div class="col-lg-5">
			<div class="input-group input-append date" id="dp3" data-date="<?=$fecPrest?>" data-date-format="yyyy-mm-dd">
	      <input type="text" class="form-control" name="fecPrest"  value="<?=$fecPrest?>">
	      <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span>
    	</div>         	
    </div> -->