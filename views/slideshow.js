var myIndex1 = 0;
var myIndex2 = 0;
var myIndex3 = 0;
slideshow1();
slideshow2();
slideshow3();

function slideshow1() {
    var i;
    var x = document.getElementsByClassName("catSlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex1++;
    if (myIndex1 > x.length) {myIndex1 = 1}    
    x[myIndex1-1].style.display = "block";  
    setTimeout(slideshow1, 9600);    
}

function slideshow2() {
    var i;
    var x = document.getElementsByClassName("bothSlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex2++;
    if (myIndex2 > x.length) {myIndex2 = 1}    
    x[myIndex2-1].style.display = "block";  
    setTimeout(slideshow2, 9600);    
}

function slideshow3() {
    var i;
    var x = document.getElementsByClassName("dogSlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex3++;
    if (myIndex3 > x.length) {myIndex3 = 1}    
    x[myIndex3-1].style.display = "block";  
    setTimeout(slideshow3, 9600);    
}