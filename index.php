<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 
	
    //Output header
    outputBoilerplate("Home");

    //Output Navigation bar
    outputNavigation();    
?>

<!--Tagline and logo-->
<div class="logo">
    <img src="/Images/mario.gif" alt="game logo" width="400" height="400">
</div>
<h1 class="TagLine">Jump for your life</h1>
<div class="Play_button">
    <a href="http://localhost/registration.php"><button class="button">Play</button> </a>
</div>

<br>
<br>
<script>
    window.onload = logout;
    function logout(){
        for(let key of Object.keys(localStorage)){
            let user = JSON.parse(localStorage[key]);
            user.loggedIn = false;
            localStorage[user.email] = JSON.stringify(user); 
        }
    }
</script>
<?php
//Outputs the footer
  outputFooter();
?>