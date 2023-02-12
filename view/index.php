<?php
    include_once '../models/printProducts.php';
    include_once '../models/products.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/indexStyle.css">
        <style>
        /* --------------Recipes----------------- */

        h1{
            text-align: center;
            margin-top: 9.5%;
        }

        .recipes{
            display: flex; 
            flex-wrap: wrap;
            justify-content: space-evenly;
            height: 50%;
            width: 85%;
            border: #125c78 1px;
            margin-top: 3%;
            margin-left: 8%;
        }

        .recipe img{
            width: 392px;
            height: 510px; 
            border-radius: 11px;
        }

        .recipe :last-child{
            font-size: 25px;
            padding-top: 5px;
            color: black;
            
        }

        .recipe :last-child:hover{
            text-decoration: underline;
        }

        @media screen and (max-width: 739px) {
            /* Dimentions: Iphone 12 Pro */
            
            h1{
                text-align: center;
                margin-top: 12%;
                margin-bottom: 9%;
            }

            .recipes{
                /* display: flex;  */
                height: 50%;
                width: 70%;
                margin-top: 3%;
                margin-left: 15%;
            }

            .recipe img{
                width: 300px;
                height: 480px; 
            }

            /* ---------------Slider------------------ */

            .slider{
                height: 300px;
                width: 90%;
                margin-left: 5%;
            }

            .images{
                width: 400%;
                height: 100%;
            }

            .images img{
                width: 25%;
                height: 100%;
            }

            .buttons{
                margin-top: 3%;
                margin-left: 27%;
            }

        }
    
    </style>
    </head>
    <body>
        
        <?php
            include_once 'header.php';
        ?>

        <main>

        <div class="slider">
                <div class="images">

                    <?php  
                        include_once '../repository/productRepository.php';

                        $productRepository = new ProductRepository();
                        $images = $productRepository->getAllImages();

                        $i=0;

                        foreach($images as $image){
                            $i++;
                            if($image['Id']>=36 && $image['Id']<=41){
                                echo"
                                    <img src='../img/$image[file_name]' alt='foto $i' class='slide'> 
                                 ";
                            }
                        }
                    
                    ?>


                </div>
            </div>

            <div class="buttons">
                <label onclick="showFoto1()"></label>
                <label onclick="showFoto2()"></label>
                <label onclick="showFoto3()"></label>
                <label onclick="showFoto4()"></label>
                <label onclick="showFoto5()"></label>
                <label onclick="showFoto6()"></label>
            </div>

            <h1>Featured:</h1>

            <div class="recipes">
                <?php 
                    foreach($productIndex as $product){
                        printProductIndex($product['src'], $product['name'], $product['link']);
                    }
                ?>
            </div>

            <br>

        </main>

        <?php
            include_once 'footer.php';
        ?>
            
        <script>
            var foto = document.querySelector(".slide");
            
            function showFoto1(){
                foto.style.marginLeft="0";
            }
            function showFoto2(){
                foto.style.marginLeft="-25.12%";
            }
            function showFoto3(){
                foto.style.marginLeft="-50.2%";
            }
            function showFoto4(){
                foto.style.marginLeft="-75.25%";
            }
            function showFoto5(){
                foto.style.marginLeft="-100.35%";
            }
            function showFoto6(){
                foto.style.marginLeft="-125.45%";
            } 

        </script> 
        
    </body>
</html>
