//alert("ciao");
var vettoredati;
 var weekday = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
  const monthnames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
  "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
var infot;
function gettempbycity(city)
{
  var urlcit="http://api.openweathermap.org/data/2.5/weather?q="+city+"&APPID=4af89dd6ce566691af4c7f4ed65ec3c5&units=metric";
 
  $.getJSON(urlcit,function(result){
   if(result!=null)
   {
    var dt = new Date($.now());
    var day=weekday[dt.getDay()];
    var month=monthnames[dt.getMonth()];
    var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
    var info=$('<a class="info">'+day+' '+month+' '+dt.getDate()+' '+dt.getFullYear()+' '+time+' GMT'+dt.getTimezoneOffset()+'</a>');
    var table=$('<table class="table"><tbody></tbody></table>');
     var righe=$('<tr><td><h4>'+result.name+','+result.sys.country+'(lon='+result.coord.lon+', lat='+result.coord.lat+')</h4></td></tr><tr><td>main</td><td>'+result.weather[0].main+'</td></tr> <tr><td>description</td><td>'+result.weather[0].description+'</td></tr> <tr><td>temperature</td><td>'+result.main.temp+'&deg;C</td></tr> <tr><td>pressure</td><td>'+result.main.pressure+'hpa</td></tr> <tr><td>humidity</td><td>'+result.main.humidity+'%</td></tr> <tr><td>wind speed</td><td>'+result.wind.speed+'m/s</td></tr> <tr><td>wind deg</td><td>'+result.wind.deg+'</td></tr> <tr><td>visibility</td><td>'+result.visibility+'</td></tr>');
   
         $("#tab1").empty();
         $("#tab1").append(info);
         table.append(righe);
         $("#tab1").append(table);
      }
  });
  
}
function gettempbycityforecast(city)
{
  //alert(city);
  vettoredati=[];
   $("#combotime").empty();
  var urlcit="http://api.openweathermap.org/data/2.5/forecast?q="+city+"&APPID=4af89dd6ce566691af4c7f4ed65ec3c5&units=metric";
  $("#tab2").empty();
  $.getJSON(urlcit,function(resultt)
   {
    //alert(result);
    
   $("#combotime").css("display","none");
    if(resultt)
      {
        
        //alert("ricevuto roba");
        //combotime=$('<select id="combo"></select>');
        //infot=resultt.name+","+resultt.country+"(lon="+resultt.coord.lon+", lat="+resultt.coord.lat+")"; 
        //alert(infot);
        $.each(resultt.list,function(k,v){
          //alert(v.dt_txt);
          vettoredati.push(v);

          
          $("#combotime").append($('<option value="'+k+'">'+v.dt_txt+'</option>'));
          
          //$("#combotime").clear();
        });
        
        $("#combotime").css("display","inline");
        selectionchange();
        //alert(vettoredati[0].main.temp);
        //$("#tab2").append(combotime);
      }
  
    
  });
 
}
function selectionchange()
{
  //alert("selection changed");
  var indice=$("#combotime").val();
  var tabt="<table class='tab2'><tr><td>main</td><td>"+vettoredati[indice].weather[0].main+"</td></tr><tr><td>description</td><td>"+vettoredati[indice].weather[0].description+"</td></tr><tr><td>temp</td><td>"+vettoredati[indice].main.temp+"&deg;C</td></tr><tr><td>pressure</td><td>"+vettoredati[indice].main.pressure+"hpa</td></tr><tr><td>humidity</td><td>"+vettoredati[indice].main.humidity+"%</td></tr><tr><td>wind speed</td><td>"+vettoredati[indice].wind.speed+"m/s</td></tr><tr><td>wind deg</td><td>"+vettoredati[indice].wind.deg+"</td></tr> </table>";
  $("#tab2").empty();
  //$("#hh").append(infot);
  $("#tab2").append(tabt);
}

$(document).ready(function(){

  $("#okbutt").click(function(){
  gettempbycity($("#nomecitt").val());
  });
   $("#okbuttt").click(function(){
   gettempbycityforecast($("#nomecittt").val());
     //$("#combotime").val(0);
  });
 
  $("#combotime").change(function(){
    selectionchange();
  });
});
//function funzselezionecitt()
//{
 // $document.formone
//}

//prova forecast: http://api.openweathermap.org/data/2.5/weather?q=London&APPID=4af89dd6ce566691af4c7f4ed65ec3c5&units=metric&time=2018:03:03