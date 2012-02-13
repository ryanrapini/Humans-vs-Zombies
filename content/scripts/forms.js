$(function() {  
    $('.error').hide();  
    $(".button").click(function() {  
        // validate and process form here  
        $('.error').hide();  
        var firstname = $("input#firstname").val();
        if (firstname == "") {
            $("div#firstname_error").show();  
            $("input#firstname").focus();  
            return false;  
        }   
        var lastname = $("input#lastname").val();
        if (lastname == "") {
            $("div#lastname_error").show();  
            $("input#lastname").focus();  
            return false;  
        } 
        var netid = $("input#netid").val();
        if (netid == "") {
            $("div#netid_error").show();  
            $("input#netid").focus();  
            return false;  
        } 
        var phoneNumberPattern = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
        var phone = $("input#phone").val();
        if (phone == "" || !phoneNumberPattern.test(phone) ) {
            $("div#phone_error").show();  
            $("input#phone").focus();  
            return false;  
        } 
        var gender = $("select#gender").val();
        if (gender != "male" && gender != "female") {
            $("div#gender_error").show();  
            $("input#gender").focus();  
            return false;  
        } 
        var year = $("select#year").val();
        if (year == "") {
            $("div#year_error").show();  
            $("input#year").focus();  
            return false;  
        }      
		
		var dataString = 'firstname='+ firstname +'&lastname='+ lastname+'&netid='+ netid+'&phone='+phone+'&gender='+gender+'&year='+year;
		//alert (dataString);return false;
		
	$.ajax({
      type: "POST",
      url: "submit.php",
      data: dataString,
      success: function() {
        $('#fancyform').html("<div id='message'></div>");
        $('#message').html("<h2>Registered Successfully!</h2>")
        .append("<p>Have a nice day!</p>")
        .hide() 
        .fadeIn(1500, function() {
          $('#message').append("<img src='/images/zombies.jpg' /><strong>Upon activation, you will recieve your killcode.</strong>");
        });
      }
      
     });
    return false;
	});
});
runOnLoad(function(){
  $("input#firstname").select().focus();
});
