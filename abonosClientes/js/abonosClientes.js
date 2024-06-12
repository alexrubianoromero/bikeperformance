function formuAbonoCliente(idOrden){
    // var valor =  document.getElementById("txtValorAbono");
    // var observaciones =  document.getElementById("txtObseAbono");
    const http=new XMLHttpRequest();
    const url = '../abonosClientes/abonosClientes.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            //  console.log(this.responseText);
             //var respuesta = JSON.parse(this.responseText);
            // console.log(respuesta.marca);
				// alert(respuesta[0]+' '+ respuesta[1]);
// //		document.getElementById("tipooperacion").text = respuesta[1];
           document.getElementById("div_muestre_abonos").innerHTML  = this.responseText;
           
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion='+'formuAbonoCliente'
    +'&idOrden='+ idOrden
    // +'&valor='+ valor
    // +'&observaciones='+ observaciones
    );
}


function registrarAbonoOrden(idOrden){
    var  txtEfectivo =  document.getElementById("txtEfectivo").value;
    var  txtDebito =  document.getElementById("txtDebito").value;
    var  txtCredito =  document.getElementById("txtCredito").value;
    var  txtBancolombia =  document.getElementById("txtBancolombia").value;
    var  bolt =  document.getElementById("bolt").value;
    var  txtValor =  document.getElementById("txtValor").value;
    var  txtObservacion =  document.getElementById("txtObservacion").value;

    const http=new XMLHttpRequest();
    const url = '../abonosClientes/abonosClientes.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            //  console.log(this.responseText);
             //var respuesta = JSON.parse(this.responseText);
            // console.log(respuesta.marca);
				// alert(respuesta[0]+' '+ respuesta[1]);
// //		document.getElementById("tipooperacion").text = respuesta[1];
           document.getElementById("div_muestre_abonos").innerHTML  = this.responseText;
           
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion='+'registrarAbonoOrden'
    +'&idOrden='+ idOrden
    +'&txtEfectivo='+ txtEfectivo
    +'&txtDebito='+ txtDebito
    +'&txtCredito='+ txtCredito
    +'&txtBancolombia='+ txtBancolombia
    +'&bolt='+ bolt
    +'&txtValor='+ txtValor
    +'&txtObservacion='+ txtObservacion
    );
    setTimeout(() => {
        muestreMenuDinero(idOrden);
    }, 300);
}

function sumeValoresAbono(){
    var  txtEfectivo =  document.getElementById("txtEfectivo").value;
    var  txtDebito =  document.getElementById("txtDebito").value;
    var  txtCredito =  document.getElementById("txtCredito").value;
    var  txtBancolombia =  document.getElementById("txtBancolombia").value;
    var  bolt =  document.getElementById("bolt").value;

    var suma = parseInt(txtEfectivo) + parseInt(txtDebito) + parseInt(txtCredito) + parseInt(txtBancolombia) 
    + parseInt(bolt) 
    document.getElementById("txtValor").value = suma;
   
}