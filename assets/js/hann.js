    $("#opcTipo").change(function (){
        // alert($('#opcHann').val());

        // var content = jQuery("#hannconte");
        // content.fadeIn('slow').load("turbio.php");
		
			if($('#opcTipo').val()=='1'){
				var content = jQuery("#ing_prenda");	
        content.fadeIn('slow').load("ingresa_prenda.php?id=1");         
      }
      if($('#opcTipo').val()=='2'){
				var content = jQuery("#ing_prenda");	
        content.fadeIn('slow').load("ingresa_prenda.php?id=2");
      } 
    });


    $("#opcCateg").change(function (){
        var idcat = $('#opcCateg').val();
        var fec = $('#fecPrest').val();
        var content = jQuery("#descrip_categoria");
        content.fadeIn('slow').load("ver_categ.php?id="+idcat+"&fec="+fec);
    });

    $("#fecPrest").change(function (){
        var idcat = $('#opcCateg').val();
        if (idcat>=1) {
	        var fec = $('#fecPrest').val();
	        var content = jQuery("#descrip_categoria");
	        content.fadeIn('slow').load("ver_categ.php?id="+idcat+"&fec="+fec);
        }
        else{
        	return false;
        }
    });
        

/************************* envia post ******************/
		// $(document).ready(function()
		// {
		// 	$("#boton").click(function(){
		//         	$.post("turbio.php", {coche: "Ford", modelo: "Focus", color: "rojo"}, function(htmlexterno){
		//    $("#cargaexterna").html(htmlexterno);
		//     		});

		// 	});
		// });

