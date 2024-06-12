function pantallaRecibosDeCaja()
{
    // alert ('pantalla recibos '); 
    const http=new XMLHttpRequest();
    const url = '../caja/recibosdecaja.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
        document.getElementById("div_principal").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=menuPrincipalRecibosDeCaja');
}