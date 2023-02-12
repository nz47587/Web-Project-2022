<!DOCTYPE html>
<html>
    <head>
        <title>About Us</title>
        <link rel="stylesheet" href="../css/aboutUs.css">
        <style>
            @media screen and (max-width: 739px) {
            /* Dimentions: Iphone 12 Pro */

                .content{
                    display: block;
                }
                .histori{
                    width: 83%;
                    height: 30%;
                    margin-top: 4%;
                    margin-left: 11.7px;
                }
                .contact{
                    width: 93%;
                    height: 350px;
                    margin-top: 9%;
                    margin-bottom: 0;
                    margin-left: 11.7px;
                }
            }
        </style>
    </head>

    <body>
        <?php
            include_once 'header.php';
        ?>

        <main>
            <?php
                include_once '../models/products.php';
                include_once '../models/printProducts.php';
                include_once '../repository/productRepository.php';
        
                $productRepository = new ProductRepository();
                $images = $productRepository->getAllImages();
 
 
                foreach($images as $image){
                    if($image['Id'] == 4){
                        printAboutUs("../img/".$image['file_name']);
                    }
                }

                foreach($aboutUs as $about){
                    printAboutUsText($about['title'], $about['description'], $about['description2'], $about['p1'], $about['p2'], $about['p3']);
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