//element

var header = document.querySelector('.header');
var slider = document.querySelector('.container__slider');

var previousBtn = document.querySelector('.container__slider-previous');
var nextBtn = document.querySelector('.container__slider-next');

// variable

var headerHeight = header.offsetHeight;

// add Event

window.addEventListener("scroll", (event) => {
    var topPos = slider.getBoundingClientRect().top;
    if (topPos <= headerHeight)
    {     
        header.style.borderBottom = "2px solid #dbdbdb";
        header.style.backgroundColor = '#ffffff';
        
    }
    else
    {
        header.style.borderBottom = 'none';
        header.style.backgroundColor = 'transparent';
    }
})


previousBtn.onclick = function() {
    var imgPrepareLeft = document.querySelector('.container__slider-img-prepare-left');
    var imgLeft = document.querySelector('.container__slider-img-left');
    var imgMid = document.querySelector('.container__slider-img-mid');
    var imgRight = document.querySelector('.container__slider-img-right');
    var imgPrepareRight = document.querySelector('.container__slider-img-prepare-right');
    
    imgPrepareRight.src = imgRight.src;
    imgRight.src = imgMid.src;
    imgMid.src = imgLeft.src;
    imgLeft.src = imgPrepareLeft.src;

    var backgroundImage = document.getElementById('background-img');
    backgroundImage.src = imgMid.src;

}

nextBtn.onclick = function() {
    var imgPrepareLeft = document.querySelector('.container__slider-img-prepare-left');
    var imgLeft = document.querySelector('.container__slider-img-left');
    var imgMid = document.querySelector('.container__slider-img-mid');
    var imgRight = document.querySelector('.container__slider-img-right');
    var imgPrepareRight = document.querySelector('.container__slider-img-prepare-right');
   
    imgPrepareLeft.scr =imgLeft.src;
    imgLeft.src = imgMid.src;
    imgMid.src = imgRight.src;
    imgRight.src = imgPrepareRight.src;

    var backgroundImage = document.getElementById('background-img');
    backgroundImage.src = imgMid.src;
}

