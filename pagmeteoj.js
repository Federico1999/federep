//alert("ciao");
function gettempbycity($city)
{
  //alert($city); che bello funca
  var urlcit="http://api.openweathermap.org/data/2.5/weather?q="+$city+"&APPID=4af89dd6ce566691af4c7f4ed65ec3c5&units=metric";
  //alert(cit);
  var weekday = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
  const monthnames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
  "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
  $.getJSON(urlcit,function(result){
   if(result!=null)
   {
    var dt = new Date($.now());
    var day=weekday[dt.getDay()];
    var month=monthnames[dt.getMonth()];
    var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    var info=$('<a class"info">'+day+' '+month+' '+dt.getDate()+' '+dt.getFullYear()+' '+time+' GMT'+dt.getTimezoneOffset()+'</a>');
    var table=$('<table class="table"><tbody></tbody></table>');
     var righe=$('<tr><td><h4>'+result.name+','+result.sys.country+'(lon='+result.coord.lon+', lat='+result.coord.lat+')</h4></td></tr><tr><td>main</td><td>'+result.weather[0].main+'</td></tr> <tr><td>description</td><td>'+result.weather[0].description+'</td></tr> <tr><td>temperature</td><td>'+result.main.temp+'°C</td></tr> <tr><td>pressure</td><td>'+result.main.pressure+'hpa</td></tr> <tr><td>humidity</td><td>'+result.main.humidity+'%</td></tr> <tr><td>wind speed</td><td>'+result.wind.speed+'m/s</td></tr> <tr><td>wind deg</td><td>'+result.wind.deg+'</td></tr> <tr><td>visibility</td><td>'+result.visibility+'</td></tr>');
   
         $("#prova").empty();
         $("#prova").append(info);
         table.append(righe);
         $("#prova").append(table);
      }
   
    //alert(result.main.temp);
      //$("#nomecitt").append(result+"");
      //alert(result.coord.lon);
      
    //table.append(riga);
    
    //alert(result.name[1]);
  });
  
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