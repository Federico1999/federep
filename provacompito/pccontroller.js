function tabinizio(){
   $("#divg").empty()
     $.getJSON("pcmodel.php",function(result){
   var b=null;
   $.each(result,function(k,v){
     var a="<tr><td>"+v.nome+"</td><td>"+v.eta+"</td></tr>"
     if(k===0)
       {
         b=a;
       }
     else
     {b+=a;}
     
   });
   //alert(b);
   $("#divg").append("<table>"+b+"</table>");
   
 });
}

$(document).ready(function(){
tabinizio();
  $("#sel").change(function(){
    $("#divg").empty()
    if($("#sel").val()!="all")
      {
        $.getJSON("pcmodel.php",{"sport":$("#sel").val()},function(result){

          var b=null;
     $.each(result,function(k,v){
       var a="<tr><td>"+v.nome+"</td><td>"+v.eta+"</td></tr>"
       if(k===0)
         {
           b=a;
         }
       else
       {b+=a;}
         });
          $("#divg").append("<table>"+b+"</table>");
        });
        
      }
    else{
      tabinizio();
    }
  });
});