$(document).ready(function(){

    // Side bar
    $("#side").click(function() {
		openSideBar();
      });

      $("#close").click(function() {
	    closeSideBar();
    });

      
    // $(".container-fluid").click(function () {
    //     if ( $("#sidebar").css("left") == "0px" ) {
    //         closeSideBar();
    //     }
    // });
      

    

    function openSideBar() {
        $("#sidebar").animate({
            left: '0px'
        });

        //Close top-bar if open
        if( $("#top-bar").css("display") == "block" ) {
            $("#top-bar").slideToggle("1000");
        }

        //Close filter if open
        if( $("#filter-bar").css("right") == "0px" ) {
            $("#filter-bar").animate({
                right: '-250px'
            });
        }

      }

    function closeSideBar() {
        $("#sidebar").animate({
            left: '-250px'
        });
    }

    //Side bar end

    // Top Bar
    $("#right-btn").click(function() {  
        openCloseTopBar();   
    });

    
        function openCloseTopBar() {
            $("#top-bar").slideToggle("1000");
            $("#top-bar").animate({
                top: '95px'
            });

                //close sidebar if open
            if( $("#sidebar").css("left") == "0px" ) {
                $("#sidebar").animate({
                    left: '-250px'
                });
            }
        }
    //Top bar End

    // //Filter
    $("#close-filter").click(function() {
        $("#filter-bar").animate({
            right: '-250px'
        });
    });

    
    $("#filter").click(function() {
        openCloseFilter();
    });

    function openCloseFilter() {
        $("#filter-bar").animate({
            right: '0'
        });

            //close sidebbar if open
        if( $("#sidebar").css("left") == "0px" ) {
            $("#sidebar").animate({
                left: '-250px'
            });
        }
    }

    //Filter end


    // jQuery methods go here...
    $("#login-btn").submit(function() {
        
    });

    var inputs =  [
        $("#tel"),
        $("#username"),
        $("#pwd"),
        $("#con-pwd")
    ];

    var errors = ["Invalid username", "Invalid Phone Number", 
    "Invalid Password", "Terms Unaccepted", "Password Mismatch"
    ];

    for (var i = 0; i < inputs.length; ++i) {
        inputs[i].on("change", function(ev) {
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

    $("#tel").focus(function() {
    
            $("#tel-desc").fadeIn();
    });

    $("#tel").blur(function() {
            $("#tel-desc").fadeOut();
    });

    $("#username").focus(function() {
    
            $("#username-desc").fadeIn();
    });

    $("#username").blur(function() {
            $("#username-desc").fadeOut();
    });

    $("#pwd").focus(function() {
    
            $("#pass-desc").fadeIn();
    });

    $("#pwd").blur(function() {
    
            $("#pass-desc").fadeOut();
    });

    $("#con-pwd").focus(function() {
            $("#con-desc").fadeIn();
    });

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

        $("#con-desc").fadeOut();


    });

    



    $("#reg-submit").click(function() {
        if (errors.length < 1) {
            return true;
        }
        return false;
    });

    $("#my-stack").click(function() {
        $("#my-stack").addClass("active");
        $("#leaderboard").removeClass("active");
        $("#mystacks").addClass("active");
        $("#leader-board").removeClass("active");
    });
    
    $("#leaderboard").click(function() {
        $("#leaderboard").addClass("active");
        $("#my-stack").removeClass("active");
        $("#leader-board").addClass("active");
        $("#mystacks").removeClass("active");
    });

    $(".input-odd, .shell-odd-input").each (function() {
        $(this).keypress(function() {
            if ( $(this).val().length == 1 ) {
                $(this).val( $(this).val() + "." );
            }
        });
    });


    function depositIncrementer(targetBox) {
        if (i == 3) {
            targetBox.val( Number( targetBox.val() ) + Number(4 + "00") );
            return false;
        }else if (i == 4) {
            targetBox.val( Number( targetBox.val() ) + Number(8 + "00") );
            return false;
        } else if (i == 5) {
            targetBox.val( Number( targetBox.val() ) + Number(1 + "000") );
            return false;
        }
        targetBox.val( Number( targetBox.val() ) + Number(i + "00") );
        
    }
    //Deposit iincrementer
    for (let i = 1; i < 6; i++) {
        $("#paystack-add-" + i + "00").click(function() {
            depositIncrementer( $("#paystack-amt-box") );
        });
    }
    //Withdrawal incrementer
    for (let i = 1; i < 6; i++) {
        $("#add-" + i + "00").click(function() {
            if (i == 3) {
                $("#amount-input").val( Number( $("#amount-input").val() ) + Number(5 + "00") );
                return false;
            }else if (i == 4) {
                $("#amount-input").val( Number( $("#amount-input").val() ) + Number(1 + "000") );
                return false;
            } else if (i == 5) {
                $("#amount-input").val( Number( $("#amount-input").val() ) + Number(5 + "000") );
                return false;
            }
            $("#amount-input").val( Number( $("#amount-input").val() ) + Number(i + "00") );
            
        });
    }

    $(".info-box").click(function() {
        $(".modal-box").css("display", "block");
    });

    $("#close-modal").click(function() {
        $(".modal-box").css("display", "none");
    });


    

});
