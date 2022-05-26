// element

var bookForm = document.querySelector('.container__book-form');
var container = document.querySelector('.container');
var btnBookTour = document.getElementById('btn-booktour');
var overlayBookTourConfirm = document.getElementById('overlay-book-confirm');
var modelOverlay = document.getElementById('modal-overlay-book-confirm');
var btnCancelBookTour = document.getElementById('btn-cancel-booktour');

var dateCome = document.getElementById('dateCome');
var dateComeConfirm = document.getElementById('dateCome-confirm');
var dateLeave = document.getElementById('dateLeave');
var dateLeaveConfirm = document.getElementById('dateLeave-confirm');

var btnMinusTicketAdult = document.querySelector('.container__book-form-ticket .adult-ticket button:nth-child(2)');
var btnAddTicketAdult = document.querySelector('.container__book-form-ticket .adult-ticket button:nth-child(4)');
var btnMinusTicketChild = document.querySelector('.container__book-form-ticket .child-ticket button:nth-child(2)');
var btnAddTicketChild = document.querySelector('.container__book-form-ticket .child-ticket button:nth-child(4)');

var btnMinusTicketAdultInConfirm = document.querySelector('.book-confirm__row .adult-ticket-confirm button:nth-child(1)');
var btnAddTicketAdultInConfirm = document.querySelector('.book-confirm__row .adult-ticket-confirm button:nth-child(3)');
var btnMinusTicketChildInConfirm = document.querySelector('.book-confirm__row .child-ticket-confirm button:nth-child(1)');
var btnAddTicketChildInConfirm = document.querySelector('.book-confirm__row .child-ticket-confirm button:nth-child(3)');

// variable

var defaultPosBookForm = 164;
var containerHeight = container.clientHeight;
var adultTicketPrice = document.querySelector('.ticket-price .adult-price').innerText.replace(/[.]/g,"") - 0;
var childTicketPrice = document.querySelector('.ticket-price .child-price').innerText.replace(/[.]/g,"") - 0;


// function 

 function calcTourTotalPrice() {
    var cntAdultTicket = document.getElementById('cntAdultTicket').innerText - 0;
    var cntChildTicket = document.getElementById('cntChildTicket').innerText - 0;
    
    return cntAdultTicket * adultTicketPrice + cntChildTicket * childTicketPrice;
}

function updateTotalPrice() {
    var totalPrice = calcTourTotalPrice();
    var bookFormPrice = document.querySelector('.container__book-form-price');
    var bookConfirmPrice = document.getElementById('book-confirm-price');
    bookFormPrice.innerText = totalPrice.toLocaleString('vi-VN') + ' VND';
    bookConfirmPrice.textContent = totalPrice.toLocaleString('vi-VN') + ' VND';
};

function decreaseAdultTicket() {
    var countNumber = document.getElementById('cntAdultTicket');
    var value = (countNumber.innerText - 0);
    if (value > 1 )
        countNumber.innerText = value - 1;
};

function increaseAdultTicket() {
    var countNumber = document.getElementById('cntAdultTicket');
    var value = (countNumber.innerText - 0);
    countNumber.innerText = value + 1;
};

 function decreaseChildTicket() {
    var countNumber = document.getElementById('cntChildTicket');
    var value = (countNumber.innerText - 0);
    if (value > 0 )
        countNumber.innerText = value - 1;
};

 function increaseChildTicket() {
    var countNumber = document.getElementById('cntChildTicket');
    var value = (countNumber.innerText - 0);
    countNumber.innerText = value + 1;
};



function decreaseAdultTicketInConfirm() {
    var countNumber = document.getElementById('cntAdultTicket-confirm');
    var value = (countNumber.textContent - 0);
    if (value > 1 )
        countNumber.textContent = value - 1;
};

