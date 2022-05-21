$(document).ready(function() {
	$('#registration_checker').click(function() {

		var userid = $('#userid').val();
		var username = $('#username').val();
		var look = $('#avatar_code').val();
		var avatar_gender = $('#avatar_gender').val();
		
		$.post('../../../system/app/ajaxrequests/registration-checker.php', { registration_checker: "", userid: userid, username: username, look: look, avatar_gender: avatar_gender}, function(result) 
		{
			if (result == 'succes' || result == 'ref_errorsucces')
			{
				window.location.href = "/hotelv2";
			}
			else
			{
				window.location.href = "#error";
				$(".error").fadeIn("18000").css('display', 'block');
				if (language == 'en') {
					if (result == "empty_username")
					{
						$(".error").text("You cannot leave the username blank.");
					}
					else if (result == "register_disable")
					{
						$(".error").text("Registration is currently disabled.");
					}
					else if (result == "used_username")
					{
						$(".error").text("This username is already in use.");
					}
					else
					{
						window.location.reload()
					}
				}
			}
		});
	});
});

function checkUsernameOrEmail(str, methode) 
{
	if (str.length == 0) { 
	    return;
	} 
	else 
	{
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
	        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	            if (methode == "username")
			    {
			    	$("#username").addClass(xmlhttp.responseText);
			    }
	        }
	    };
	    if (methode == "username")
	    {
	    	xmlhttp.open("GET", "../../../system/app/ajaxrequests/checker.php?username=true&q=" + str, true);
	    	xmlhttp.send();
	    }
	    else
	    {
			alert("Error");
	    }
	}
}