/************************* envia post ******************/


		// $(document).ready(function()
		// {
			$("#btnOtraPrenda").click(function(){


		    if ($('#prenda_descrip').val()=="") {
		    	alert("Por favor llenar descripcion");
		    	exit();
		    }

		    if ($('#prenda_marca').val()=="") {
		    	alert("Por favor llenar marca");
		    	exit();
		    }

		    if ($('#prenda_modelo').val()=="") {
		    	alert("Por favor llenar modelo");
		    	exit();
		    }

		    if ($('#prenda_serie').val()=="") {
		    	alert("Por favor llenar serie");
		    	exit();
		    }

		    if ($('#prenda_avaluo').val()=="") {
		    	alert("Por favor llenar avalúo");
		    	exit();
		    }

		    if ($('#prenda_prest').val()=="") {
		    	alert("Por favor llenar préstamo");
		    	exit();
		    }		    

		    $.post("add_prenda.php", {descripcion: $('#prenda_descrip').val(), 
		    	                   						marca: $('#prenda_marca').val(), 
		    	                   					 modelo: $('#prenda_modelo').val(), 
		    	                   						serie: $('#prenda_serie').val(), 
		    	                   			observacion: $('#prenda_observ').val(), 
		    	                   					 avaluo: $('#prenda_avaluo').val(), 
		    	                   				 prestamo: $('#prenda_prest').val()}, function(htmlexterno){
		   			$("#lista_prendas").html(htmlexterno);
		    });

		    $('#prenda_descrip').val('');
		    $('#prenda_marca').val('');
				$('#prenda_modelo').val('');
				$('#prenda_serie').val('');
				$('#prenda_observ').val('');
				$('#prenda_avaluo').val('');
				$('#prenda_prest').val('');

			});
		// });


    // $("#btnOtraPrenda").click(function(e){
    		// alert($('#prenda_marca').val()+" - "+$('#prenda_descrip').val());
    	// var content = jQuery("#ing_prenda2");	
      //   content.fadeIn('slow').load("ingresa_prenda.php");
    // });

		$("#btnLimpiaPrenda").click(function(){
		    $.post("limpia_prenda.php", function(htmlexterno){
		   		$("#lista_prendas").html(htmlexterno);
		    });
		});

		// $("#btnBuscar").click(function() {
		// 	var content = jQuery("#cont_resultado");
  //     content.fadeIn('slow').load("busca_prenda.php?bus="+$('#bus_prenda').val());
  //     $('#bus_prenda').val('');			
		// });	


			$("#btnBuscar").click(function(){
			    $.post("busca_prenda.php", {busprenda: $('#bus_prenda').val()}, function(htmlexterno){
			   		$("#cont_resultado").html(htmlexterno);
			   		$('#bus_prenda').val('');
			    });
			    // console.log($('#bus_prenda').val());
			});


		$("#btnEnventa").click(function(){
		    $.post("busca_prenda.php", {sw: 2}, function(htmlexterno){
		   		$("#cont_resultado").html(htmlexterno);
		    });
		    // console.log("en venta");
		});
		
		$("#btnEmpenhados").click(function(){
		    $.post("busca_prenda.php", {sw: 1}, function(htmlexterno){
		   		$("#cont_resultado").html(htmlexterno);
		    });
		    // console.log("empeñados");
		});		
		
		// $("#btnTercero").click(function(){
		//     $.post("busca_prenda.php", {sw: 3}, function(htmlexterno){
		//    		$("#cont_resultado").html(htmlexterno);
		//     });
		//     // console.log("btnTercero");
		// });


		// $("#btnActivos").click(function(){
		//     $.post("turbio.php", {sw: 3}, function(htmlexterno){
		//    		$("#cont_resultado").html(htmlexterno);
		//     }).done(function(data, status) { 
		//     	$('#respuesta').html("");
		//     	$('#respuesta').append('status: ' + status + ', data: ' + data); 
		//     })
		//     .fail(function(jqxhr, settings, ex) { alert('failed, ' + ex); });
		//     // console.log("btnActivos");
		// });

		$("#btnActivos").click(function(){
		    $.post("busca_prestamos.php", {sw: 1}, function(htmlexterno){
		   		$("#cont_resultado_buspresta").html(htmlexterno);
		    });
		    // console.log("btnActivos");
		});

		$("#btnExpirados").click(function(){
		    $.post("busca_prestamos.php", {sw: 2}, function(htmlexterno){
		   		$("#cont_resultado_buspresta").html(htmlexterno);
		    });
		    // console.log("btnActivos");
		});

		$("#btnLiquidados").click(function(){
		    $.post("busca_prestamos.php", {sw: 3}, function(htmlexterno){
		   		$("#cont_resultado_buspresta").html(htmlexterno);
		    });
		    // console.log("btnActivos");
		});

		$("#btnCancelados").click(function(){
		    $.post("busca_prestamos.php", {sw: 0}, function(htmlexterno){
		   		$("#cont_resultado_buspresta").html(htmlexterno);
		    });
		    // console.log("btnActivos");
		});

		$("#btnVencidos").click(function(){
		    $.post("busca_prestamos.php", {sw: 4}, function(htmlexterno){
		   		$("#cont_resultado_buspresta").html(htmlexterno);
		    });
		    // console.log("btnActivos");
		});


		$("#pagointeres").click(function(){
		  $.post("modal_prestamo.php", {idPrestamo: $('#codPrestamo').val()}, function(htmlexterno){
		   	$("#content_modal").html(htmlexterno);
		  });
		    // console.log("btnActivos");
		});

		$("#btnPagarInteres").click(function(){
		  $.post("grabar_pagointeres.php", {idPrestamo: $('#codPrestamo').val(), 
		  																	montointeres: $('#montointeres').val()
																			 }, function(){
				// $("#content_modal_query").html(htmlexterno);
			});
		});

		$("#pagarliquidar").click(function(){
		  $.post("modal_liquidar.php", {idPrestamo: $('#codPrestamo').val()}, function(htmlexterno){
		   	$("#content_modal_liquidar").html(htmlexterno);
		  });
		    // console.log("btnActivos");
		  // alert("liquidar");  
		});

		$("#btnLiquidar").click(function(){
		  $.post("grabar_liquidar.php", {idPrestamo: $('#codPrestamo').val(), 
		  																	montoliquidar: $('#montoliquidar').val()
																			 }, function(){
				// $("#content_modal_query").html(htmlexterno);
			});
		});

		$("#aplicadescuento").click(function() {
		  $.post("modal_descuento.php", {
		  	idPrestamo: $('#codPrestamo').val()}, function(htmlexterno){
		   	$("#content_modal_dscto").html(htmlexterno);
		  });			
			// console.log("click en el botón aplicadescuento");
		});

		$("#btnPagarDscto").click(function() {
			$.post('grabar_dscto.php', {
				idPrestamo: $('#codPrestamo').val(),
			  dscto: $("#descuento").val()}, function() {
					// $("#content_modal_query").html(htmlexterno);
				/*optional stuff to do after success */
			});
			// console.log("boton de pagar dscto presionado");
		});

		$("#btnCancelarPrest").click(function() {
			$.post('grabar_estado.php', {
				idPrestamo: $('#codPrestamo').val(),
				sw: 0}, function() {
				// $("#content_modal_query").html(htmlexterno);
				/*optional stuff to do after success */
			});
			// console.log("Se presionó cancelar prestamo");
		});

		$("#btnMarcarExpirado").click(function() {
			$.post('grabar_estado.php', {
				idPrestamo: $('#codPrestamo').val(),
				sw: 2}, function() {
				// $("#content_modal_query").html(htmlexterno);
				/*optional stuff to do after success */
			});			
			// console.log("Boton Marcar Expirado presionado");
		});


    $("#opcContrato").change(function (){
    	var codPrestamo = $("#codPrest").val();
    	var codContrato = $("#opcContrato").val();
	   	// console.log(codContrato);
	   	// $("#idContrato").val(codContrato);
	 //   	var variableJS = "<?php session_start(); echo $_SESSION['id_contrato']; ?>" ;
		// document.write("VariableJS =" + variableJS);

			jQuery("#idContrato").val(codContrato);

			$("#contentFrame").html("<iframe src='print_contrato.php?id="+codPrestamo+"&codContra="+codContrato+"' style='display:none;' name='frame'></iframe>");

			// alert( jQuery("#idContrato").val() );
		    var content = jQuery("#div-2");
		    content.fadeIn('slow').load("write_contrato.php?id="+codPrestamo+"&idCont="+codContrato);
    });


    $("#btnEnviar").click(function() {
    	// alert("hann");
    	var vardesde = $('#fecDesde').val();
    	var varhasta = $('#fecHasta').val();
    	var opcConcepto = $('#opcConcepto').val();

		  $.post("ver_busqueda.php", {
			  	desde: vardesde, 
			  	hasta: varhasta,
			  	opcConcepto: opcConcepto
			  }, function(htmlexterno){
		   		$("#content_verbusca").html(htmlexterno);
		  	});    	
    }); 


		$("#btnRegDepo").click(function() {
			var cantidad = $('#cantidad').val();
			var descrip_deposito = $('#descripcion').val();
			var codConcepto = $('#codConcepto').val();

			$.post('grabar_deposito.php', {
				cantidad: cantidad,
			  descrip_deposito: descrip_deposito,
			  codConcepto: codConcepto
				}, function() {
					// $("#content_modal_hann").html(htmlexterno);
				/*optional stuff to do after success */
			});
			$('#cantidad').val("");
			$('#descripcion').val("");
			// console.log("boton de pagar dscto presionado");
		});


		$("#btnRegRetiro").click(function() {
			var cantiRet = $('#cantRet').val();
			var descripRetiro = $('#descripRet').val();
			var codConcepto = $('#codConcepRet').val();

			$.post('grabar_retiro.php', {
				cantidad: cantiRet,
			  descrip_retiro: descripRetiro,
			  codConcepto: codConcepto
				}, function() {
					// $("#content_modal_hann").html(htmlexterno);
				/*optional stuff to do after success */
			});
			$('#cantRet').val("");
			$('#descripRet').val("");
			// console.log("boton de pagar dscto presionado");
		});


		$("#btnRegGasto").click(function() {
			var cantiGast = $('#cantGast').val();
			var descripGasto = $('#descripGast').val();
			var codConcepGast = $('#codConcepGast').val();

			$.post('grabar_gasto.php', {
				cantidad: cantiGast,
			  descrip_gasto: descripGasto,
			  codConcepGast: codConcepGast
				}, function() {
					// $("#content_modal_hann").html(htmlexterno);
				/*optional stuff to do after success */
			});
			$('#cantGast').val("");
			$('#descripGast').val("");
			// console.log("boton de pagar dscto presionado");
		});



		// $("#btnGuardarImagen").click(function(){
		//  //  $.post("grabar_liquidar.php", {idPrestamo: $('#codPrestamo').val(), 
		//  //  																	montoliquidar: $('#montoliquidar').val()
		// 	// 																 }, function(){
		// 	// 	// $("#content_modal_query").html(htmlexterno);
		// 	// });
		// 	alert("boton guardar imagen");
		// });

	// $("#btnVerPrenda").click(function() {
	// 	// $.post("modal_verprenda.php", {idPrenda: 1}, function(htmlexterno){
	// 	//    	$("#cont_modal_verprenda").html(htmlexterno);
	// 	//   });
	// 	alert("link prenda");
	// });


 $("#form").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "grabar_imagen.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    //$("#preview").fadeOut();
    $("#err").fadeOut();
   },
   success: function(data)
      {
    if(data=='invalid')
    {
     // invalid file format.
     $("#err").html("Invalid File !").fadeIn();
    }
    else
    {
     // view uploaded file.
     $("#preview").html(data).fadeIn();
     $("#form")[0].reset(); 
    }
      },
     error: function(e) 
      {
    $("#err").html(e).fadeIn();
      }          
    });
 }));
