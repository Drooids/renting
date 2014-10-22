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

<title>Home Saigon - Login</title>
<link href='http://fonts.googleapis.com/css?family=Lato:400italic,400,700|Bitter' rel='stylesheet'>

<link href="login-style.css" media="screen" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="source/zocial.css">
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
        height:450px;
    }

</style>
<body >

    
    <!-- content -->
    <div class="grid_8 content">        
  <div class="row">
                   
                    
                  
                        
                    <!-- login widget -->
                    <div class="widget-container widget_login">
                        <h3 id='title'>Login to connect</h3>
                        
                      <form action="#" method="post" id="loginform" class="loginform">
                        
                        <p><label>Email</label><br><input name="log" id="user_login" class="input" value="" size="20" tabindex="10" type="text"></p>
                        
                        <p><label>Password</label><br><input name="pwd" id="user_pass" class="input" value="" size="20" tabindex="20" type="password"></p>
                        <h4 class='result' style='color:orange;'></h4>
                        <p class="forgetmenot"><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90"><label for="rememberme">Remember Me</label></p>
                        
                        <p class="forget_password"><a href="#">Forgot Password?</a></p>
                        
                        
                        <p class="submit">
                            <input type="submit" name="login" id="login" class="btn-submit" value="Login" tabindex="100" >
                            <input type="submit" name="subscribe" id="subscribe" class="btn-submit" value="Subscribe" tabindex="100" >
                            <input type="hidden" name="redirect_to" value="index.php" id='redirect'>
                            <input type="hidden" name="testcookie" value="1">
                        </p>                        
                        <fieldset>
                            <legend>Or use another service</legend>
                            <table width="100%" border="0">
                              <tr>
                                <td align="center"><a href="admin/php/script.client_log.php?provider=google" data-provider='google' class='social'><img class="idpico" idp="google" src="source/icons/google.png" title="google" /></a></td>
                                <td align="center"><a href="admin/php/script.client_log.php?provider=facebook" data-provider='facebook' class='social'><img class="idpico" idp="facebook" src="source/icons/facebook.png" title="facebook" /></a></td>
                               </tr>
                             
                            </table> 
                        </fieldset>
                      </form>
                      <?php
                        if(isset($_GET['detail']))
                        {
                    ?>
                        <div class="agent_phone">
                        <span>Subscribe now</span>
                        <p><strong>It's Free</strong></p>
                        </div>
                    <?php
                        }
                    ?>
                    </div>
                    <!--/ login widget --> 
                    
                    </div>
       <input type="hidden" name="email_provider" value="" id='email_provider'>
       <input type="hidden" name="name_provider" value="" id='name_provider'>
       <input type="hidden" name="connected_provider" value="" id='connected_provider'>                              
                   
    </div>       
</div>
<?php
if(isset($_GET['newLocation']))
    $newLocation = $_GET['newLocation'];
else
    $newLocation ="index.php";
?>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#login').live('click',function(){
            $('.result').html('');
             var data = $('form').serialize();
             //alert(data);
             $.post('admin/php/script.client_log.php?'+data,function(result){
                result = result.trim();
                var newLocation = "<?php echo $newLocation; ?>";
                if(result =='success'){
                    parent.jQuery.fancybox.close();
                    parent.window.location = newLocation;
                }else{
                    $('.result').html('Email or Password wrong.');
                }
             });
            return false;
        });
        $('#subscribe').live('click',function(){
            window.location = "subscribe.php?newLocation=<?php echo $newLocation; ?>";
            return false;

        });
      //window.open(_url, "windowname1", 'width=800, height=600');
      $('.social').live('click',function(){
            var href = $(this).data('provider');
            //parent.window.location = "admin/php/script.client_log.php?provider="+href;
            var win = window.open("admin/php/script.client_log.php?provider="+href, "HomeSaigonConnect", 'location=0,status=0,scrollbars=0,width=800,height=500');
            
                var e = 0;  
                if (win) {
                     win.onunload = function () {
                        if (e == 1)
                        {
                         //this will reload the iframe
                        //alert("closed");
                        // Ici la win est fermé !
                        setTimeout(function(){
                                    var email_provider = $('#email_provider').val();
                                    var name_provider = $('#name_provider').val();
                                    var connected_provider = $('#connected_provider').val();
                                    console.log(email_provider);
                                    console.log(name_provider);
                                    console.log(connected_provider);
                                    //alert();
                                    if(connected_provider == 1){
                                            parent.jQuery.fancybox.close();
                                            parent.window.location = 'index.php?connection=1';
                                     }else if(connected_provider == 2){
                                            parent.jQuery.fancybox.close();
                                            parent.window.location = 'index.php?connection=2';
                                     }else if(connected_provider == 3){
                                            parent.jQuery.fancybox.close();
                                            parent.window.location = 'index.php?connection=3';
                                     }
                        }, 2000);
                       
                        }
                        else
                        {
                          //this will be when the pop-up gets created
                        e++;                                    
                        }                         
                }
            } 
            return false;
        });
    
   
    
        



    });

</script>
    

    
    

</body>
</html>
