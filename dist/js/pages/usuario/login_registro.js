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
});