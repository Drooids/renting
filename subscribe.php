<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="author" content="ThemeFuse">
<meta name="keywords" content="">

<title>Home Saigon - Subscribe</title>
<link href='http://fonts.googleapis.com/css?family=Lato:400italic,400,700|Bitter' rel='stylesheet'>

<link href="login-style.css" media="screen" rel="stylesheet">

<!-- Mobile optimized -->
<meta name="viewport" content="width=device-width,initial-scale=1">
<script src="js/libs/modernizr-2.5.3.min.js"></script>
<script src="js/libs/respond.min.js"></script>

<script src="js/jquery.min.js"></script>
<script src="js/general.js"></script>

<script src="js/jquery.tools.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>

<script src="js/slides.min.jquery.js"></script>

<link href="css/cusel.css" rel="stylesheet">
<script src="js/cusel-min.js"></script>
<script src="js/jScrollPane.js"></script>
<script src="js/jquery.mousewheel.js"></script>

<script src="js/jquery.dependClass.js"></script>
<script src="js/jquery.slider-min.js"></script>
<link href="css/jslider.css" rel="stylesheet">

<script src="js/jquery.jcarousel.min.js"></script>
<link rel="stylesheet" href="images/skins/tango/skin.css">


<link href="css/customInput.css" rel="stylesheet">
<script src="js/jquery.customInput.js"></script>


<script src="js/jquery.qtip.min.js"></script>
<link href="css/jquery.qtip.css" rel="stylesheet">


<link href="css/prettyPhoto.css" rel="stylesheet" media="screen">
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/shCore.js"></script>
<script src="js/shBrushPlain.js"></script>
<link href="css/shCore.css" media="screen" rel="stylesheet">
<link href="css/shThemeDefault.css" media="screen" rel="stylesheet">

<!--[if IE 7]> <link href="css/ie.css" media="screen" rel="stylesheet"> <![endif]-->
<link href="custom.css" media="screen" rel="stylesheet">
</head>
<style type="text/css">
    body{
        width:200px;
        height:500px;
    }

</style>
<body >

    
    <!-- content -->
    <div class="grid_8 content">        
  <div class="row">
                   
                    
                  
                        
                    <!-- login widget -->
                    <div class="widget-container widget_login">
                        <h3>Subscribe</h3>
                        
                      <form action="#" method="post" id="loginform" class="loginform">
                        <p><label>Name * </label><span id='name_span' style='color:red; float:right;'></span><br><input name="name" id="client_name" class="input" value="" size="20" tabindex="10" type="text"></p>
                        
                        <p><label>Last Name * </label><span id='lastname_span' style='color:red; float:right;'></span><br><input name="lastname" id="client_lastname" class="input" value="" size="20" tabindex="10" type="text"></p>
                        
                        <p><label>Email * </label><span id='email_span' style='color:red; float:right;'></span><br><input name="email" id="client_email" class="input" value="" size="20" tabindex="10" type="text"></p>
                        
                        <p><label>Password * </label><span id='password_span' style='color:red; float:right;'></span><br><input name="pwd" id="client_password" class="input" value="" size="20" tabindex="20" type="password"></p>
                        
                        <p><label>Phone</label><br><input name="phone" id="client_phone" class="input" value="" size="20" tabindex="20" type="text"></p>
                        <h4 class='result' style='color:orange;'></h4>
                        <p class="submit">
                            <input type="submit" name="subscribe" id="subscribe" class="btn-submit" value="Subscribe" tabindex="100">
                            <input type="hidden" name="redirect_to" value="my_page.php" id='redirect'>
                            <input type="hidden" name="testcookie" value="1">
                        </p>                        
                        
                      </form>
                    </div>
                    <!--/ login widget --> 
      
                    
                    </div>
                                        
                   
    </div>       
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {

        function validateEmail(email) { 
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        } 
        function resetBorder(){
            $('#client_name').css('border','1px solid #DFDFDF');
            $('#client_lastname').css('border','1px solid #DFDFDF');
            $('#client_email').css('border','1px solid #DFDFDF');
            $('#client_password').css('border','1px solid #DFDFDF');
        }
        function resetSpan(){
            $('#name_span').html('');
            $('#email_span').html('');
            $('#password_span').html('');
            $('#lastname_span').html('');
            $('#password_span').css('color','red');
        }
        function resetResult(){
            $('.result').css('color','green');
            $('.result').html('');
        }

        function verifPass(text){
            if(text.length <= 3){
                $('#password_span').css('color','red');
                $('#client_password').css('border','1px solid red');
                 $('#password_span').html('Too short');
                 return false;
            }else if(text.length >3 && text.length <=5){
                $('#password_span').css('color','orange');
                $('#client_password').css('border','1px solid orange');
                 $('#password_span').html('Just a bit more characters');
                 return false;
            }else if( text.length >5){
                $('#password_span').css('color','green');
                $('#client_password').css('border','1px solid green');
                 $('#password_span').html('Perfect');
                 return true;
            }
        }

        $('#client_password').keyup(function(){
            verifPass($('#client_password').attr('value'));
        });

        $('#subscribe').live('click',function(){
            //On remet les bonnes couleurs aux "border";
            resetBorder();
            resetSpan();
            resetResult();

            var name = $('#client_name').attr('value');
            var last_name = $('#client_lastname').attr('value');
            var email = $('#client_email').attr('value');
            var password = $('#client_password').attr('value');
            if(name =='' || last_name =='' || email == '' || password == ''){
                if(name ==''){
                    $('#client_name').css('border','1px solid red');
                    $('#name_span').html("Can't be empty");
                }
                if(last_name ==''){
                    $('#client_lastname').css('border','1px solid red');
                    $('#lastname_span').html("Can't be empty");
                }
                if(email ==''){
                    $('#client_email').css('border','1px solid red');
                    $('#email_span').html("Can't be empty");
                }
                if(password ==''){
                    $('#client_password').css('border','1px solid red');
                    $('#password_span').html("Can't be empty");
                }
                return false;
            }
            
            if(!validateEmail($('#client_email').attr('value'))){
                return false;
            }

            if(!verifPass($('#client_password').attr('value'))){
                return false;
            }
            <?php

            if(isset($_GET['newLocation']))
                $newLocation = $_GET['newLocation'];
            else
                $newLocation = 'index.php?account_created=1';
            

            ?>
            // Ici on envoi les données au serveur centrale
             var data = $('form').serialize();
             //alert(data);
             $.post('admin/php/script.client_subscribe.php?'+data,function(result){
                result = result.trim();
                if(result == 'already'){
                    $('.result').css('color','orange');
                    $('.result').html('Email already used !');

                }else if(result == 'error'){
                    $('.result').css('color','red');
                    $('.result').html('Error. Try again later.');
                }else if(result == 'ok'){
                    $('.result').css('color','green');
                    $('.result').html('Account created !');
                      parent.jQuery.fancybox.close();
                      parent.window.location = "<?php echo $newLocation; ?>";
                }
             });
            return false;
        });
       

    });

</script>
    

    
    

</body>
</html>
