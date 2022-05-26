//element

var header = document.querySelector('.header');
var loginForm = document.querySelector('.container__form');
var headerSignupBtn = document.querySelector('.form-signup__header-signup');
var headerLoginBtn = document.querySelector('.form-signup__header-login');
var formSignup = document.querySelector('.container__form-signup');
var formLogin = document.querySelector('.container__form-login');

// variable

var headerHeight = header.offsetHeight;

//funtion declare

headerLoginBtnClick = function() {
    headerSignupBtn.style.color = '#F8EBFF';
    headerSignupBtn.style.borderColor = 'transparent';
    formSignup.style.display = 'none';

    headerLoginBtn.style.color = 'var(--underline-color)';
    headerLoginBtn.style.borderColor = 'var(--underline-color)';
    formLogin.style.display = 'block';
};
// add Event

window.addEventListener("scroll", (event) => {
    var topPos = loginForm.getBoundingClientRect().top;
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
    
});

headerSignupBtn.onclick = function(e) {
    e.preventDefault();
    headerSignupBtn.style.color = 'var(--underline-color)';
    headerSignupBtn.style.borderColor = 'var(--underline-color)';
    formSignup.style.display = 'block';

    headerLoginBtn.style.color = '#F8EBFF';
    headerLoginBtn.style.borderColor = 'transparent';
    formLogin.style.display = 'none';

    loginForm.style.height = '600px';
}

headerLoginBtn.onclick = function(e) {
    e.preventDefault();
    headerSignupBtn.style.color = '#F8EBFF';
    headerSignupBtn.style.borderColor = 'transparent';
    formSignup.style.display = 'none';

    headerLoginBtn.style.color = 'var(--underline-color)';
    headerLoginBtn.style.borderColor = 'var(--underline-color)';
    formLogin.style.display = 'block';

    loginForm.style.height = '500px';
}