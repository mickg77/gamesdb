//start of jquery

$(document).keypress(function(e) {
  //when any key is pressed
  
  
  if(document.getElementById("passwordbox").value.length <8){
    document.getElementById("passwordfeedback").innerHTML="Password must be at least 8 characters";
  }
  else {
    document.getElementById("passwordfeedback").innerHTML="";
  }
  
  
  //for navigation
  if($(":input").is(":focus")==0){
      switch (e.which) {
    //uses ascii codes  
    case 97:
      window.location='update.php';
      break;
    case 98:
      window.location='index.php';
      break;
  }
 
  }

});