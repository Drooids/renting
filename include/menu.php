<?php
if (!class_exists('message')) {
   include('./admin/php/class.message.php');
   //echo "included";
}
?>
       <script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
       <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
        <?php  
            //Get the actual page
            $actual_page = explode('/', $_SERVER["PHP_SELF"]);
            $actual_page = end($actual_page);
            if(isset($_GET['service']) ){
                if(isset($_GET['properties'])){
                    $actual_page = $actual_page."?service=".$_GET['service']."&properties=".$_GET['properties'];
                }else{
                    $actual_page = $actual_page."?service=".$_GET['service'];
                }
                
                    
            }
        ?>
        <script>
        jQuery(document).ready(function($) {
            var actual_page = <?php echo json_encode($actual_page); ?>;
            //alert(actual_page);
                $('.login').fancybox({
                    autoDimensions: false,
                    'width': 330,
                    'height':600,
                     'type': 'iframe',
                     'autoSize':     false,
                    
                });
                $('.subscribe').fancybox({
                    autoDimensions: false,
                    'width': 330,
                    'height':500,
                     'type': 'iframe',
                     'autoSize':     false,
                    
                });
                $('.dropdown li a').each(function(index){
                    if($(this).attr('href') == actual_page){
                       // alert($(this).attr('href'));
                        $(this).parent().addClass('current-menu-item');
                        if($(this).hasClass("icon_menu")){
                            //$('.account').addClass('current-menu-item');
                            //alert('salut');
                        }
                    }

                });


            });
        </script>
        <!-- font awesome -->        
        
        
        <div class="topmenu">
            <ul class="dropdown">
                <li class="menu-item-home "><a href="index.php"><span>Home</span></a></li>
                <li><a href="#" ><span>Property</span></a>
                    <ul >
                        <li><a href="properties.php?service=rent&properties=room"><span>Room</span></a></li>
                        <li><a href="properties.php?service=rent&properties=appartment"><span>Appartment</span></a></li>
                        <li><a href="properties.php?service=rent&properties=house"><span>House</span></a></li>
                        <li><a href="properties.php?service=rent&properties=office"><span>Office</span></a></li>
                    </ul>
                </li>
                <!--<li><a href="properties.php?service=rent&properties=room"><span>Room</span></a></li>
                <li><a href="properties.php?service=rent"><span>Rent</span></a></li>
                <li><a href="properties.php?service=sale"><span>Sale</span></a></li>-->
                <li><a href="information.php"><span>Enterprise</span></a></li>
                <!--<li><a href="properties-list.html"><span>Office for Lease</span></a></li>-->
                <li><a href="contact.php"><span>Contact</span></a></li>
                
                <?php
                    if(isset($_SESSION['client_id'])){
                        $client = new client($_SESSION['client_id']);
                        
                        //5 Min = + 300 sec

                ?>
                <li class='account'><a  href="my_page.php"><span>My Account</span></a>
                <ul class='connected '>
                    <li><a class="icon_menu" href="calendar.php" title="Calendar"><i class="icon-calendar-empty icon-2x icon_menu_margin" ></i>Calendar </a></li>
                    <li><a class="icon_menu" href="favoris.php" title="Favoris"><i class="icon-heart-empty icon-2x icon_menu_margin"></i>Favoris </a></li>
                    <li><a class="icon_menu" href="message.php" title="Messages"><i class="icon-comment-alt icon-2x icon_menu_margin"></i>Messages 
                        <?php
                            $reponse = $bdd->query("SELECT count(id) AS total FROM message WHERE message_to = '$client->id' AND user <> 'client' AND message_read = 0");
                            $reponse = $reponse->fetchAll();
                            if($reponse[0]['total'] != 0){
                                echo"<em style='color:red;'>".$reponse[0]['total']." news</em>";
                            }
                            


                        ?>
                    </a></li>
                    <li><a class="icon_menu" href="my_page.php" title="Settings"><i class="icon-cog icon-2x icon_menu_margin"></i>Settings </a></li>
                    <li><a class="icon_menu logout" href="logout.php" title="Log out"><i class="icon-off icon-2x icon_menu_margin"></i>Log out</a></li>
                </ul>
                <?php
                 }else{
                ?>
                <li><a class="icon_menu login  fancybox.iframe" title="Connection" href="login.php"><span>Login / Subscribe</span></a>
                <!--<ul class='disconnected' >
                    <li><a class="icon_menu login  fancybox.iframe" href="login.php" title="Log in"><i class="icon-off icon-2x icon_menu_margin"></i>Log in</a></li>
                    <li><a class="icon_menu subscribe fancybox fancybox.iframe" href="subscribe.php" title="Subscribe"><i class="icon-signin icon-2x icon_menu_margin"></i>Subscribe</a></li>
                </ul>-->
                <?php

                    }
                ?>
                </li>
            </ul>
        </div>
        
        <!--<div class="header_phone">
        </br>
        	<span>contact@home-saigon.com</span>
        </div>
        -->