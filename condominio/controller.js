$(document).ready(function(){
  if($("#loginb").click(function(){
    $("#divlogin").css("display","none");
    $("#divautenticazione").css("display","inline");
  }));
  if($("#baccedi").click(function(){
    if($("#email").length>0 && $("#pass").length>0)
      {
        logga($("#email").val(),$("pass").val());
      }
    else{alert("non hai inserito uno dei due campi");}
  }));
});

function tab()
{
 // $.getJSON("modellogga.php",function(risultato){
 
//});
  
}

function logga(email,pass)
{
  //var dati={"email":email,"pass":pass};
  //alert("sono qui");
  //alert(email);
  var p={'email': email};
  alert(p);
  $.getJSON("modellogga.php",p,function(risultato){
    
       //alert("ho ricevuto qualcosa");
      alert(risultato.nome);
     
   
  });
}