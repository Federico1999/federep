function tab() {
  // $.getJSON("modellogga.php",function(risultato){

  //});

}

$(document).ready(function() {

  $('#loginb').click(function() {

    $("#divlogin").css("display", "none");
    $("#divautenticazione").css("display", "inline");
  });

  $("#baccedi").click(function() {
    if($("#email").val().length>0 && $("#pass").val().length>0)  //, {"email": $("#email").val()}
    {
      alert("passato il controllo");
     $.getJSON("modellogga.php",{"email": $("#email").val(),"pass":$("#pass").val()},function(risulta){
       if(risulta.nome!=null)
         {
           $("#divautenticazione").css("display","none");
           $("#divaccesso").append("<h3>Bentornato "+risulta.nome+"</h3>");
           $("#divaccesso").css("display","inline");
         }
      });
    //   logga($("#email").val(),$("#pass").val());
     }
    //else{alert("non hai inserito uno dei due campi");}
  });
  $("#anagrafeb").click(function(){
    $("#divanagafe").css("display","inline");        
  });

});



//var dati={"email":email,"pass":pass};
//alert("sono qui");
//alert(email);
//var p={'email': email};
//alert(p);