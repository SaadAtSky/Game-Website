<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 
	
    //Output header and navigation 
    outputBoilerplate("The Game");
    outputNavigation();
?>

<style>
    body {
        background-color: black;
    }

    /*Style the canvas on which the game is to be played*/
    #myCanvas {
        border: 2px solid black;
        margin-right: 100px;
        width: 1000px;
        height: 600px;
        background-color: white;
    }

    /*Score counter*/
    p {
        color: white;
        font-size: 40px;
        font-style: oblique;
        margin-left: 100px;
        position: relative;
        top: 100px;

    }

    /*User character*/
    #character {
        position: relative;
        left: 390px;
        bottom: 160px;
        width: 150px;
        height: 150px;
    }

    /*jump animation for the user character*/
    .animate {
        animation: jump 0.5s linear;
    }

    @keyframes jump {
        0% {
            bottom: 205px;
        }

        30% {
            bottom: 400px;
        }

        50% {
            bottom: 450px;
        }

        70% {
            bottom: 400px;
        }

        100% {
            bottom: 205px;
        }
    }

    /*animation and style of coronavirus object */
    #coronavirus {
        background-color: blue;
        width: 50px;
        height: 50px;
        position: relative;
        bottom: 170px;
        animation: block 1.2s infinite linear;
        animation-delay: 5s;
        animation-fill-mode: backwards;
    }

    @keyframes block {
        0% {
            left: 1100px;
        }

        100% {
            left: 220px;
        }
    }

    #enemy {
        width: 100px;
        height: 150px;
        position: relative;
        left: 1070px;
        bottom: 140px;
    }

    /*animation and style of mask object*/
    #mask {
        width: 70px;
        height: 110px;
        position: relative;
        left: 1050px;
        bottom: 300px;
        animation: maskAnimation 1.8s infinite linear;
        animation-delay: 5s;
        animation-fill-mode: backwards;
    }

    @keyframes maskAnimation {
        0% {
            left: 1000px;
        }

        100% {
            left: 110px;
        }
    }
</style>
<!-- Initialize the Score Counter -->
<p id="myCounter">Score: 0</p>

<img id="character" src="/Images/mario2.gif">
<img id="coronavirus" src="/Images/corona3.gif">
<img id="enemy" src="/Images/sneeze.gif">
<img id="mask" src="/Images/mask.png">
<canvas id="myCanvas"></canvas>

<!-- JavaScript file for the game -->
<script src="game.js"></script>
<?php
    //Output the footer
    outputFooter();