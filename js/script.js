$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})

/* Chatroom 
//this function can remove a array element.
            Array.remove = function(array, from, to) {
                var rest = array.slice((to || from) + 1 || array.length);
                array.length = from < 0 ? array.length + from : from;
                return array.push.apply(array, rest);
            };
        
            //this variable represents the total number of popups can be displayed according to the viewport width
            var total_popups = 0;
            
            //arrays of popups ids
            var popups = [];
        
            //this is used to close a popup
            function close_popup(id)
            {
                for(var iii = 0; iii < popups.length; iii++)
                {
                    if(id == popups[iii])
                    {
                        Array.remove(popups, iii);
                        
                        document.getElementById(id).style.display = "none";
                        
                        calculate_popups();
                        
                        return;
                    }
                }   
            }
        
            //displays the popups. Displays based on the maximum number of popups that can be displayed on the current viewport width
            function display_popups()
            {
                var right = 220;
                
                var iii = 0;
                for(iii; iii < total_popups; iii++)
                {
                    if(popups[iii] != undefined)
                    {
                        var element = document.getElementById(popups[iii]);
                        element.style.right = right + "px";
                        right = right + 320;
                        element.style.display = "block";
                    }
                }
                
                for(var jjj = iii; jjj < popups.length; jjj++)
                {
                    var element = document.getElementById(popups[jjj]);
                    element.style.display = "none";
                }
            }
            
            //creates markup for a new popup. Adds the id to popups array.
            function register_popup(id, name)
            {
                
                for(var iii = 0; iii < popups.length; iii++)
                {   
                    //already registered. Bring it to front.
                    if(id == popups[iii])
                    {
                        Array.remove(popups, iii);
                    
                        popups.unshift(id);
                        
                        calculate_popups();
                        
                        
                        return;
                    }
                }               
                
                var element = '<div class="popup-box chat-popup" id="'+ id +'">';
                element = element + '<div class="popup-head">';
                element = element + '<div class="popup-head-left">'+ name +'</div>';
                element = element + '<div class="popup-head-right"><a href="javascript:close_popup(\''+ id +'\');">&#10005;</a></div>';
                element = element + '<div style="clear: both"></div></div><div class="popup-messages"></div></div>';
                
                document.getElementsByTagName("body")[0].innerHTML = document.getElementsByTagName("body")[0].innerHTML + element;  
        
                popups.unshift(id);
                        
                calculate_popups();
                
            }
            
            //calculate the total number of popups suitable and then populate the toatal_popups variable.
            function calculate_popups()
            {
                var width = window.innerWidth;
                if(width < 540)
                {
                    total_popups = 0;
                }
                else
                {
                    width = width - 200;
                    //320 is width of a single popup box
                    total_popups = parseInt(width/320);
                }
                
                display_popups();
                
            }
            
            //recalculate when window is loaded and also when window is resized.
            window.addEventListener("resize", calculate_popups);
            window.addEventListener("load", calculate_popups);

            /* Auto Generate Password */
            function generate() {
                // A reasonably "intuitive" way to generate a password:
                    var charPos;
                    var pwChar;
                    var pwLength = 12;  // Change for shorter or longer password
        
                    // 1) You can add special characters like "@" to the following string if desired
                    // 2) You can even include characters more than once to increase their likelihood of appearing!
                    var availChars = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ#$!_-%*@()&";
                    var pw = "";
                    for (i = 0; i < pwLength; i++) {
                        charPos = Math.floor(Math.random() * availChars.length);
                        pwChar = availChars.charAt(charPos);
                        pw = pw + pwChar;
                    }
                    pass.value = pw;
        
                }
            function generateDoc() {
                // A reasonably "intuitive" way to generate a password:
                    var charPos;
                    var pwChar;
                    var pwLength = 12;  // Change for shorter or longer password
        
                    // 1) You can add special characters like "@" to the following string if desired
                    // 2) You can even include characters more than once to increase their likelihood of appearing!
                    var availChars = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ#$!_-%*@()+";
                    var pw = "";
                    for (i = 0; i < pwLength; i++) {
                        charPos = Math.floor(Math.random() * availChars.length);
                        pwChar = availChars.charAt(charPos);
                        pw = pw + pwChar;
                    }
                    var password = document.getElementById('passs');
                    password.value = pw;
        
                }/*
                function randomPassword(length) {
                    var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
                    var passs = "";
                    for (var x = 0; x < length; x++) {
                        var i = Math.floor(Math.random() * chars.length);
                        passs += chars.charAt(i);
                    }
                    return passs;
                }
                
                function generateDoc() {
                    doctorForm.doctorPassword.value = randomPassword(doctorForm.length.value);
                }
*/
                /*Show and hide password */
                $(document).ready(function() {
                    $("#show_hide_password a").on('click', function(event) {
                        event.preventDefault();
                        if($('#show_hide_password input').attr("type") == "text"){
                            $('#show_hide_password input').attr('type', 'password');
                            $('#show_hide_password i').addClass( "fas fa-eye-slash" );
                            $('#show_hide_password i').removeClass( "fas fa-eye" );
                        }else if($('#show_hide_password input').attr("type") == "password"){
                            $('#show_hide_password input').attr('type', 'text');
                            $('#show_hide_password i').removeClass( "fas fa-eye-slash" );
                            $('#show_hide_password i').addClass( "fas fa-eye" );
                        }
                    });
                });
                /*Show and hide password */
                $(document).ready(function() {
                    $("#show_hide_password1 a").on('click', function(event) {
                        event.preventDefault();
                        if($('#show_hide_password1 input').attr("type") == "text"){
                            $('#show_hide_password1 input').attr('type', 'password');
                            $('#show_hide_password1 i').addClass( "fas fa-eye-slash" );
                            $('#show_hide_password1 i').removeClass( "fas fa-eye" );
                        }else if($('#show_hide_password1 input').attr("type") == "password"){
                            $('#show_hide_password1 input').attr('type', 'text');
                            $('#show_hide_password1 i').removeClass( "fas fa-eye-slash" );
                            $('#show_hide_password1 i').addClass( "fas fa-eye" );
                        }
                    });
                });

                /* Autofill user id fields 
                $(document).ready(function(){
                    $(".input-data").on("change", function(){
                            var id = $(".input-data").val();
                            var data = 'one=' + id;
                            $.ajax({
                                type: "POST",
                                url: "process.php",
                                data: data,
                                dataType: 'json',
                                success: function (data) {
                                    if (data) {
                                        for (var i = 0; i < data.length; i++) { //for each user in the json response
                                            $(".output-id").val(data[i].id);
                                        } // for
                
                                    } // if
                                } // success
                            }); // ajax
                    });
                });


                $('#patient').autocomplete({
                    serviceUrl: '../ids.php'
                });*/

                