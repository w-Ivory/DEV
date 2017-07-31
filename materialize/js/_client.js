$(document).ready(function(){
	$(".button-collapse").sideNav();
    $('.carousel').carousel();
    $('.modal').modal();


	$(document).on('click', 'input[name="post_login_submit"]', function(){
	    var userInput = $('input[name="post_login_username"]');
	    var passInput = $('input[name="post_login_password"]');
	    var error = false;
	    var css='';
	    if(userInput.val() == '') {
	    	css = userInput.css('border-bottom');
	    	userInput.css('border-bottom', '1px solid red');
	    	setTimeout(function(){ userInput.css('border-bottom', css); }, 10000);
	    	error = true;
	    }
	    if(passInput.val() == '') {
	    	css = userInput.css('border-bottom');
	    	passInput.css('border-bottom', '1px solid red');
	    	setTimeout(function(){ passInput.css('border-bottom', css); }, 10000);
	    	error = true;
	    }

	    var formLogin = $('#form-login').serialize();
	    $.ajax({
            type: 'POST',
            url: '../ajax/login.ajax.php',
            data: formLogin,
            success: function(data){
              if(data == 'OK') {
              	window.location.href='http://localhost/panel/index.php';
              }
              else {
              	var $toastContent = $('<span>Nom d\'utlisateur ou mot de passe incorrecte.</span>');
  				Materialize.toast($toastContent, 10000);
              }
            },
            error: function(){
              alert('error');
            }
        });




	    if(error) {
	    	var $toastContent = $('<span>Vous avez laissé un ou plusieurs champs vide.</span>');
  			Materialize.toast($toastContent, 10000);
	    }
	});
		
});



