<!DOCTYPE html>
<html>
    <head>
        <title>Appetizers & Salads</title>
        <link rel="stylesheet" href="../css/appetizers.css">
        <style>
            @media screen and (max-width: 739px){
            /* Dimentions: Iphone 12 Pro */

                h1{
                    margin-top: 11%;
                    margin-left: 12%;
                }
                .recipe{
                    width: 90%;
                    height: 27%;
                    margin-left: 5%;
                    margin-top: 13%;
                    display: block;
                }
                .img{
                    padding: 10px;
                }
                .img img{
                    height: 350px;
                    width: 335px;
                }
                .text{
                    width: 80%;
                    height: fit-content;
                    margin-left: 20px;
                }
            }
        </style>
    </head>

    <body>
        <?php
            include_once 'header.php';
        ?>

        <main>

            <h1>Appetizers & Salads</h1>

            <?php
               include_once '../models/printProducts.php';
               include_once '../repository/productRepository.php';
       
               $productRepository = new ProductRepository();
               $products = $productRepository->getAllProducts();


               foreach($products as $product){
                   if($product['Id']<=4){
                       printProductApp($product['Src'], $product['Name'], $product['Description']);
                   }
               }
            ?>

        </main>

        <br>
        <br>
        <br>

        <?php
            include_once 'footer.php';
        ?>
        
    </body>
</html>