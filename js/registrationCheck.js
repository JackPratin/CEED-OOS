$('document').ready(function(){
    var username_state = false;
    var email_state = false;
    $('#username').on('blur', function(){
     var username = $('#username').val();
     if (username == '') {
         username_state = false;
         return;
     }
     $.ajax({
    //    url: '../../CEED-OOS/php/customerRegistration.php',
       url: '../../CEED-OOS/php/customerRegistration.php',
       type: 'post',
       data: {
           'username_check' : 1,
           'username' : username,
       },
       success: function(response){
        if(document.getElementById("usernameSpan") == null){
            const span = document.createElement("span");
            const br = document.createElement("br");
            span.setAttribute('id','usernameSpan');
            const element = document.getElementById("usernameDiv");
            // const child = document.getElementById("password");
            // const child1 = document.getElementById("usernameSpan");
            // element.appendChild(br);
            element.appendChild(span);
        }
         if (response == 'taken' ) {
             username_state = false;
             $('#username').parent().removeClass();
             $('#username').parent().addClass("form_error");
             $('#username').siblings("span").text('Username is already registered to an account.');
         }else if (response == 'not_taken') {
             username_state = true;
             $('#username').parent().removeClass();
             $('#username').parent().addClass("form_success");
             $('#username').siblings("span").text('Username available');
         }
       }
     });
    });		
     $('#email').on('blur', function(){
        var email = $('#email').val();
        if (email == '') {
            email_state = false;
            return;
        }
        $.ajax({
        //  url: '../php/customerRegistration.php',
         url: '../php/customerRegistration.php',
         type: 'post',
         data: {
             'email_check' : 1,
             'email' : email,
         },
         success: function(response){
            if(document.getElementById("emailSpan") == null){
                const span = document.createElement("span");
                const br = document.createElement("br");
                span.setAttribute('id','emailSpan');
                const element = document.getElementById("emailDiv");
                const child = document.getElementById("contact");
                // const child1 = document.getElementById("usernameSpan");
                element.insertBefore(span, child);
                element.insertBefore(br, child);
            }
            
             if (response == 'taken' ) {
                email_state = false;
                $('#email').parent().removeClass();
                $('#email').parent().addClass("form_error");
                $('#email').siblings("span").text('Email is already registered to an account.');
             }
             else if (response == 'not_taken') {
                email_state = true;
                $('#email').parent().removeClass();
                $('#email').parent().addClass("form_success");
                $('#email').siblings("span").text('Email available.');  
             }
         }
        });
    });

        $('#conPassword').on('blur', function(){
            var password = $('#password').val();
            var conPassword = $('#conPassword').val();
            if(password != conPassword){
                if(document.getElementById("passwordSpan") == null){
                    const span = document.createElement("span");
                    const br = document.createElement("br");
                    span.setAttribute('id','passwordSpan');
                    const element = document.getElementById("passwordDiv");
                    // const child1 = document.getElementById("usernameSpan");
                    element.appendChild(br);
                    element.appendChild(span);

                    $('#passwordSpan').parent().removeClass();
                    $('#passwordSpan').parent().addClass("form_error");
                    $('#passwordSpan').text('Password does not match.');
                    
                }
            }
            else{
                if(document.getElementById("passwordSpan") != null){
                    const element = document.getElementById("passwordSpan");
                    element.remove(); 
                }
                
                $('#passwordDiv').removeClass();
                $('#passwordDiv').addClass("form_success");
            }
        });
   
    // $('#regSubmit2').on('click', function(){
    //     var username = $('#username').val();
    //     var email = $('#email').val();
    //     var password = $('#password').val();
    //     var conPassword = $('#conPassword').val();
    //     var password = $('#password').val();
    //     var password = $('#password').val();
    //     var password = $('#password').val();
    //     var password = $('#password').val();
    //     var password = $('#password').val();
    //     var password = $('#password').val();
    //     var password = $('#password').val();
    //     if(password != conPassword){
            
    //     }
    //     else{
    //         if (username_state == false || email_state == false) {
    //             $('#error_msg').text('Fix the errors in the form first');
    //           }
    //           else{
    //             // proceed with form submission
    //             $.ajax({
    //                 url: '../../CEED-OOS/php/customerRegistration.php',
    //                 type: 'post',
    //                 data: {
    //                     'save' : 1,
    //                     'email' : email,
    //                     'username' : username,
    //                     'fname' : fname,
    //                     'mi' : mi,
    //                     'lname' : lname,
    //                     'contact' : contact,
    //                     'address' : address,
    //                     'brgy' : brgy,
    //                     'city' : city,
    //                     'password' : password,
    //                 },
    //                 success: function(response){
    //                     alert('user saved');
    //                     $('#username').val('');
    //                     $('#email').val('');
    //                     $('#fname').val('');
    //                     $('#mi').val('');
    //                     $('#lname').val('');
    //                     $('#contact').val('');
    //                     $('#address').val('');
    //                     $('#brgy').val('');
    //                     $('#city').val('');
    //                     $('#password').val('');
    //                 }
    //             });
    //         }
    //     }
        
    // });
   });