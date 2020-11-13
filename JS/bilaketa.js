$("#pelikulaIzenezBilatu").click(function(){});
$('[name="star"]').click(function(){});
$("#generoa").change(function(){});
$("#urtea").change(function(){});
$('#customIDtoInputtypeFile').change(function(){});

$(function() {
    $("input:file").change(function (){
      $('form').submit();
    });
   });

