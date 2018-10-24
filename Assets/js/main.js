    $(document)
        .on("submit","form.js-register",function (event) {
        
        event.preventDefault();
       
        var _form = $(this);
        var _error = $(".js-error", _form);
    
        var dataObj = {
            name: $("input[type='name']", _form).val(),
            email: $("input[type='email']", _form).val(),
            username: $("input[type='username']", _form).val(),
            password: $("input[type='password']", _form).val(),
        }

        //  Simple form validation
        if (dataObj.name.length < 8){
            _error
            .text("Please enter full name").show() ;
            return false;
        }

        if (dataObj.email.length < 6){
            _error
			.text("Please enter a valid email address")
            .show();    
            return false;
        }
        if (dataObj.password.length < 8){
            _error
			.text("Please enter a password longer then 8 characters")
            .show();    
            return false;
        }
        if(dataObj.username.length == 0){
            _error
			.text("Please enter a username")
            .show();    
            return false;
        }

        _error.hide();

        return false;
    });