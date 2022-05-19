<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 
	
    //Output header
    outputBoilerplate("Register"); 
?>

<link rel="stylesheet" href="/css/leaderboard.css">

<?php
  //Outputs Navigation bar
  outputNavigation();
?>

<!-- Leaderboard  -->
<div class="grid-container" id="GridContainer">
</div>
<script>
    window.onload = updateTable;
    /*Creates a dynamic table that maps Username of registered users against their top score*/
    function updateTable() {
        let rankStr = '<div class="grid-item"><b>Username</b></div><div class="grid-item"><b>Top Score</b></div>';
        for (let key of Object.keys(localStorage)) {
            let user = JSON.parse(localStorage[key]);
            rankStr += '<div class="grid-item">' + user.username + "</div>"
            rankStr += '<div class="grid-item">' + user.topScore + "</div>"
        }
        rankStr += "</div>";
        document.getElementById("GridContainer").innerHTML = rankStr;
    }
</script>

<?php
    //Output the footer
    outputFooter();
?>