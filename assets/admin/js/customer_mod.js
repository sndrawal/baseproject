$('document').ready(function() {

    $('#customer_password').blur(function() {
        var length = $(this).val().length;
        if (length < 5) {
            $('#customer_password').css("border-color", "");
            $('#error_message').remove();
            $('#customer_password').css("border-color", "red");

            $('<div class="error" id="error_message"> Password length must be greater than 5</div>').insertAfter('#customer_password');
            return false;
        } else {
            $('#customer_password').css("border-color", "");
            $('#error_message').remove();
            return true;
        }
    });

    $('#customer_c_password').blur(function() {
        var password = $('#customer_password').val();
        var c_password = $(this).val();

        if (password != c_password)
        {
            $('#customer_c_password').css("border-color", "");
            $('#error_message1').remove();
            $('#customer_c_password').css("border-color", "red");

            $('<div class="error" id="error_message1"> Password Not Match... </div>').insertAfter('#customer_c_password');
            return false;
        } else {
            $('#customer_c_password').css("border-color", "");
            $('#error_message1').remove();
            return true;
        }
    });
    $('#submit_customer').click(function() {
        var password = $('#customer_password').val();
        var c_password = $('#customer_c_password').val();


        var pass_length = password.length;
        if (pass_length <  5) {
            return false;
        }

        if (password != c_password)
        {
            return false;
        }
    });


    $('#store_contact').keyup(function() {
        if (this.value.match(/[^0-9 ]/g)) {
            this.value = this.value.replace(/[^0-9 ]/g, '');
        }
    });

    $('#c_email_address').keyup(function() {
        var email = $(this).val();
        validateEmail(email);
    });

    $('#customer_number').keyup(function() {
        if (this.value.match(/[^0-9 ]/g)) {
            this.value = this.value.replace(/[^0-9 ]/g, '');
        }
    });
    $('#c_post_code').keyup(function() {
        if (this.value.match(/[^0-9 ]/g)) {
            this.value = this.value.replace(/[^0-9 ]/g, '');
        }
    });


});

function validateEmail(emailaddress) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!regex.test(emailaddress)) {
        $('#c_email_address').css("border-color", "");
        $('#error_message2').remove();

        $('#c_email_address').css("border-color", "red");
        $('<div class="error" id="error_message2"> Please Enter Valid Email  </div>').insertAfter('#c_email_address');
        return false;

    } else {
        $('#c_email_address').css("border-color", "");
        $('#error_message2').remove();
        return true;
    }
}