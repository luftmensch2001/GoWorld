const table = document.getElementById("table");
// save all tr
const tr = table.getElementsByTagName("tr");

$('#search').keyup(function (e) { 
  e.preventDefault();

  search()
});

$('#amount-filter').change(function (e) { 
  e.preventDefault();
  
  search()
});

$('#arrivalDate-filter').change(function (e) { 
  e.preventDefault();
  
  search()
});

$('#leaveDate-filter').change(function (e) { 
  e.preventDefault();
  
  search()
});


function search() {
  var name = document.getElementById("search").value.toUpperCase();
  var amount = document.getElementById("amount-filter").value.toUpperCase();
  var arrivalDate = document.getElementById("arrivalDate-filter").value.toUpperCase();
  var leaveDate = document.getElementById("leaveDate-filter").value.toUpperCase();

  for (i = 1; i < tr.length; i++) {

    var rowName = tr[i].getElementsByTagName("td")[1].textContent.toUpperCase();
    var rowAmount = tr[i].getElementsByTagName("td")[3].textContent.toUpperCase();
    var rowArrivalDate = tr[i].getElementsByTagName("td")[4].textContent.toUpperCase();
    var rowLeaveDate = tr[i].getElementsByTagName("td")[5].textContent.toUpperCase();

    var isDiplay = true;

    if (rowName.indexOf(name) == -1 || (amount != 'ALL' && rowAmount != amount) || (arrivalDate != 'ALL' && rowArrivalDate != arrivalDate) || (leaveDate != 'ALL' && rowLeaveDate != leaveDate)) {
      isDiplay = false;
    }
    
    if (isDiplay) {
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }
}

//number-qty
(function( $ ) {

	$.fn.numberstyle = function(options) {

		/*
		 * Default settings
		 */
		var settings = $.extend({
			value: 0,
			step: undefined,
			min: undefined,
			max: undefined
		}, options );

		/*
		 * Init every element
		 */
		return this.each(function(i) {
				
      /*
       * Base options
       */
      var input = $(this);
          
			/*
       * Add new DOM
       */
      var container = document.createElement('div'),
          btnAdd = document.createElement('div'),
          btnRem = document.createElement('div'),
          min = (settings.min) ? settings.min : input.attr('min'),
          max = (settings.max) ? settings.max : input.attr('max'),
          value = (settings.value) ? settings.value : parseFloat(input.val());
      container.className = 'numberstyle-qty';
      btnAdd.className = (max && value >= max ) ? 'qty-btn qty-add disabled' : 'qty-btn qty-add';
      btnAdd.innerHTML = '+';
      btnRem.className = (min && value <= min) ? 'qty-btn qty-rem disabled' : 'qty-btn qty-rem';
      btnRem.innerHTML = '-';
      input.wrap(container);
      input.closest('.numberstyle-qty').prepend(btnRem).append(btnAdd);

      /*
       * Attach events
       */
      // use .off() to prevent triggering twice
      $(document).off('click','.qty-btn').on('click','.qty-btn',function(e){
        
        var input = $(this).siblings('input'),
            sibBtn = $(this).siblings('.qty-btn'),
            step = (settings.step) ? parseFloat(settings.step) : parseFloat(input.attr('step')),
            min = (settings.min) ? settings.min : ( input.attr('min') ) ? input.attr('min') : undefined,
            max = (settings.max) ? settings.max : ( input.attr('max') ) ? input.attr('max') : undefined,
            oldValue = parseFloat(input.val()),
            newVal;
        
        //Add value
        if ( $(this).hasClass('qty-add') ) {   
          
          newVal = (oldValue >= max) ? oldValue : oldValue + step,
          newVal = (newVal > max) ? max : newVal;
          
          if (newVal == max) {
            $(this).addClass('disabled');
          }
          sibBtn.removeClass('disabled');
         
        //Remove value
        } else {
          
          newVal = (oldValue <= min) ? oldValue : oldValue - step,
          newVal = (newVal < min) ? min : newVal; 
          
          if (newVal == min) {
            $(this).addClass('disabled');
          }
          sibBtn.removeClass('disabled');
          
        }
          
        //Update value
        input.val(newVal).trigger('change');
            
      });
      
      input.on('change',function(){
        
        const val = parseFloat(input.val()),
              min = (settings.min) ? settings.min : ( input.attr('min') ) ? input.attr('min') : undefined,
            	max = (settings.max) ? settings.max : ( input.attr('max') ) ? input.attr('max') : undefined;
        
        if ( val > max ) {
          input.val(max);   
        }
        
        if ( val < min ) {
          input.val(min);
        }
      });
      
		});
	};

  
  /*
   * Init
   */
  
	$('.numberstyle').numberstyle();

}( jQuery ));

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