  <head>
    <meta charset="UTF-8">
    <title>PRESTACIX</title>

    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="assets/lib/onoffcanvas/onoffcanvas.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.min.css">

    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.css">
    <!-- <link rel="stylesheet" href="assets/lib/jquery-inputlimiter/jquery.inputlimiter.1.0.css"> -->
    <link rel="stylesheet" href="assets/lib/bootstrap-daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Uniform.js/2.1.2/themes/default/css/uniform.default.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.3/jquery.tagsinput.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.1/css/bootstrap3/bootstrap-switch.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.1/css/datepicker3.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.0.1/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">

     <link rel="stylesheet" href="assets/lib/pagedown-bootstrap/css/jquery.pagedown-bootstrap.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
      <script src="assets/lib/html5shiv/html5shiv.js"></script>
      <script src="assets/lib/respond/respond.min.js"></script>
      <![endif]-->

    <!--For Development Only. Not required -->
    <script>
      less = {
        env: "development",
        relativeUrls: false,
        rootpath: "../assets/"
      };
    </script>
    <link rel="stylesheet" href="assets/css/style-switcher.css">
    <link rel="stylesheet/less" type="text/css" href="assets/less/theme.less">
    
      
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.2.0/less.min.js"></script>

    <!--Modernizr-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    <script src="funciones/validaciones.js"></script>
    
    <script src="//cdn.ckeditor.com/4.10.0/full/ckeditor.js"></script>
    <script src="assets/js/config.js"></script>

    <script type="text/javascript">
    function carga_form (num) {
        
        if (num==1){
            var content = jQuery("#conte");
            content.fadeIn('slow').load("inc_productos.php");
        }
        if (num==2){
            var content = jQuery("#conte");
            content.fadeIn('slow').load("inc_subcat.php");
        }
        if (num==3){
            var content = jQuery("#conte");
            content.fadeIn('slow').load("inc_cat.php");
        }
        if (num==4){
            var content = jQuery("#conte");
            content.fadeIn('slow').load("inc_pedidos.php");
        }
        
    }

    function anula(cod) {
        document.location.href='anular.php?id='+cod;
    }

    // function cargare(UR) {
    //     jQuery('#conte').html('<div style="padding:5px;"><img src="images/loaders/loader6.gif"/>&nbsp;Espero un momento porfavor</div>');
    //     var content = jQuery("#conte");
    //     content.fadeIn('fast').load(UR);
    //     // jQuery('#cargador').hide();
    //     // content.load(UR).hide(200);
    //     // jQuery('#conte').delay(1000).html('<div style="padding:5px;"><img 
    //     //  src="images/loaders/loader6.gif"/>&nbsp;Espero un momento porfavor</div>');
    //     // content.load(UR).fadeIn(200);
    // }

    function cargare(UR) {
        // alert(UR);
        var content = jQuery("#content");
        content.fadeIn('slow').load(UR);
    }

    function cargue(UR) {
       document.location.href=UR;
    }

    function CA(isOn){
        for (var i=0;i<frmList.elements.length;i++){
            var e = frmList.elements[i];
            if ((e.name != 'allbox') && (e.type=='checkbox')){
                if (isOn != 1){
                    e.checked = frmList.allbox.checked;
                    if (frmList.allbox.checked){
                        hL(e);
                    }else{
                        dL(e);
                    }
                }else{
                    e.tabIndex = i;
                    if (e.checked){
                        hL(e);
                    }else{
                        dL(e);
                    }
                }
            }
        }
    }

    function hL(E){
        while (E.tagName!="TR"){
            E=E.parentNode;
        }
        E.className = "H";
    }

    function dL(E){
        while (E.tagName!="TR"){
            E=E.parentNode;
        }
        E.className = "";
    }

    function CCA(CB){

            if (CB.checked)
                hL(CB);
            else
                dL(CB);
                
        var TB=TO=0;
        for (var i=0;i<frmList.elements.length;i++){
            var e = frmList.elements[i];
            if ((e.name != 'allbox') && (e.type=='checkbox')){
                TB++;
                if (e.checked) TO++;
            }
        }
        if (TO==TB)
            frmList.allbox.checked=true;
        else
            frmList.allbox.checked=false;
    }

    function vChk(frm){ 
        var sw=0;
        for(var i=0;i<frm.length;i++){
            if(frm.elements[i].checked){
                sw=1;
            }       
        }
        if(sw!=1){
            alert("No hay ningun registro seleccionado.");
            // jAlert('No hay ningun registro seleccionado.', 'Mensaje del Sistema');
            return(false);
        }
        rpta=confirm("Esta seguro de Eliminar estos Registros?");
        if (rpta==false){
            return(false);
        }
    }

    function Enable(act,first,dosub,e) {
        if (act=='delete'){
            if (!e) var e=window.event;
            e.cancelBubble=true;
        }
        if (act=='notbulkmail'){
            frm.action="/cgi-bin/notbulk";
        }else if (act=='report'){
            frm.action="/cgi-bin/kill";
            frm.ReportLevel.value="1";
        }

        num=vChk(frmList);
        // alert(num);
        if (num!=false){
            // frmList.submit();
            var npag= frmList.pag.value;
            for(var i=0;i<frmList.length;i++){
                if(frmList.elements[i].checked){
                    var chkid = frmList.elements[i].value;
                    // alert(chkid);
                    // alert(npag);
                    document.location.href='enabler.php?id='+chkid+'&pag='+npag;
                }       
            }
        }
    }

    function Disable(act,first,dosub,e) {
        if (act=='delete'){
            if (!e) var e=window.event;
            e.cancelBubble=true;
        }
        if (act=='notbulkmail'){
            frm.action="/cgi-bin/notbulk";
        }else if (act=='report'){
            frm.action="/cgi-bin/kill";
            frm.ReportLevel.value="1";
        }

        num=vChk(frmList);
        // alert(num);
        if (num!=false){
            // frmList.submit();
            var npag= frmList.pag.value;
            for(var i=0;i<frmList.length;i++){
                if(frmList.elements[i].checked){
                    var chkid = frmList.elements[i].value;
                    // alert(chkid);
                    // alert(npag);
                    document.location.href='disabler.php?id='+chkid+'&pag='+npag;
                }       
            }
        }
    }

    function Subm(act,first,dosub,e){
        if (act=='delete'){
            if (!e) var e=window.event;
            e.cancelBubble=true;
        }
        if (act=='notbulkmail'){
            frm.action="/cgi-bin/notbulk";
        }else if (act=='report'){
            frm.action="/cgi-bin/kill";
            frm.ReportLevel.value="1";
        }
        //num=((first) ? slct1st(frm) : numChecked(frm));
        num=vChk(frmList);
    //  alert (num);
        if (num!=false){
        //if (num>0){
            //frm._HMaction.value=act;
            //if (dosub)
            frmList.submit();
        //}else{
            //Err("150995652");
        }
    }

    function G(UR){
    // if (!e)
    // var e=window.event;
    // if (e)
    //  e.cancelBubble=true;
    // if(UR)
    //  //location.href=UR+"&"+_UM;
    //  location.href=UR;
       // var content = jQuery("#content");
       // content.fadeIn('slow').load(UR);
       // alert(UR);
    }

    var ventana=0;
    function fventana(URLStr,width,height)
    {

     
    var left=(screen.width/2) - width/2;
    //var top=(screen.height/2) - height/2;
    var top=0;
      if(ventana)
      {
        if(!ventana.closed) ventana.close();
      }
      ventana = open(URLStr, 'ventana', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=yes,width='+width+',height='+height+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
    }

    function printview(url)
    {
        fventana(url,500,600);
    }

    function printview2(url)
    {
        fventana(url,750,600);
    }

    function imprSelec(muestra)
    {var ficha=document.getElementById(muestra);
     var ventimp=window.open(' ','popimpr');
     ventimp.document.write(ficha.innerHTML);
     ventimp.document.close();
     ventimp.print();
     ventimp.close();
    }

    function addprod(c1) {
        // document.location.href='agreg_prod.php?id='+c1;
        var content = jQuery("#list_prod");
        content.fadeIn('slow').load("agreg_prod.php?id="+c1+"&sw=1");
    }

    function eliprod(c1) {
        // var content = jQuery("#list_prod");
        // content.fadeIn('slow').load("eli_prod.php?id="+c1+"&sw=1");

     // var content = jQuery("#dep");
     // content.fadeIn('slow').load("ing_cant.php?ord="+id+"&dt="+elementos[0].value.trim());
        var content = jQuery("#dep");
        content.fadeIn('slow').load("eli_prod2.php?id="+c1+"&sw=1");

        var content = jQuery("#list_prod");
        // var nid = id.substring(1)
        // content.fadeIn('slow').load("agreg_prod.php?id="+c1+"&sw=2");
        content.fadeIn('slow').load("agreg_prod.php");

    }

    function form_child(url)
    {
        // fventana(url,700,500);
        var content = jQuery("#conte");
        content.fadeIn('slow').load(url);
    }

    function w_child(url)
    {
        fventana(url,800,600);
  //        var content = jQuery("#conte");
        // content.fadeIn('slow').load(url);
    }

    function salir() {
        if (confirm("Seguro que desea salir del sistema?")) {
            location.href = "salir.php"
        };
    }


</script>
    
  </head>

  