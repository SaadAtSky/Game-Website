<?php
    //Include the PHP functions to be used on the page 
    include('common.php'); 

    //Output header
    outputBoilerplate("Register"); 
?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/register.css">

<?php
  //Output Navigation bar
  outputNavigation();
  ?>
<script>
    /*functions to validate Email address, Phone number, and password*/
    function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    function validatePhone(phone) {
        const re = /\s*(([+](\s?\d)([-\s]?\d)|0)?(\s?\d)([-\s]?\d){9}|[(](\s?\d)([-\s]?\d)+\s*[)]([-\s]?\d)+)\s*/;
        return re.test(phone);
    }
    function validatePassword(password) {
        const re = /^[0-9a-zA-Z]{8,}$/;
        return re.test(password);
    }

    /* ensure that all required fields are filled correctly*/
    function validateForm() {
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var username = document.getElementById("username").value;
        var phone = document.getElementById("phoneNumber").value;
        if (email == "" || password == "" || username == "" || phone == "") {
            alert("Please fill all the required fields before submitting");
            return false;
        }
        if (!validateEmail(email)) {
            alert("Please enter a valid email address");
            return false;
        }
        if (!validatePhone(phone)) {
            alert("Please enter a valid Phone number");
            return false;
        }
        if (!validatePassword(password)) {
            alert("The password must contain at least 8 characters");
            return false;
        }
        else {
            return true;
        }
    }
    
    /*Store user details in JSON format in local storage*/
    function storeUser() {
        if (validateForm()) {
            var usrObject = {};
            usrObject.email = document.getElementById("email").value;
            usrObject.password = document.getElementById("password").value;
            usrObject.username = document.getElementById("username").value;
            usrObject.phoneNumber = document.getElementById("phoneNumber").value;
            usrObject.topScore = 0;
            usrObject.loggedIn = true;
            localStorage[usrObject.email] = JSON.stringify(usrObject);
            alert("registeration successful");
        }
    }

</script>
<!--Sign up form-->
<div class="signup-form">
    <form>
        <h2>Create Account</h2>
        <p class="lead">It's free and hardly takes more than 30 seconds.</p>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                    required="required">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address"
                    required="required">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone number"
                    required="required">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-lock"></i>
                    <i class="fa fa-check"></i>
                </span>
                <input type="text" class="form-control" id="password" name="password" placeholder="Password"
                    required="required">
            </div>
        </div>
        <div class="form-group">
            <button onclick="storeUser()" type="submit" class="btn btn-primary btn-block btn-lg">Sign Up</button>
        </div>
        <p class="small text-center">By clicking the Sign Up button, you agree to our <br><a href="#">Terms &amp;
                Conditions</a>, and <a href="#">Privacy Policy</a>.</p>
    </form>
    <div class="text-center">Already have an account? <a href="login.php">Login here</a>.</div>
</div>

<?php
    //Output the footer
    outputFooter();
?>