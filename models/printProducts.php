<?php

    function printProductIndex($src, $name, $link){
        echo "
            <div class='recipe'>
                <p><a href='$link'><img src='$src' alt=''></a><br></p>
                <p><a href='$link' class='title'>$name</a></p>
                <br>
                <br>
                <br>
                <br>
            </div>
        ";
    }
    

    function printProductApp($src, $name, $description){
            echo"
            <div class='recipe'>
                    <div class='img'>
                        <img src=$src alt='recipe 1'>
                    </div>
    
                    <div class='text'>
    
                        <h3>$name</h3>
    
                        <p>$description</p>
    
                    </div>
            </div>
            ";
    }


    function printAboutUs($src){
        echo "
        <div class='pic'>
            <img src=$src alt=''>
        </div>
        ";
    }

    function printAboutUsText($title, $description, $description2, $p1, $p2, $p3){
        echo "

        <div class='content'>
            <div class='histori'>
                <h2>$title</h2>
                <br>
                <p>$description</p>
                <br>
                <p>$description2</p>
            </div>

            <div class='contact'>
                    <div class='text'>
                        <p>$p1</p>
                        <p>$p2</p>
                        <p>$p3</p>
                    </div>
                </div>
        </div>


        ";
    }


    function printSlider($src){
        echo "
                <div class='images'>
                    <img src='$src' alt='foto 1' class='slide' style='width: 6.3%; height: 100%;'> 
                    <img src='$src' alt='foto 2' class='slide' style='width: 20%; height: 100%;'>                     
                    <img src='$src' alt='foto 3' class='slide' style='width: 6.3%; height: 100%;'> 
                    <img src='$src' alt='foto 4' class='slide' style='width: 6.3%; height: 100%;'> 
                    <img src='$src' alt='foto 5' class='slide' style='width: 6.3%; height: 100%;'> 
                    <img src='$src' alt='foto 6' class='slide' style='width: 6.3%; height: 100%;'> 
                </div>
        ";
    }

    

    
?>