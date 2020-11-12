function botoiHandiak(obj){
    document.getElementById(obj).style.backgroundColor='#f5cb5c';
    document.getElementById(obj).style["boxShadow"]="0 10px 18px 0 #f5cb5c, 0 6px 20px 0 #f5cb5c";
   
}
function botoiTxikiak(obj){
    document.getElementById(obj).style.backgroundColor='#E8EDDF'
    document.getElementById(obj).style["boxShadow"]="0 10px 18px 0  rgba(0, 0, 0, 0.19), 0 6px 20px 0  rgba(0, 0, 0, 0.19)";
}

/* Logoa bibrazeko klikatzean jquery-rekin */
$( "#logo ").click(function() {
    $( "#logo" ).effect( "shake" );
  });


/* LOCALSTORAGE ETA COOKI-EN GESTIO GUZTIA */
  //Orrialzea zabaltzean...
    window.onload = function(){
    comprobarStorage();
  };

 
  //Local storage dagoen ala ez begiratuko du.
  function comprobarStorage() {
      var bazkide1=document.getElementById('bazkideArea1');
      var bazkide2=document.getElementById('bazkideArea2');
      //localean zeozer badago...
    if(buscarLocal()){
        console.log('');
        document.getElementById('LoginBoton').style.display='none';
        document.getElementById('LogoutBoton').style.display='block';
        bazkide1.style.display='block';
        bazkide2.style.display='none';
        //lokalean dauden elementuekin kookiak sotuko dtugu
        crearCookies();
    }else{
        document.getElementById('LoginBoton').style.display='block';
        document.getElementById('LogoutBoton').style.display='none';
        bazkide1.style.display='none';
        bazkide2.style.display='block';
    }
  }
  //boton bazkideArea
  function verBazkide(){
      var bazkide1=document.getElementById('bazkideArea1');
      var bazkide2=document.getElementById('bazkideArea2');
    if(buscarLocal()){
        bazkide1.style.display='block';
        bazkide2.style.display='none';
    }else{
        bazkide1.style.display='none';
        bazkide2.style.display='block';
    }
  }
//localean zeozer gordeta dagoen a la ez
  function buscarLocal(){
    miStorage = window.localStorage;
    var usuario = miStorage.getItem('usuario');
    var contraseña = miStorage.getItem('contraseña');
    if (usuario==null && contraseña==null){
      console.log('no hay local');
        //ez badago local storage...
        return false;
    }else{
      console.log('hayl local')
        //local storage baldin badago...
        return true;
    }

  }

 //Cookiak sortzeko localStorage-eko datuekin...
  function crearCookies(){
    var usuario = localStorage.getItem('usuario');
    var contraseña = localStorage.getItem('contraseña');
    var d=new Date();
    d.setTime(d.getTime()+(12*60*60*1000));
    var expires="expires="+ d.toUTCString();
    document.cookie='usuario'+"="+usuario+';'+expires;
    document.cookie='contraseña'+"="+contraseña+';'+expires;
  }

//Erregistratzean, local storage-a sortuko du.
function crearLocal(){
    console.log('entra4');
    console.log(localStorage.getItem('nombre'));
    localStorage.clear();
    //Aurretikan baldin ez badago
    console.log('entra5');
      //Sortutako cookiak (crearCookies.php-tik) irakurtzen ditugu
        //Uruario cooki-a
        var nameEQ = 'usuario' + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) { 
            var c = ca[i]; while (c.charAt(0)==' ') c = c.substring(1,c.length); 
            if (c.indexOf(nameEQ) == 0) {
                var cookie1=c.substring(nameEQ.length,c.length);
            } 
        }
        //contraseña cooki-a
        var nameEQ = 'contraseña' + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) { 
            var c = ca[i]; while (c.charAt(0)==' ') c = c.substring(1,c.length); 
            if (c.indexOf(nameEQ) == 0) {
            var cookie2=c.substring(nameEQ.length,c.length);
            } 
        }
        //permisos cooki-a
        var nameEQ = 'permisos' + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) { 
            var c = ca[i]; while (c.charAt(0)==' ') c = c.substring(1,c.length); 
            if (c.indexOf(nameEQ) == 0) {
            var cookie3=c.substring(nameEQ.length,c.length);
            } 
        }
        //loc
        //localStorage sortzen dugu datu horietatik
        var nombre=cookie1;
        var apellido=cookie2;
        var permisos=cookie3
       
        localStorage.setItem('usuario', nombre);
        localStorage.setItem('contraseña', apellido);
        localStorage.setItem('contraseña', permisos);
        //menua aldatzen dugu
        document.getElementById('LoginBoton').style.display='none';
        document.getElementById('LogoutBoton').style.display='block';

    }
  

       

//Sesioa ixteko cookiak eta locl storage datuak ezabatuko ditugu
function disableButton() {
    //local-storage ezabatu
    localStorage.clear();
    //cookiak ezabatu
    var allCookies = document.cookie.split(';'); 
    // cookiei denbora 0 jarrita ezabatuko dira
    for (var i = 0; i < allCookies.length; i++) 
        document.cookie = allCookies[i] + "=;expires=" 
        + new Date(0).toUTCString(); 
    //berriz guztia ezabatu denez, konprobatuko dugu ea zeozer dagoen 
        comprobarStorage();
}
