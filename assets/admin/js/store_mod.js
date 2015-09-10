$('document').ready(function() {

    $('#password').blur(function() {
        var length = $(this).val().length;
        if (length < 5) {
            $('#password').css("border-color", "");
            $('#error_message').remove();
            $('#password').css("border-color", "red");

            $('<div class="error" id="error_message"> Password length must be greater than 5</div>').insertAfter('#password');
            return false;
        } else {
            $('#password').css("border-color", "");
            $('#error_message').remove();
            return true;
        }
    });

    $('#c_password').blur(function() {
        var password = $('#password').val();
        var c_password = $(this).val();

        if (password != c_password)
        {
            $('#c_password').css("border-color", "");
            $('#error_message1').remove();
            $('#c_password').css("border-color", "red");

            $('<div class="error" id="error_message1"> Password Not Match... </div>').insertAfter('#c_password');
            return false;
        } else {
            $('#c_password').css("border-color", "");
            $('#error_message1').remove();
            return true;
        }
    });
    $('#submit_store').click(function() {
        var password = $('#password').val();
        var c_password = $('#c_password').val();


        var pass_length = password.length;
        if (pass_length < 5) {
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

    $('#email_address').keyup(function() {
        var email = $(this).val();
        validateEmail(email);
    });

    $('#c_number').keyup(function() {
        if (this.value.match(/[^0-9 ]/g)) {
            this.value = this.value.replace(/[^0-9 ]/g, '');
        }
    });
    $('#post_code').keyup(function() {
        if (this.value.match(/[^0-9 ]/g)) {
            this.value = this.value.replace(/[^0-9 ]/g, '');
        }
    });


});

function validateEmail(emailaddress) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!regex.test(emailaddress)) {
        $('#email_address').css("border-color", "");
        $('#error_message2').remove();

        $('#email_address').css("border-color", "red");
        $('<div class="error" id="error_message2"> Please Enter Valid Email  </div>').insertAfter('#email_address');
        return false;

    } else {
        $('#email_address').css("border-color", "");
        $('#error_message2').remove();
        return true;
    }
}