$(document).ready(function() {
	$('#registration').click(function() {

		var email = $("#email").val();
		var password = $("#password").val();
		var password_repeat = $("#password_repeat").val();
		
		$.post('../../../system/app/ajaxrequests/registration.php', { registration: "", email: email, password: password, password_repeat: password_repeat}, function(result) 
		{
			if (result == 'succes' || result == 'ref_errorsucces')
			{
				window.location.href = "/location-hotel";
			}
			else
			{
				window.location.href = "#error";
				$(".error").fadeIn("18000").css('display', 'block');
				if (language == 'en') {
					if (result == "register_disable")
					{
						$(".error").text("Registration is currently disabled.");
					}
					else if (result == "empty_password")
					{
						$(".error").text("You forgot to enter the password.");
					}
					else if (result == "empty_password_repeat")
					{
						$(".error").text("Make sure your password is the same.");
					}
					else if (result == "empty_email")
					{
						$(".error").text("You cannot leave the email address blank.");
					}
					else if (result == "valid_email")
					{
						$(".error").text("You entered an invalid email address.");
					}
					else if (result == "used_email")
					{
						$(".error").text("This email address is already in use.");
					}
					else if (result == "short_password")
					{
						$(".error").text("Your password must be very short, at least 6 characters.");
					}
					else if (result == "password_repeat_error")
					{
						$(".error").text("The passwords don't match.");
					}
					else if (result == "to_many_ip")
					{
						$(".error").text("You cannot create any more accounts.");
					}
					else if (result == "robot")
					{
						$(".error").text("Robot");
					}
					else if (result == 'ref_error')
					{
						$(".error").text('Referrer user is not a good match!');
					}
					else
					{
						$(".error").text("We encountered a problem, refresh the page.").css('display', 'block');
						console.log(result);
					}
				}
			}
		});
	});
});