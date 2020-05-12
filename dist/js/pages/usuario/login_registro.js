jQuery(function($){
    $("#registerform").hide();
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideToggle();
        $("#recoverform").slideToggle();
    });
    $('#to-register').on("click", function() {
        $("#loginform").slideToggle();
        $("#registerform").slideToggle();
    });
    $('#to-login').click(function(){        
        $("#registerform").slideToggle();
        $("#loginform").slideToggle();
    });
});
$(document).ready(function(){
    validarInputPassword();
    
});
function validarInputPassword()
{
    var password = document.getElementById("password")
      , confirm_password = document.getElementById("confirm");

    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Las Contraseñas no coinciden");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
}