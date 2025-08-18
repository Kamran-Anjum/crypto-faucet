// testimonial carousel
$(document).ready(function(){
    
  $(".testimonial-carousel").slick({
    dots: false,
    arrow:true,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    adaptiveHeight: true,
    // prevArrow: '<i class="fa fa-angle-left"></i>',
    // nextArrow: '<i class="fa fa-angle-right"></i>',
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 361,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
    ]
  });

});

// partner carousel
$(document).ready(function(){
    
  $(".partner-carousel").slick({
    dots: false,
    arrow:true,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    adaptiveHeight: true,
    // prevArrow: '<i class="fa fa-angle-left"></i>',
    // nextArrow: '<i class="fa fa-angle-right"></i>',
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 361,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
    ]
  });

});

// client add images multiple
$(document).ready(function(){

  var max_fields = 5; //maximum input boxes allowed
  var wrapper = $(".image_fields_wrap"); //Fields wrappeD
  var add_button = $("#addimagefield"); //Add button ID
  var x = 1; //initlal text box count

  //adding multile field
  $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
      if(x < max_fields){ //max input box allowed
        x++; //text box increment
        $(wrapper).append('<div class="row"><div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 10px;"><div class="form-group "><label class="control-label">Image</label><input type="file" id="image" name="image[]" class="form-control" ></div> </div><button type="button" style="margin-top: 32px; height: 60px; width: 6%;" id="deleteImagefield" class=" btn btn-danger text-white "> <i class="ti ti-minus" ></i></button></div>'); 
      }
  });

  $(wrapper).on("click","#deleteImagefield", function(e){ //user click on remove text
    e.preventDefault(); $(this).parent('div').remove(); x--;
  })


});

// client add images multiple
$(document).ready(function () {
    function checkInputs() {
        var name = $('#fc_name').val().trim();
        var email = $('#fc_email').val().trim();
        var company = $('#fc_company').val().trim();

        if (name !== "" && email !== "" && company !== "") {
            $('#fc_btn').prop('disabled', false);
        } else {
            $('#fc_btn').prop('disabled', true);
        }
    }

    // Trigger on input change
    $('#fc_name, #fc_email, #fc_company').on('input', checkInputs);
});

$(document).ready(function () {
    // Initially hide all validation messages
    $('#pass_length, #con_pass_length, #not_match').hide();

    function validatePasswords() {
        let newPass = $('#new_password').val();
        let confirmPass = $('#confirm_password').val();
        let isValid = true;

        // Check length of new password
        if (newPass.length < 8) {
            $('#pass_length').show();
            isValid = false;
        } else {
            $('#pass_length').hide();
        }

        // Check length of confirm password
        if (confirmPass.length < 8) {
            $('#con_pass_length').show();
            isValid = false;
        } else {
            $('#con_pass_length').hide();
        }

        // Check if passwords match
        if (newPass !== confirmPass) {
            $('#not_match').show();
            isValid = false;
        } else {
            if (newPass.length >= 8 && confirmPass.length >= 8) {
                $('#not_match').hide();
            }
        }

        // Enable or disable the Reset button
        $('#reset_password').prop('disabled', !isValid);
    }

    // Run validation on input
    $('#new_password, #confirm_password').on('input', validatePasswords);

});

$(document).ready(function(){

  $('#licenses').on('change keyup keypress blur', function() { 

    var licenses = $(this).val();
    var price_per_user = $("#price_per_user").val();  

    if (price_per_user != '' || price_per_user > 0) {
      var total_amount = price_per_user*licenses;

      $('#total_amount').val(total_amount); 
    }
  
     
  });


});