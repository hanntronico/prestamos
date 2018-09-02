function abrir(codigo)
{
 open("calendario.php?codigo="+ codigo +"","Calendario","width=280, height=230, top=250, left=300" );
}

function letras(e)
{ // 1

tecla = (document.all) ? e.keyCode : e.which; // 2
if (tecla==8) return true; // 3
patron =/[A-Za-z\s\Ñ\ñ\Á\É\Í\Ó\Ú\á\é\í\ó\ú\.\,]/; // 4
te = String.fromCharCode(tecla); // 5
return patron.test(te); // 6
} 

function numeros(n)
{ // 

tecla = (document.all) ? n.keyCode : n.which; // 2
if (tecla==8) return true; // 3
patron =/[0\1-9\-]/; // 4
te = String.fromCharCode(tecla); // 5
return patron.test(te); // 6
}

function validaFormProducto(frm){
	var campo = frm.des.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese descripcion de producto.");
		frm_producto.des.focus(); 
		return false;
	}
	
	var campo = frm.codcat.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese Subcategoria.");
		frm.codcat.focus(); 
		return false;
	}
	
	var campo = frm.pre.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese precio");
		frm.pre.focus(); 
		return false;
	}
	
	var campo = frm.stock.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese Stock");
		frm.stock.focus(); 
		return false;
	}


	var campo = frm.codmarca.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese Marca.");
		frm.codmarca.focus(); 
		return false;
	}

	return true;
} 

function validaFormCliAprob (frm) {
	
	var campo = frm.nombre.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Nombres de Cliente.");
		frm.nombre.focus(); 
		return false;
	}

	var campo = frm.apepat.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Apellido Paterno de Cliente.");
		frm.apepat.focus(); 
		return false;
	}
	
	var campo = frm.apemat.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Apellido Materno de Cliente.");
		frm.apemat.focus(); 
		return false;
	}

	var campo = frm.dni.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese DNI de Cliente.");
		frm.dni.focus(); 
		return false;
	}		

	var campo = frm.telefono.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Tel\u00E9fono de Cliente.");
		frm.telefono.focus(); 
		return false;
	}

	var campo = frm.nrosec.value;  
	if (campo=="") { 
        alert("Por Favor, ingrese Nro SEC");
		frm.nrosec.focus(); 
		return false;
	}

	var campo = frm.fecaprob.value;  
	if (campo=="") { 
        alert("Por Favor, ingrese fecha");
		frm.fecaprob.focus(); 
		return false;
	}

	var campo = frm.codPlan.value;  
	if (campo=="") { 
        alert("Por Favor, selecciona plan");
		frm.codPlan.focus(); 
		return false;
	}

	var campo = frm.operacion.value;  
	if (campo=="") { 
        alert("Por Favor, ingrese operación");
		frm.operacion.focus(); 
		return false;
	}

	var campo = frm.camp.value;  
	if (campo=="") { 
        alert("Por Favor, Selectione campaña");
		frm.camp.focus(); 
		return false;
	}

	var campo = frm.canal.value;  
	if (campo=="") { 
        alert("Por Favor, ingrese canal");
		frm.canal.focus(); 
		return false;
	}	

	var campo = frm.codProd.value;  
	if (campo=="") { 
        alert("Por Favor, seleccione Producto.");
		frm.codProd.focus(); 
		return false;
	}

	var campo = frm.codCiudad.value;  
	if (campo=="") { 
        alert("Por Favor, seleccione Ciudad.");
		frm.codCiudad.focus(); 
		return false;
	}

	var campo = frm.comentario.value;  
	if (campo=="") { 
        alert("Por Favor, ingrese comentario.");
		frm.comentario.focus(); 
		return false;
	}

	return true;	


}




function validaFormCliente(frm){

	var campo = frm.nombre.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Nombres de Cliente.");
		frm.nombre.focus(); 
		return false;
	}

	var campo = frm.apepat.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Apellido Paterno de Cliente.");
		frm.apepat.focus(); 
		return false;
	}
	
	var campo = frm.apemat.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Apellido Materno de Cliente.");
		frm.apemat.focus(); 
		return false;
	}

	var campo = frm.dni.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese DNI de Cliente.");
		frm.dni.focus(); 
		return false;
	}		

	var campo = frm.telefono.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Tel\u00E9fono de Cliente.");
		frm.telefono.focus(); 
		return false;
	}

	return true;
} 

function validaFormAprob(frm){

	var campo = frm.nrosec.value;  
	if (campo=="") { 
        alert("Por Favor, ingrese Nro SEC");
		frm.nrosec.focus(); 
		return false;
	}

	var campo = frm.fecaprob.value;  
	if (campo=="") { 
        alert("Por Favor, ingrese fecha");
		frm.fecaprob.focus(); 
		return false;
	}

	var campo = frm.codPlan.value;  
	if (campo=="") { 
        alert("Por Favor, selecciona plan");
		frm.codPlan.focus(); 
		return false;
	}

	var campo = frm.operacion.value;  
	if (campo=="") { 
        alert("Por Favor, ingrese operación");
		frm.operacion.focus(); 
		return false;
	}

	var campo = frm.canal.value;  
	if (campo=="") { 
        alert("Por Favor, ingrese canal");
		frm.canal.focus(); 
		return false;
	}	

	var campo = frm.codProd.value;  
	if (campo=="") { 
        alert("Por Favor, seleccione Producto.");
		frm.codProd.focus(); 
		return false;
	}

	var campo = frm.codCiudad.value;  
	if (campo=="") { 
        alert("Por Favor, seleccione Ciudad.");
		frm.codCiudad.focus(); 
		return false;
	}

	var campo = frm.comentario.value;  
	if (campo=="") { 
        alert("Por Favor, ingrese comentario.");
		frm.comentario.focus(); 
		return false;
	}

	return true;
} 

