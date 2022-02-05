$('document').ready(function()
{
    /* form reset */
    $(".form-signin").trigger("reset");
    
    /* validation */
    $("#register-form").validate({
        rules:
        {
            user: {
                required: true,
                minlength: 3,
                maxlength: 16,
            },
            pass: {
                required: true,
                minlength: 3,
                maxlength: 15
            },
          
          
        },
        messages:
        {
            user:{
                required: "Provide a Username.",
                minlength: "Username needs to be minimum of 3 characters!",
                maxlength: "Username needs to be maximum of 15 characters!",
            },
            pass:{
                required: "Provide a Password.",
                minlength: "Password needs to be minimum of 3 characters!",
                maxlength: "Password needs to be maximum of 15 characters!",
            },
         
        },
        submitHandler: submitForm
    });
    /* validation */

    /* form submit */
    function submitForm()
    {
        var data = $("#register-form").serialize();

        $.ajax({

            type : 'POST',
            url  : '/login.php',
            data : data,
            beforeSend: function()
            {
                $("#alert").fadeOut();
                $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            },
            success :  function(data)
            {
                if (data == "exist")
                {
                    $("#alert").fadeIn(1000, function()
                    {
                        $("#alert").html('<div class="alert alert-danger"> Sorry, Username already exist.</div>');
                        $("#btn-submit").html('Join Eternium!');
                        $(".form-signin").trigger("reset");
                    });
                }
                else if (data == "registered")
                {
                    $("#alert").fadeIn(1000, function()
                    {
                        $("#alert").html('<div class="alert alert-success">Successfully created account!</div>');  
                    });
                    
                    $(".form-signin").fadeOut(1000);
                }
                else {

                    $("#alert").fadeIn(1000, function(){

                        $("#alert").html(''+data+'');
                        $("#btn-submit").html('Join Eternium!');

                    });

                }
            }
        });
        return false;
    }
    /* form submit */

});
