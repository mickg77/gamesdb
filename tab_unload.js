window.onbeforeunload = function() {

    $.post("destroy_session.php",function(data){
    });  

  }
