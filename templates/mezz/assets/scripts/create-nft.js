$(document).ready(function() {
	$('#create_nft').click(function() {

		var nft_name = $("#nft_name").val();
		var price = $("#price").val();
		var type = $("#type").val();
		
		$.post('../../../system/app/ajaxrequests/create-nft.php', { create_nft: "", nft_name: nft_name, price: price, type: type}, function(result) 
		{
			if (result == 'succes' || result == 'ref_errorsucces')
			{
				$(".errorSucces").fadeIn("18000").css('display', 'block');
				$(".errorSucces").text("Your avatar has been put up for sale, the price you set for purchasing one will automatically be credited to your account!");
			}
			else
			{
				window.location.href = "#error";
				$(".error").fadeIn("18000").css('display', 'block');
				if (language == 'en') {
					if (result == "empty_nft_name")
					{
						$(".error").text("You cannot leave the NFT name blank.");
					}
					else if (result == "empty_price")
					{
						$(".error").text("You cannot leave the price blank.");
					}
					else if (result == "used_nft")
					{
						$(".error").text("This NFT is already in use.");
					}
					else if (result == "insufficient_amount")
					{
						$(".error").text("You do not have enough diamonds to sell your avatar as NFT.");
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