function increaseAdultTicketInConfirm() {
    var countNumber = document.getElementById('cntAdultTicket-confirm');
    var value = (countNumber.textContent - 0);
    countNumber.textContent = value + 1;
};

 function decreaseChildTicketInConfirm() {
    var countNumber = document.getElementById('cntChildTicket-confirm');
    var value = (countNumber.textContent - 0);
    if (value > 0 )
        countNumber.textContent = value - 1;
};

 function increaseChildTicketInConfirm() {
    var countNumber = document.getElementById('cntChildTicket-confirm');
    var value = (countNumber.textContent - 0);
    countNumber.textContent = value + 1;
};


function changeDateCome() {
    dateCome.value = dateComeConfirm.value;
}

function changeDateComeConfirm() {
    dateComeConfirm.value = dateCome.value;
}

function changeDateLeave() {
    dateLeave.value = dateLeaveConfirm.value;
}

function changeDateLeaveConfirm() {
    dateLeaveConfirm.value = dateLeave.value;
}

// add Event

window.addEventListener("scroll", (event) => {

    var marginTopValue = Math.min(Math.ceil(this.scrollY), (containerHeight - defaultPosBookForm));

    if (marginTopValue + bookForm.offsetHeight <= (containerHeight - defaultPosBookForm))
        bookForm.style.marginTop = marginTopValue + 'px';
        
});

btnBookTour.onclick = function() {
    overlayBookTourConfirm.style.visibility = 'visible';
};

modelOverlay.onclick = function() {
    overlayBookTourConfirm.style.visibility = 'hidden';
}

btnCancelBookTour.onclick = function() {
    overlayBookTourConfirm.style.visibility = 'hidden';
}

btnMinusTicketAdult.addEventListener('click', decreaseAdultTicket);
btnMinusTicketAdult.addEventListener('click', decreaseAdultTicketInConfirm);
btnMinusTicketAdult.addEventListener('click', updateTotalPrice);

btnAddTicketAdult.addEventListener('click', increaseAdultTicket);
btnAddTicketAdult.addEventListener('click', increaseAdultTicketInConfirm);
btnAddTicketAdult.addEventListener('click', updateTotalPrice);

btnMinusTicketChild.addEventListener('click', decreaseChildTicket);
btnMinusTicketChild.addEventListener('click', decreaseChildTicketInConfirm);
btnMinusTicketChild.addEventListener('click', updateTotalPrice);

btnAddTicketChild.addEventListener('click', increaseChildTicket);
btnAddTicketChild.addEventListener('click', increaseChildTicketInConfirm);
btnAddTicketChild.addEventListener('click', updateTotalPrice);



btnMinusTicketAdultInConfirm.addEventListener('click', decreaseAdultTicket);
btnMinusTicketAdultInConfirm.addEventListener('click', decreaseAdultTicketInConfirm);
btnMinusTicketAdultInConfirm.addEventListener('click', updateTotalPrice);

btnAddTicketAdultInConfirm.addEventListener('click', increaseAdultTicket);
btnAddTicketAdultInConfirm.addEventListener('click', increaseAdultTicketInConfirm);
btnAddTicketAdultInConfirm.addEventListener('click', updateTotalPrice);

btnMinusTicketChildInConfirm.addEventListener('click', decreaseChildTicket);
btnMinusTicketChildInConfirm.addEventListener('click', decreaseChildTicketInConfirm);
btnMinusTicketChildInConfirm.addEventListener('click', updateTotalPrice);

btnAddTicketChildInConfirm.addEventListener('click', increaseChildTicket);
btnAddTicketChildInConfirm.addEventListener('click', increaseChildTicketInConfirm);
btnAddTicketChildInConfirm.addEventListener('click', updateTotalPrice);

dateCome.addEventListener('change', changeDateComeConfirm);
dateComeConfirm.addEventListener('change', changeDateCome);
dateLeave.addEventListener('change', changeDateLeaveConfirm);
dateLeaveConfirm.addEventListener('change', changeDateLeave);