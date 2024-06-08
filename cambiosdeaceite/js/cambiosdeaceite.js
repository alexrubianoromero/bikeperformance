function pregunteNuevoCambioAceite(placa)
{ 
    const http=new XMLHttpRequest();
    const url = '../cambiosdeaceite/cambiosdeaceite.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
        document.getElementById("div_formulario_captura_cambio").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=pregunteNuevoCambioAceite'
    + "&placa="+placa 
    );
}


function grabarcambiodeaceite()
{

    // alert('cambio de aceite');
    var placaoripan = document.getElementById("placaoripan").value;
    var kilometraje = document.getElementById("kilometraje").value;
    var kilometrajecambio = document.getElementById("kilometrajecambio").value;
    var filtroaceite = document.getElementById("filtroaceite").value;
    var filtroaire = document.getElementById("filtroaire").value;
    var filtroaireacondicionado = document.getElementById("filtroaireacondicionado").value;
    var filtrocombustible = document.getElementById("filtrocombustible").value;
    var filtrocombustibleno2 = document.getElementById("filtrocombustibleno2").value;
    var valvulinacaja = document.getElementById("valvulinacaja").value;
    var valvulinatransmision = document.getElementById("valvulinatransmision").value;
    var engrase = document.getElementById("engrase").value;
    var marcaceite = document.getElementById("marcaceite").value;
    var cantidad = document.getElementById("cantidad").value;
    var tipoaceite = document.getElementById("tipoaceite").value;
    var valor = document.getElementById("valor").value;

    const http=new XMLHttpRequest();
    const url = '../cambiosdeaceite/cambiosdeaceite.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
        document.getElementById("cuerpoModalNuevoCambioAceite").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=grabarCambioAceite'

    + "&placa="+placaoripan 
    + "&kilometraje="+kilometraje 
    + "&kilometrajecambio="+kilometrajecambio 
    + "&filtroaceite="+filtroaceite 
    + "&filtroaire="+filtroaire 
    + "&filtroaireacondicionado="+filtroaireacondicionado 
    + "&filtrocombustible="+filtrocombustible 
    + "&filtrocombustibleno2="+filtrocombustibleno2 
    + "&valvulinacaja="+valvulinacaja 
    + "&valvulinatransmision="+valvulinatransmision 
    + "&engrase="+engrase 
    + "&marcaceite="+marcaceite 
    + "&cantidad="+cantidad 
    + "&tipoaceite="+tipoaceite 
    + "&valor="+valor 
    );
    setTimeout(() => {
        pantallaCambiosDeAceitePrincipal();
    }, 500);


}

function buscarPlacaPeritajeDesdeCambio()
{
    var placa = document.getElementById("placaPeritajecambio").value;
    var valida = validaPlacaCambio();
    if(valida)
    {
        $('#myModalNuevoCambioAceite').modal('show');
        const http=new XMLHttpRequest();
        const url = '../vehiculos/vehiculos.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                     document.getElementById("infoVehiculoCambio").innerHTML = this.responseText;

            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=buscarPlacaDesdeCambio"+ "&placa="+placa);
        
    }
}

function validaPlacaCambio()
{
    
    if(document.getElementById("placaPeritajecambio").value== '')
    {
        alert('por favor digite una placa '); 
        document.getElementById("placaPeritajecambio").focus();
        return 0;
    }
    return 1;
}



function grabarVehiculoDesdeCambioDeAceite()
{
    //  alert('desde cambio de aceite');
     valida = validacionesCarro();
     if(valida != 0)
     { 
         var placa =  document.getElementById("placa").value;
         var propietario =  document.getElementById("selectPropietario").value;
         var marca =  document.getElementById("marca").value;
         var linea =  document.getElementById("linea").value;
         var modelo =  document.getElementById("modelo").value;
         var color =  document.getElementById("color").value;
         var vencisoat =  document.getElementById("vencisoat").value;
         var revision =  document.getElementById("revision").value;
         var chasis =  document.getElementById("chasis").value;
         var motor =  document.getElementById("motor").value;

         const http=new XMLHttpRequest();
         const url = '../vehiculos/vehiculos.php';
         http.onreadystatechange = function(){
             if(this.readyState == 4 && this.status ==200){
                 console.log(this.responseText);
                  document.getElementById("divResultadobusqueda").innerHTML = this.responseText;
             }
         };

         http.open("POST",url);
         http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         http.send("opcion=grabarVehiculo1"
                 + "&placa="+placa
                 + "&propietario="+propietario
                 + "&marca="+marca
                 + "&linea="+linea
                 + "&modelo="+modelo
                 + "&vencisoat="+vencisoat
                 + "&revision="+revision
                 + "&chasis="+chasis
                 + "&motor="+motor
                 + "&color="+color
             );
             ///aqui deberia venir el resto del codigo para crear orden 
             //esta es la gran diferencia con relacion al otro guardar vehiculo
             //ahora estas acciones son para mostrar el formulario de creacion de cambio de aceite
            //  buscarPlacaPeritajeDesdeOrden();
             //activar la ventana para mostrar el formualrio de creacion de cambio de aceite 
            //  $('#myModalDdatosOrden').modal('show');
            //  mostrarFormularioCreacionOrden();
            //  pregunteNuevoCambioAceite(placa);
            mostrarDatosPlacaNewCambioAceite(placa);
            pregunteNuevoCambioAceite(placa);
     }
     //debe ir a validar placa o algo asi 
     
    }
function buscarPlacaSimple()
{
    var placa = document.getElementById("placaPeritajecambio").value;
    var valida = validaPlacaCambio();
    if(valida)
    {
        $('#myModalNuevoCambioAceite').modal('show');
        const http=new XMLHttpRequest();
        const url = '../vehiculos/vehiculos.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200)
            {
                respu = JSON.parse(this.responseText);
                // alert(respu.filas);
                if(respu.filas==1)
                {
                    // alert('si existe');
                    mostrarDatosPlacaNewCambioAceite(placa);
                    pregunteNuevoCambioAceite(placa);

                }else{
                    // alert ('esta placa no existe'); 
                    // setTimeout(() => {
                        document.getElementById("infoVehiculoCambio").innerHTML = '';
                        document.getElementById("div_formulario_captura_cambio").innerHTML = '';
                        preguntarDatosPlacaDesdeCambio(placa);
                        // pregunteNuevoCambioAceite(placa);
                        
                    // }, 500);
                }
                    //  document.getElementById("infoVehiculoCambio").innerHTML = this.responseText;

            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("opcion=buscarPlacaSimple"+ "&placa="+placa);
        
    }
}
function mostrarDatosPlacaNewCambioAceite(placa)
{
    const http=new XMLHttpRequest();
    const url = '../vehiculos/vehiculos.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
                 document.getElementById("infoVehiculoCambio").innerHTML = this.responseText;

        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=mostrarDatosPlacaNewCambioAceite"+ "&placa="+placa);
}
    

function pantallaCambiosDeAceitePrincipal()
{
    const http=new XMLHttpRequest();
    const url = '../cambiosdeaceite/cambiosdeaceite.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            document.getElementById("div_principal").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send();
}

function preguntarDatosPlacaDesdeCambio(placa)
{
    const http=new XMLHttpRequest();
    const url = '../vehiculos/vehiculos.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            document.getElementById("infoVehiculoCambio").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("opcion=preguntarDatosPlacaDesdeCambio"+ "&placa="+placa);
}
