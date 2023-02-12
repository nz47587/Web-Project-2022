<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <link rel="stylesheet" href="../css/register.css">
        <style>
            @media screen and (max-width: 739px){
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
            <form action="../controller/registerController.php" method="post">
                <div class="main-container">
                    <h1>Register</h1>
                    <div class="content">
                        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="text" name="name" placeholder="NAME" autocomplete="nope " id="contact-name" onkeyup="validateName()">
                            <span id="name-error"></span>
                            <input type="text" name="surname" placeholder="SURNAME" autocomplete="nope " id="contact-surnamename" onkeyup="validateName()">
                            <span id="surnamename-error"></span>
                            <input type="text" name="username" placeholder="USERNAME" autocomplete="nope" id="contact-username" onkeyup="validateUsername()">
                            <span id="username-error"></span>
                            <input type="email" name="email" placeholder="EMAIL" id="contact-email" onkeyup="validateEmail()">
                            <span id="email-error"></span>
                            <input type="password" name="password" placeholder="PASSWORD" autocomplete="new-password" id="contact-pwd" onkeyup="validatePwd()">
                            <span id="pwd-error"></span>

                            <div class="action">
                                <a href="login.php">LogIn</a>
                                <button onclick="return validateForm()" value="register" name="registerBtn">Submit</button>
                                <span id="submit-error"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
        </div>
   
    </main>

    <?php include_once '../controller/registerController.php'; ?>
    <?php include_once 'footer.php';?>

    <script src="../js/register.js"></script>
    
    </body>
</html>
