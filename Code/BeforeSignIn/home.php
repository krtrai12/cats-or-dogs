<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>catsordogs</title>
    <link rel="stylesheet" href="veiws/style.css">
    </head>
    
    <body>
        <header>
            <h1>CATS? or DOGS?</h1>
        </header>
        
        <section id="catButton">
            <img class="slides" src="cats-or-dogs/Images/CatImages/greyCat.jpg">
            <img class="slides" src="cats-or-dogs/Images/CatImages/orangeCatOnBack.jpg">
            <img class="slides" src="cats-or-dogs/Images/CatImages/moreKittens.jpg">
            <img class="slides" src="cats-or-dogs/Images/CatImages/bowTieKitten.jpg">
            <img class="slides" src="cats-or-dogs/Images/CatImages/whatsThatCat.jpg">
            
            <script>
            var myIndex = 0;
            carousel();
    
            function carousel() {
                var i;
                var x= document.getElementsByClassName("slides");
                for (i= 0; i < x.length; i++) {
                    x[i].style.display = "none";  
                }
                myIndex++;
                
                if (myIndex > x.length) {
                    myIndex = 1
                }
                
                x[myIndex-1].style.display = "block";  
                setTimeout(carousel, 2000);    
            }
            </script>
        </section>
        
        <section id="bothButton">
            
        </section>
        
        <section id="dogButton">
            
        </section>
        
        <?php require('veiws/footerSignedOut.php'); ?>
    </body>
</html>