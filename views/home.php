    <body>
        <header>
            <h1>CATS? or DOGS?</h1>
        </header>
        
        <div>
            <a href="../signupController.php"><section id="catButton">
                <!--<img class="slides" src="http://www.partnershipforpets.org/images/bigstock_Kitten_on_a_white_background_27948998-new%20copy.png">-->
                <img class="catSlides" src="views/Images/CatImages/orangeCatOnBack.jpg">
                <img class="catSlides" src="views/Images/CatImages/moreKittens.jpg">
                <img class="catSlides" src="views/Images/CatImages/whatsThatCat.jpg">
            </section></a>
            
            <a href="../signupController.php"><section id="bothButton">
                <!--<img class="slides" src="http://i0.wp.com/www.forkauaionline.com/wp-content/uploads/2016/02/Cute-puppy-kissing-kitten-for-Animal-Chat-clear-background.png?fit=1280%2C862">-->
                <img class="bothSlides" src="views/Images/DogImages/wrinklyPuppy.jpg">
                <img class="bothSlides" src="views/Images/CatImages/greyCat.jpg">
                <img class="bothSlides" src="views/Images/DogImages/wetHound.jpg">
                <img class="bothSlides" src="views/Images/CatImages/orangeCatOnBack.jpg">
                <img class="bothSlides" src="views/Images/DogImages/radBeatsDawg.jpg">
                <img class="bothSlides" src="views/Images/CatImages/moreKittens.jpg">
                <img class="bothSlides" src="views/Images/DogImages/pickMePupp.jpg">
                <img class="bothSlides" src="views/Images/CatImages/bowTieKitten.jpg">
                <img class="bothSlides" src="views/Images/DogImages/iGotABallPup.jpg">
                <img class="bothSlides" src="views/Images/CatImages/whatsThatCat.jpg">
                
            </section></a>
            
            <a href="../signupController.php"><section id="dogButton">
                <!--<img class="slides" src="http://www.hd-wallpapersdownload.com/upload/bulk-upload/images-for-puppy.jpg">-->
                <img class="dogSlides" src="views/Images/DogImages/pickMePupp.jpg">
                <img class="dogSlides" src="views/Images/DogImages/radBeatsDawg.jpg">
                <img class="dogSlides" src="views/Images/DogImages/wetHound.jpg">
                <img class="dogSlides" src="views/Images/DogImages/wrinklyPuppy.jpg">
                
            </section></a>
            
        </div>
        <script>
            var myIndex1= 0;
            var myIndex2= 0;
            var myIndex3= 0;
            var count= 0;
            slideshow1();
            slideshow2();
            slideshow3();
            
            function slideshow1() {
                var i;
                var x= document.getElementsByClassName("catSlides");
                for (i= 0; i < x.length; i++) {
                   x[i].style.display= "none";  
                }
                myIndex1++;
                if (myIndex1 > x.length) {myIndex1= 1}    
                x[myIndex1-1].style.display= "block";  
                setTimeout(slideshow1, 1800);    
            }
            
            function slideshow2() {
                var i;
                var x= document.getElementsByClassName("bothSlides");
                for (i= 0; i < x.length; i++) {
                   x[i].style.display= "none";  
                }
                myIndex2++;
                if (myIndex2 > x.length) {myIndex2= 1}
                if (count < 1) {
                    x[myIndex2-1].style.display = "block";  
                    setTimeout(slideshow2, 2000);
                } else {
                    x[myIndex2-1].style.display = "block";  
                    setTimeout(slideshow2, 1800);  
                }
                count++;
            }
            
            function slideshow3() {
                var i;
                var x= document.getElementsByClassName("dogSlides");
                for (i= 0; i < x.length; i++) {
                   x[i].style.display= "none";  
                }
                myIndex3++;
                if (myIndex3 > x.length) {myIndex3= 1}
                if (count < 2) {
                    x[myIndex3-1].style.display= "block";  
                    setTimeout(slideshow3, 2200);
                } else {
                    x[myIndex3-1].style.display= "block";  
                    setTimeout(slideshow3, 1800);  
                }
                count++;
            }
        </script>
