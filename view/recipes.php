<!DOCTYPE html>
<html>
    <head>
        <title>Recipes</title>
        <link rel="stylesheet" href="../css/recipes.css">
        <style>
            main{
                display: block;
            }

            .recipes{
                display: flex; 
                flex-wrap: wrap;
                justify-content: space-around;
                height: 50%;
                width: 80%;
                border: #125c78 1px;
                margin-top: 3%;
                margin-left: 10%;
            }

            .recipe img{
                width: 350;
                height: 443; 
                border-radius: 11px;
            }

            .title{
                font-size: 25px;
                margin-top: 3%;
                color: black;
                text-align: justify;
            }
            @media screen and (max-width: 739px){
                h1{
                    margin-top: 10%;
                    margin-bottom: 11%;
                }
            }
        </style>
    </head>

    <body>
        
        <?php
            include_once 'header.php';
        ?>

        <main>

            <h1>Categories</h1>
        
            <?php
                include_once '../models/printProducts.php';
                include_once '../models/products.php';
            ?>

            <div class="recipes">
                <?php 
                    foreach($productRecipes as $product){
                        printProductIndex($product['src'], $product['name'], $product['link']);
                    }
                ?>

            </div>

            

            <br>

        <?php
            include_once 'footer.php';
        ?>
        
    </body>
</html>