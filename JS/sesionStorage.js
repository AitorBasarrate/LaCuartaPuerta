
/* LOCALSTORAGE ETA COOKI-EN GESTIO GUZTIA */
  //Orrialzea zabaltzean...
  console.log('entraSesion');
  window.addEventListener("load", function() { 
    // el código que quieres ejecutar 
    console.log('entra2');
    document.getElementById('adminArea').style.display='none';
    comprobarStorage();
});

 
  //Local storage dagoen ala ez begiratuko du.
  function comprobarStorage() {
      //lokalean zeozer badago...
    if(buscarLocal()){
      //Begiratuko dugu zein baimena duen 
        miStorage = window.localStorage;
        var permisos = miStorage.getItem('permisos');
        if(permisos=='2'){
          document.getElementById('adminArea').style.display='block';
        }else{
          document.getElementById('adminArea').style.display='none';
        }
        document.getElementById('LoginBoton').style.display='none';
        document.getElementById('LogoutBoton').style.display='block';
        document.getElementById('bazkideArea1').style.display='block';
        document.getElementById('bazkideArea2').style.display='none';
        if(document.getElementById('commentform')){
          document.getElementById('commentform').style.display='block';
        }
        //lokalean dauden elementuekin kookiak sotuko dtugu
        crearCookies();
    }else{
        document.getElementById('LoginBoton').style.display='block';
        document.getElementById('LogoutBoton').style.display='none';
        if(document.getElementById('commentform')){
          document.getElementById('commentform').style.display='none';
        }
        document.getElementById('bazkideArea1').style.display='none';
        document.getElementById('bazkideArea2').style.display='block';
        
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
    var permisos=localStorage.getItem('permisos');
    var d=new Date();
    d.setTime(d.getTime()+(12*60*60*1000));
    var expires="expires="+ d.toUTCString();
    document.cookie='usuario'+"="+usuario+';'+expires;
    document.cookie='contraseña'+"="+contraseña+';'+expires;
    document.cookie='permisos'+"="+permisos+';'+expires;
  }

//Erregistratzean, local storage-a sortuko du.
function crearLocal(){
    console.log(localStorage.getItem('nombre'));
    localStorage.clear();
    //Aurretikan baldin ez badago
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
    for (var i = 0; i < allCookies.length; i++) {
              document.cookie = allCookies[i] + "=;expires=" 
        + new Date(0).toUTCString(); 
    }

    //berriz guztia ezabatu denez, konprobatuko dugu ea zeozer dagoen 
        comprobarStorage();

}
