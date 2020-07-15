<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login/Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/login-register.css" rel="stylesheet" type="text/css">
    <link href="../css/form.module.css" rel="stylesheet" type="text/css">
    <link href="../css/basic.css" rel="stylesheet" type="text/css">
</head>
<body class="login-register">
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="../../controller/CreateUserHandler.php" method="post">
            <h2>Create Account</h2>
            <div id="register-full-name" class="input-group">
                <input name="fullName" type="text" required/>
                <label>Full name</label>
                <span class="bar"></span>
                <span class="error"></span>
            </div>
            <div id="register-email" class="input-group">
                <input name="email" type="text" required/>
                <label>Email</label>
                <span class="bar"></span>
                <?php echo '<span class="error">'.$usernameFoundErrorMsg.'</span>'?>
            </div>
            <div id="register-password" class="input-group">
                <input name="password" type="password" required/>
                <label>Password</label>
                <span class="bar"></span>
                <span class="error"></span>
            </div>
            <button class="btn btn-submit"
                    style="margin-top: 2em"
                    type="submit"
                    onclick="
                    validateName('register-full-name')
                    validateEmail('register-email')
                    validateLength('register-password', 6, 20)
                    validatePassword('register-password')">Sign Up
            </button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="../../controller/UserLoginSession.php" method="get">
            <h2>Sign in</h2>
            <input type="hidden" name="location" value="<?php echo htmlspecialchars($_GET['location']);?>">
            <div id="login-email" class="input-group">
                <input name="username" type="text" required/>
                <label>Email</label>
                <span class="bar"></span>
                <span class="error"></span>
            </div>
            <div id="login-password" class="input-group">
                <input name="password" type="password" required/>
                <label>Password</label>
                <span class="bar"></span>
                <span class="error"></span>
            </div>
            <a>Forgot your password?</a>
            <button id="submit" class="btn btn-submit">Sign In</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h2>Welcome Back!</h2>
                <p>To keep connected with us please login with your personal info</p>
                <button class="primary-button" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h2>Hello, Friend!</h2>
                <p>Enter your personal details and start journey with us</p>
                <button class="primary-button" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>
<script src="../../js/login-register.js"></script>
<script src="../../js/form-validation.js"></script>
</body>
</html>