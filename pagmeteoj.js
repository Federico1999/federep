//alert("ciao");
function gettempbycity($city)
{
  //alert($city); che bello funca
  var urlcit="api.openweathermap.org/data/2.5/weather?q="+$city;
  //alert(cit);
  var table=$('<table class="table"><tbody></tbody></table>');
  $.getJSON(urlcit,function(result){
    $.each( result, function( key, val ) {
      var riga=$('<tr><td></td>');
    table.append(riga);
    });
  });
  if(result)
      {
        alert("e' maggiore di 0");
      }
}
$(document).ready(function(){

  $("#okbutt").click(function(){
  gettempbycity($("#nomecitt").val());
    
  });
});
//function funzselezionecitt()
//{
 // $document.formone
//}