
function CheckNewPassword(){
    const newPassword = document.querySelector('#newPassword');
    const reNewPassword = document.querySelector('#reNewPassword');

    if (newPassword.value!=reNewPassword.value){
        newPassword.value = "";
        newPassword.style.border = "1px solid red";
        reNewPassword.style.border = "1px solid red";
        reNewPassword.value = "";
        return false;
    } else {
        return true;
    }   
    
}