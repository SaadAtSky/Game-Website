<?php
//Ouputs the header for the page and opening body tag
function outputBoilerplate($title){
    echo '<!DOCTYPE html>';
    echo '<html>';
    echo '<head>';
    echo '<title>' . $title . '</title>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">';
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>';
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>';
    echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>';
    echo '<link rel="stylesheet" href="/css/styles.css">';
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
}

/* Ouputs the navigation bar*/
function outputNavigation(){
    echo '</head>';
    echo '<body>';
    echo'<nav class="navbar navbar-expand-sm bg-dark navbar-dark">';
    echo'<a class="navbar-brand" href="#">';
    echo' <img src="/Images/gameimage.png" alt="logo" style="width:40px;">';
    echo' </a>';
    echo'<ul class="navbar-nav">';
    
    //Array of pages to link to
    $linkNames = array("Home", "Login", "Register","Game", "Leaderboard");
    $linkAddresses = array("index.php", "login.php", "registration.php","game.php", "leaderboard.php");
    
    //Output navigation
    for($x = 0; $x < count($linkNames); $x++){
        echo'<li class="nav-item">';
        echo '<a class="nav-link"';
        echo 'href="' . $linkAddresses[$x] . '">' . $linkNames[$x] . '</a>' . '</li>';
    }
    echo'</ul>';
    echo'</nav>';
}

//Outputs the social media links, closing body tag and closing HTML tag
function outputFooter(){
    echo '<div class="row">';
    echo '<div class="col-sm-4">';
    echo '<a href="https://www.facebook.com/saad.ahmad.awesome" class="fa fa-facebook"></a>';
    echo '<a href="https://www.instagram.com/saad.a322/" class="fa fa-instagram"></a>';
    echo '<a href="https://www.snapchat.com/add/saady6nov" class="fa fa-snapchat-ghost"></a>';
    echo '</div>';
    echo '<div class="col-sm-8">';
    echo '<a href="http://localhost/index.php">Logout </a>';
    echo '</div>';
    echo '</body>';
    echo '</html>';
}
?>