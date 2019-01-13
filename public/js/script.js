$(document).ready(function(){

    // Side bar
    $("#side").click(function() {
		$("#sidebar").animate({
            left: '0px'
        });
	  });

    $("#close").click(function() {
	    $("#sidebar").animate({
            left: '-250px'
        });
    });

    //Side bar end

    // Top Bar
    $("#right-btn").click(function() {  
        if( $("#top-bar").slideToggle("1000") ) {
            $("#top-bar").animate({
                top: '95px'
            });
        }
    });
           
    //Top bar End

    // //Filter
    $("#close-filter").click(function() {
        $("#filter-bar").animate({
            right: '-250px'
        });
    });

    
    $("#filter").click(function() {
        $("#filter-bar").animate({
            right: '0'
        });
    });


    // jQuery methods go here...
    $("#login-btn").submit(function() {
        alert("Hello");
    });

    var errors = ["Invalid username", "Invalid Phone Number", 
    "Invalid Password", "Terms Unaccepted", "Password Mismatch"
    ];

    var inputs = document.querySelectorAll("input");
    for (var i = 0; i < inputs.length; ++i) {
        inputs.item(i).addEventListener("change", function(ev) {
            if ( $("#username").val().length > 2 && /^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/.test($("#username").val()) ) {
                $("#username").addClass("good");
                $("#username").removeClass("bad");
                errors = errors.filter(function(value) {
                    return value != "Invalid username";
                });
            } else {
                $("#username").removeClass("good");
                $("#username").addClass("bad");
                ( errors.includes("Invalid username") ) ? errors = errors : errors.push("Invalid username");
            }

            if ( /^[0][1-9]\d{9}$|^[1-9]\d{9}$/g.test($("#tel").val()) ) {
                $("#tel").addClass("good");
                $("#tel").removeClass("bad");
                errors = errors.filter(function(value) {
                    return value != "Invalid Phone Number";
                });
            } else {
                $("#tel").removeClass("good");
                $("#tel").addClass("bad");
                ( errors.includes("Invalid Phone Number") ) ? errors = errors : errors.push("Invalid Phone Number");
                
            }

            if (/^(?=(.*[a-z]){1,})(?=(.*[\d]){1,}).{8,}$/.test( $("#pwd").val() )) {
                $("#pwd").addClass("good");
                $("#pwd").removeClass("bad");
                errors = errors.filter(function(value) {
                    return value != "Invalid Password";
                });
            } else {
                $("#pwd").removeClass("good");
                $("#pwd").addClass("bad");
                ( errors.includes("Invalid Password") ) ? errors = errors : errors.push("Invalid Password");
                
            }

            if ( $("#agree-terms").is(":checked") ) {
                $("#agree-terms").addClass("good");
                $("#agree-terms").removeClass("bad");
                errors = errors.filter(function(value) {
                    return value != "Terms Unaccepted";
                });
            } else {
                $("#agree-terms").removeClass("good");
                $("#agree-terms").addClass("bad");
                ( errors.includes("Terms Unaccepted") ) ? errors = errors : errors.push("Terms Unaccepted");
                
            }

            console.log(errors);


        });
    }

    $("#con-pwd").blur(function() {
        if ( $("#pwd").val() == $("#con-pwd").val() ) {
            $("#con-pwd").addClass("good");
            $("#con-pwd").removeClass("bad");
            errors = errors.filter(function(value) {
                return value != "Password Mismatch";
            });
        } else {
            $("#con-pwd").removeClass("good");
                $("#con-pwd").addClass("bad");
                ( errors.includes("Password Mismatch") ) ? errors = errors : errors.push("Password Mismatch");
                
        }


    });

    



    $('#reg-submit').click(function() {
        if (errors.length < 1) {
            return true;
        }
        return false;
    });
  
  });