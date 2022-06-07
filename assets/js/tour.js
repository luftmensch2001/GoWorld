$('.sidenav-link').click(function (e) { 
    e.preventDefault();
    
    $('.sidenav-link').removeClass("active");
    $(this).addClass("active");
});
$('#sidenav-tour').click(function (e) { 
    e.preventDefault();
    
    $('#tableTours').show();
    $('#tableTourHistory').hide();
    $('#btn-add').show();
});
$('#sidenav-history').click(function (e) { 
    e.preventDefault();
    
    $('#tableTours').hide();
    $('#tableTourHistory').show();
    $('#tableTourHistory').removeClass('hide');
    $('#btn-add').hide();
});

//rating
let ratingBox = document.querySelector("#rating-container");
let ratings = document.querySelectorAll('.rating');
// console.log(ratings.length);

for (var i = 0; i < ratings.length; i++) {
  ratings[i].addEventListener("mouseenter", (e) => {activateRating(Array.from(ratings)
                  .indexOf(e.target)); 
  });
  ratings[i].addEventListener("mouseleave", (e) => {deactivateRating(Array
                  .from(ratings)
                  .indexOf(e.target)); 
  });
}

function activateRating(idx) {
  for (var i = 0; i <= idx; i++) {
    ratings[i].classList.add("active");
  }
}

function deactivateRating(idx) {
  for (var i = 0; i <= idx; i++) {
    ratings[i].classList.remove("active");
  }
}

function rate(num) {
  console.log("Rating Selected: " + num);
  var idx = parseInt(num) - 1;
  for (var i = 0; i <= idx; i++) {
    ratings[i].classList.add("selected");
  }
  for (var i = idx + 1; i < ratings.length; i++) {
    ratings[i].classList.remove("selected");
  }
}