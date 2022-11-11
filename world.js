document.addEventListener("DOMContentLoaded",function(){
    var button = document.getElementById("lookup");
    var button2 = document.getElementById("lookupct");
    var list = "world.php?country=";
    var exlist;
    button.onclick = function(event){
        event.preventDefault();
        exlist ='&lookup=';
        var httpRequest = new XMLHttpRequest();
        httpRequest.onreadystatechange = function(){
            if (httpRequest.readyState == XMLHttpRequest.DONE){
               if (httpRequest.status == 200){
                  var response = httpRequest.responseText;
                  var result = document.getElementById("result");
                  result.innerHTML = response;
            }     
               else
                  alert("error");}
        }
        query = document.getElementById("country").value;
        query.trim();
        if((/^[a-zA-Z ]+$/).test(query)){
          list += query;
          list += exlist;
        }
        else{
          list += exlist;
        }
        httpRequest.open("GET",list);
        httpRequest.send();
        list = "world.php?country="
    }
    button2.onclick = function(event){
      event.preventDefault();
      exlist ='&lookup=cities';
      var httpRequest = new XMLHttpRequest();
      httpRequest.onreadystatechange = function(){
          if (httpRequest.readyState == XMLHttpRequest.DONE){
             if (httpRequest.status == 200){
                var response = httpRequest.responseText;
                var result = document.getElementById("result");
                result.innerHTML = response;
          }     
             else
                alert("error");}
      }
      query = document.getElementById("country").value;
      query.trim();
      if((/^[a-zA-Z ]+$/).test(query)){
        list += query;
        list += exlist;
      }
      else{
        list += exlist;
      }
      httpRequest.open("GET",list);
      httpRequest.send();
      list = "world.php?country="
  }

})