
$(".required").blur(function() {
	
	//alert("jquery works");
	
	if (jQuery.trim($(this).val() =='')){
		//alert("jquery works");
		var labelText = $(this).prev('label').text();
		$(this).parent().append('*');
	}
})