function validaFormPlan(frm){

	var campo = frm.plan.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese denominaci\xf3n del plan.");
		frm.plan.focus(); 
		return false;
	}

	var campo = frm.observ.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese observaci\xf3n del plan.");
		frm.observ.focus(); 
		return false;
	}



	return true;
} 

function validaFormProducto(frm){

	var campo = frm.nombreprod.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese nombre del Producto.");
		frm.nombreprod.focus(); 
		return false;
	}

	var campo = frm.tecno.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese tecnologia.");
		frm.tecno.focus(); 
		return false;
	}



	return true;
}

function validaFormUsuario(frm){
    var campo = frm.log.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese Login.");
		frm.log.focus(); 
		return (false);
	}
		
	var campo = frm.nombre.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Nombre de Usuario.");
		frm.nombre.focus(); 
		return (false);
	}
	
	var campo = frm.apellidos.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese Apellidos de Usuario.");
		frm.apellidos.focus(); 
		return (false);
	}

	var campo = frm.dni.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese DNI.");
		frm.dni.focus(); 
		return (false);
	}

	var campo = frm.dir.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese Direcci\xf3n.");
		frm.dir.focus(); 
		return (false);
	}
	
	var campo = frm.tel.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese Tel\xe9fono.");
		frm.tel.focus(); 
		return (false);
	}

	var campo = frm.correo.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese E-mail.");
		frm.correo.focus(); 
		return (false);
	}

   // if (form['email'].value.indexOf('@', 0) == -1 || form['email'].value.indexOf('.', 0) == -1)
	 if(frm.correo.value.indexOf('@', 0) == -1 || frm.correo.value.indexOf('.', 0) == -1)
	    { 
			alert("Direcci\xf3n de correo electr\xf3nico inv\xe1lida");
			frm.correo.focus(); 
		    return (false);
		}

	var campo = frm.clave.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese password.");
		frm.clave.focus(); 
		return (false);
	}

	var campo = frm.codnivel.value;
	if(campo=="")
	{
        alert("Por Favor, Ingrese Nivel.");
		frm.codnivel.focus(); 
		return (false);
	}

} 

function validaFormMarca(frm){
	var campo = frm.desm.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Nombre de Marca.");
		frm.desm.focus(); 
		return false;
	}
	return true;
} 

function validaFormNivel(frm){
	var campo = frm.nivel.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Nombre de Nivel.");
		frm.nivel.focus(); 
		return (false);
	}
} 

function validaFormCateg(frm){
	var campo = frm.tipo.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Nombre de Categor\xeda.");
		frm.tipo.focus(); 
		return (false);
	}

	var campo = frm.des.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Descripci\xf3n.");
		frm.des.focus(); 
		return (false);
	}
	
} 

function validaFormSubCateg(frm){
	var campo = frm.nomc.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Nombre de Subcategor\xeda.");
		frm.nomc.focus(); 
		return false;
	}

	var campo = frm.des.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Descripci\xf3n.");
		frm.des.focus(); 
		return false;
	}
	
	var campo = frm.codcat.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Categor\xeda.");
		frm.codcat.focus(); 
		return false;
	}

	return true;
} 

function validaFormProvee(frm){
	var campo = frm.rzs.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Raz\xf3n Social.");
		frm.rzs.focus(); 
		return false;
	}

	var campo = frm.ruc.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese RUC.");
		frm.ruc.focus(); 
		return false;
	}
	
	// var campo = frm.nom_con.value;  
	// if (campo=="") { 
 //        alert("Por Favor, Ingrese Nombre de Contacto.");
	// 	frm.nom_con.focus(); 
	// 	return false;
	// }
	
	var campo = frm.dir.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Direcci\xf3n.");
		frm.dir.focus(); 
		return false;
	}

	var campo = frm.dist.value;  
	if (campo=="") { 
        alert("Por Favor, Ingrese Distrito.");
		frm.dist.focus(); 
		return false;
	}

	return true;
	// var campo = frm.email.value;  
	// if (campo=="") { 
 //        alert("Por Favor, Ingrese E-mail.");
	// 	frm.email.focus(); 
	// 	return false;
	// }

	// if(frm.email.value.indexOf('@', 0) == -1 || frm.email.value.indexOf('.', 0) == -1)
	//     { 
	// 		alert("Direcci\xf3n de correo electr\xf3nico inv\xe1lida");
	// 		frm.email.focus(); 
	// 	    return false;
	// 	}

} 
