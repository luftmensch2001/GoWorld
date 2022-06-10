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

var btnMinusTicketAdult = document.querySelector('#btDownCountAdult');
var btnAddTicketAdult = document.querySelector('#btUpCountAdult');
var btnMinusTicketChild = document.querySelector('#btDownCountChild');
var btnAddTicketChild = document.querySelector('#btUpCountChild');


// variable

var defaultPosBookForm = 164;
var containerHeight = container.clientHeight;
var adultTicketPrice = document.querySelector('.ticket-price .adult-price').innerText.replace(/[.]/g, "") - 0;
var childTicketPrice = document.querySelector('.ticket-price .child-price').innerText.replace(/[.]/g, "") - 0;


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
    var hiddenTotalPrice = document.querySelector('#hiddenTotalPrice');
    hiddenTotalPrice.value = totalPrice;
};

function decreaseAdultTicket() {
    var countNumber = document.getElementById('cntAdultTicket');
    var countNumberConfirm = document.getElementById('cntAdultTicket-confirm');
    var hiddenCountAdult = document.getElementById('hiddenCountAdult');
    var value = (countNumber.innerText - 0);
    if (value > 1)
        countNumber.innerText = value - 1;
    hiddenCountAdult.value = countNumber.innerHTML;
    countNumberConfirm.innerHTML = countNumber.innerHTML;
};

function increaseAdultTicket() {
    var countNumber = document.getElementById('cntAdultTicket');
    var countNumberConfirm = document.getElementById('cntAdultTicket-confirm');
    var hiddenCountAdult = document.getElementById('hiddenCountAdult');
    var value = (countNumber.innerText - 0);
    countNumber.innerText = value + 1;
    hiddenCountAdult.value = countNumber.innerHTML;
    countNumberConfirm.innerHTML = countNumber.innerHTML;
};

function decreaseChildTicket() {
    var countNumber = document.getElementById('cntChildTicket');
    var countNumberConfirm = document.getElementById('cntChildTicket-confirm');
    var hiddenCountChild = document.getElementById('hiddenCountChild');
    var value = (countNumber.innerText - 0);
    if (value > 0)
        countNumber.innerText = value - 1;
    hiddenCountChild.value = countNumber.innerHTML;
    countNumberConfirm.innerHTML = countNumber.innerHTML;
};

function increaseChildTicket() {
    var countNumber = document.getElementById('cntChildTicket');
    var countNumberConfirm = document.getElementById('cntChildTicket-confirm');
    var hiddenCountChild = document.getElementById('hiddenCountChild');
    var value = (countNumber.innerText - 0);
    countNumber.innerText = value + 1;
    hiddenCountChild.value = countNumber.innerHTML;
    countNumberConfirm.innerHTML = countNumber.innerHTML;
};


function changeDateCome() {
    dateCome.innerHTML = dateComeConfirm.innerHTML;
}

function changeDateComeConfirm() {
    dateComeConfirm.innerHTML = dateCome.innerHTML;
}

function changeDateLeave() {
    dateLeave.innerHTML = dateLeaveConfirm.innerHTML;
}

function changeDateLeaveConfirm() {
    dateLeaveConfirm.innerHTML = dateLeave.innerHTML;
}

// add Event

window.addEventListener("scroll", (event) => {

    var marginTopValue = Math.min(Math.ceil(this.scrollY), (containerHeight - defaultPosBookForm));

    if (marginTopValue + bookForm.offsetHeight <= (containerHeight - defaultPosBookForm))
        bookForm.style.marginTop = marginTopValue + 'px';

});

btnBookTour.onclick = function () {
    overlayBookTourConfirm.style.visibility = 'visible';
};

modelOverlay.onclick = function () {
    overlayBookTourConfirm.style.visibility = 'hidden';
}


btnMinusTicketAdult.addEventListener('click', decreaseAdultTicket);
btnMinusTicketAdult.addEventListener('click', updateTotalPrice);

btnAddTicketAdult.addEventListener('click', increaseAdultTicket);
btnAddTicketAdult.addEventListener('click', updateTotalPrice);

btnMinusTicketChild.addEventListener('click', decreaseChildTicket);
btnMinusTicketChild.addEventListener('click', updateTotalPrice);

btnAddTicketChild.addEventListener('click', increaseChildTicket);
btnAddTicketChild.addEventListener('click', updateTotalPrice);


dateCome.addEventListener('change', changeDateComeConfirm);
dateComeConfirm.addEventListener('change', changeDateCome);
dateLeave.addEventListener('change', changeDateLeaveConfirm);
dateLeaveConfirm.addEventListener('change', changeDateLeave);