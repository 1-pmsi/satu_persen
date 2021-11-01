<?php
    require("connection.php");
if(isset($_POST["signin"]) ) {
    $username =$_POST["AdminName"];
    $password =$_POST["AdminPassword"];

    $result = mysqli_query($con, "SELECT * FROM admin_login WHERE 
    Admin_Name = '$username'");

    // Cek username
    if( mysqli_num_rows($result) === 1){

        // Cek Password
        $row = mysqli_fetch_assoc($result);

        if(password_hash($password, $row["password"])) {
            header("Location: ../dashboard-main/index.html");
            echo '<script language="javascript">';
            echo 'alert("Sign In Successfull")';
            echo '<script>';
            exit;
        }
    }

    $error = true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>satu persen</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<img src="background.jpg" alt="">

<br></br>
<div class="container" id="container">

    <!-- Sign UP -->
    <div class="form-container sign-up-container">
        <form action="#" method="POST">
            <h1>Create Account</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fa fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
        </div>
        <span>or use your email for registration</span>
        <input type="text" placeholder="Name" />
        <input type="email" placeholder="Email" />
        <input type="password" placeholder="Password" />
        <button>Sign Up</button>
        </form>
    </div>

<!-- Sing In -->
<div class="form-container sign-in-container">
    <form action="#" method="POST">
        <h1>Sign in</h1>
        <div class="social-container">
            <a href="#" class="social"><i class="fa fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="social"><i class="fa fa-linkedin"></i></a>
    </div>
    <span>or use your account</span>
    <?php if(isset($error)):?>
    <p style="color:red; font-style: italic;">username/password salah
    </p>

<?php endif; ?>
    <input type="text" placeholder="Username/Email" name="AdminName"/>
    <input type="password" placeholder="Password" name="AdminPassword" />
    <a href="#">Forgot your password</a>
    <button type="submit" name="signin">Sign In</button>
    </form>
</div>

<!-- Overlay container -->

<div class="overlay-container">
    <div class="overlay">
        <div class="overlay-panel overlay-left">
            <h1>Welcome Back!</h1>
            <p>To keep connected with us please login with your personal info</p>
            <button class="buttons" id="signIn">Sign In</button>
        </div>
        <div class="overlay-panel overlay-right">
            <h1>Hello Friend!</h1>
            <p>Enter your personal details and start journy with "satu%"</p>
            <button class="buttons" id="signUp">Sign Up</button>
        </div>
    </div>
</div>
</div>
</body>

<script>
const signUpButton = document.getElementById('singUp');
const signInButton = document.getElementById('singIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});
signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});
</script>
</html>