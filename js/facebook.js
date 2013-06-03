/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '556218747762833', // App ID
    channelUrl : 'http://flashfusioner.com/gamers_paradise/channel.php', // Channel File
    status     : true, // check login status
    cookie     : true, // enable cookies to allow the server to access the session
    xfbml      : true  // parse XFBML
  });

	FB.Canvas.setSize({height: 900});
	setTimeout("FB.Canvas.setAutoGrow()", 500);	

  };

  // Load the SDK asynchronously
  (function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
  }(document));