function statusChangeCallback(response) { 
  console.log('statusChangeCallback'); 
  console.log(response); 
  if (response.status === 'connected') { 
    mainAjax('http://mytravels.com/resources/main.php', response.authResponse.accessToken);
    //auth(); 
    document.location.replace("http://mytravels.com/main");
  } else { 
    // document.getElementById('map').style.display = 'none'; 
  } 
}  
function checkLoginState() { 
  FB.getLoginStatus(function(response) { 
    statusChangeCallback(response); 
  }); 
} 

window.fbAsyncInit = function() { 
  FB.init({ 
    appId : '143205072972407', 
    cookie : true, 
    xfbml : true,  
    version : 'v2.8' 
  }); 

  FB.getLoginStatus(function(response) { 
    statusChangeCallback(response); 
  }); 
}; 

(function(d, s, id) { 
  var js, fjs = d.getElementsByTagName(s)[0]; 
  if (d.getElementById(id)) return; 
  js = d.createElement(s); js.id = id; 
  js.src = "//connect.facebook.net/en_US/sdk.js"; 
  fjs.parentNode.insertBefore(js, fjs); 
}(document, 'script', 'facebook-jssdk')); 

function auth() { 
  console.log('Welcome! Fetching your information.... '); 
  FB.api('/me', function(response) { 
    console.log('Successful login for: ' + response.name);  
    document.getElementById('status').innerHTML = "OK"; 
  }); 
}

