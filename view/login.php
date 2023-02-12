<?php
include_once '../database/databaseConnection.php';

session_start();
if(isset($_SESSION['email'])){
    header("location: dashboard.php");
}else{
?>

<!DOCTYPE html>
<html>
    <head>
        <title>LogIn</title>
        <link rel="stylesheet" href="../css/login.css">
        <style>
            .container{
                background: linear-gradient(45deg,rgb(227, 158, 75),rgb(234, 164, 159));
                /* background-color: #a4a4ba; */
            }
            @media screen and (max-width: 739px){
            /* Dimentions: Iphone 12 Pro */

                .container{
                    height: 84.4vh;
                    width: 100%;
                }
                
                .main-container{
                    width: 350px;
                }
            }
        </style>
    </head>
    <body>
        
        <?php
            include_once 'header.php';
        ?>

    <main>
        <div class="container">
            <form action="../controller/loginValidate.php" method="post">
                <div class="main-container">
                    <h1>Login</h1>
                    <div class="content">

                        <div class="input-field">
                            <input type="email" name="email" placeholder="EMAIL" autocomplete="nope" id="contact-email" onkeyup="validateEmail()">
                            <span id="email-error"></span>
                        </div>
                        <div class="input-field">
                            <input type="password" name="password" placeholder="PASSWORD" autocomplete="new-password" id="contact-pwd" onkeyup="validatePwd()">
                            <span id="pwd-error"></span>
                        </div>

                        

                        <div class="action">
                            <a href="register.php">Register</a>
                            <button  onclick="return validateForm()" type="submit" value="login" name="loginBtn">Sign-In</button>
                            <span id = "submit-error"></span>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </main>

    <?php
        include_once 'footer.php';
    ?>

    <script src="../js/login.js"></script>
    
    </body>
</html>

<?php
}
?>