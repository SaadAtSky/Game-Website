<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 

    //Output header
    outputBoilerplate("Login"); 
?>

<link rel="stylesheet" type="text/css" href="/css/login1.css">
<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

<?php
//Output navigation bar
outputNavigation();
?>

<script>
    let cookies = document.cookie;

    function login() {
        //Get email address
        let email = document.getElementById("username").value;
        if (document.getElementById("password").value == "" || document.getElementById("username").value == "") {
            alert("Please fill the required fields")
        }
        else {
            //User does not have an accounts
            if (localStorage[email] === undefined) {
                //Inform user that they do not have an account
                alert("incorrect Password/Email Address");
                return; //Do nothing else
            }
            else {//User has an account
                let usrObj = JSON.parse(localStorage[email]);//Convert to object
                let password = document.getElementById("password").value;
                if (password === usrObj.password) {//Successful login
                    alert(usrObj.email + " logged in");
                    usrObj.loggedIn = true;
                    localStorage[usrObj.email] = JSON.stringify(usrObj);
                    sessionStorage.loggedInUsrEmail = usrObj.email;
                    window.open("http://localhost/game.php");
                    self.close();
                }
                else {
                    alert("incorrect Password/Email Address");
                }
            }
        }
    }

</script>
<!--Login form-->
<div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-t-30 p-b-50">
            <span class="login100-form-title p-b-41">
                Account Login
            </span>
            <form class="login100-form validate-form p-b-33 p-t-5">
                <div class="wrap-input100 validate-input" data-validate="Enter username">
                    <input class="input100" type="text" id="username" name="username" placeholder="Email Address">
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" id="password" name="pass" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>

                <div class="container-login100-form-btn m-t-32">
                    <button class="login100-form-btn" onclick="login()">
                        Login
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
<div id="dropDownSelect1"></div>
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="vendor/animsition/js/animsition.min.js"></script>
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<script src="vendor/countdowntime/countdowntime.js"></script>
<script src="js/main.js"></script>

<?php
    //Output the footer
    outputFooter();
?>