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