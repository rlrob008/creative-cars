$(document).ready(function(){
	$("#form-signin").submit(function(event){
		event.preventDefault();
		var username = $("#inputUsername").val();
        var password = $("#inputPassword").val();
		var submit = $("#form-submit").val();
		$("#form-message").load("login.php", {
			username: username,
			password: password,
			submit: submit
		});
	});
});