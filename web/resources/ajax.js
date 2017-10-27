function startAjax(url, country) {
  
  var request;

  if(window.XMLHttpRequest){ 
      request = new XMLHttpRequest(); 
  } else if(window.ActiveXObject){ 
      request = new ActiveXObject("Microsoft.XMLHTTP");  
  } else { 
      return; 
  } 
  
  alert(country);
  request.open("POST",url, true);
  request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  request.send("country="+country);
  initMap();
}  

function mainAjax(url, accessToken) {
  var request;

  if(window.XMLHttpRequest){ 
      request = new XMLHttpRequest(); 
  } else if(window.ActiveXObject){ 
      request = new ActiveXObject("Microsoft.XMLHTTP");  
  } else { 
      return; 
  } 

  request.open("POST",url, true);
  request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  request.send("token="+accessToken);
}

