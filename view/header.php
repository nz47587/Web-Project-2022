<!DOCTYPE html>
<html lang="en">
<head>
    <title>Header</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        header{
            width: 100%;
            height: 70px;
            background-color:#f2f2f2; /*#f2f2f2 */
            display: flex;
            justify-content: flex-end;
            font-family: 'Rubik', sans-serif;
        }

        #logo{
            height: 80px;
            padding-right: 700px;
            align-self: center;
        }

        .nav{
            display: flex;
            align-items: center;
        }

        .nav li{
            list-style: none;
            margin-left: 20px;
        }

        .nav a{
            text-decoration: none;
            text-transform: uppercase;
            font-size: 130%;
            color: black;
            font-weight: bold;
        }

        li :last-child{
            margin-right: 20px;
        }

        header a:hover {
            transition: 0.5s;
            color: #219ecb;
        }

        @media screen and (max-width: 739px) {
            header{
                width: 100%;
                height: 70px;
            }

            #logo{
                height: 30px;
                padding-top: 23px;
                padding-right: 45px;
            }

            .nav li{
                list-style: none;
                margin-left: 2px;
            }

            .nav a{
                text-decoration: none;
                text-transform: uppercase;
                font-size: 50%;
                color: black;
                font-weight: bold;
            }

            li :last-child{
                margin-right: 20px;
            }

            header a:hover {
                transition: 0.5s;
                color: #219ecb;
            }
        }
    </style>
</head>
<body>
<header>
    <a href="index.php"><img src="/Web Project/img/logo.png" alt="Logo" id="logo"></a>

    <ul class="nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="recipes.php">Recipes</a></li>
        <li><a href="aboutUs.php">About Us</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
    </ul>
</header>
    
</body>
</html>