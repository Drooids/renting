<?php session_start();
if(!isset($_SESSION['client_id'])){
                         header('Location: index.php');
                    }
include('admin/php/class.load.php');

?>
<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="author" content="HomeSaigon">
<meta name="keywords" content="">

<title>Home Saigon - Favoris</title>
<link href='http://fonts.googleapis.com/css?family=Lato:400italic,400,700|Bitter' rel='stylesheet'>

<link href="style.css" media="screen" rel="stylesheet">
<link href="screen.css" media="screen" rel="stylesheet">

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

<script src="js/jquery.prettyPhoto.js"></script>
<link href="css/prettyPhoto.css" rel="stylesheet"> 

<!--[if IE 7]> <link href="css/ie.css" media="screen" rel="stylesheet"> <![endif]-->
<link href="custom.css" media="screen" rel="stylesheet">
<script language="javascript" src="js/custom.js"></script>
</head>

<body>
<?php include('admin/php/analytic.php'); ?>
<div class="body_wrap" >

<div class="header" style="background-image:url(images/header_default.jpg);">
<div class="header_inner">
    <div class="container_12">

    <div class="header_top">
    
        <div class="logo">
        <a href="index.php"><img src="images/logo.png" alt=""></a>
        <h1>Home Saigon - Real Estate</h1>
        </div>
        
      <?php

        include('include/menu.php');

    ?>
        
        <div class="clear"></div>
    </div>

    <div class="header_bot">

          
        <!--/ search_main -->
        
    </div>

    <div class="clear"></div>
    </div>
</div>
</div>
<!--/ header -->

<!-- map before content -->

<!--/ map before content -->

<div class="middle">
<div class="container_12">
<!-- content -->
 <?php
$id = $_SESSION['client_id'];
$reponse = $bdd->query("SELECT * FROM favoris WHERE client_id = '$id'");


$donnees = $reponse->fetchAll();
$a=count($donnees);

$result = $a/5;
if($a % 5 == 0){
//echo $result;
}else{
$result = explode(".",$result);
$result = $result[0]+1;
//echo $result;
}

if($result == 0)
    $result = 1;

?>
    <div class="grid_8 content">
     <!-- sorting, pages -->
        <div class="block_hr list_manage">
            <div class="inner">
                    <form action="#" method="post" class="form_sort">
                        <span class="manage_title">Sort by:</span>
                            <select class="select_styled white_select" name="sort_list" id="sort_list">
                                <option value="1">Latest Added</option>
                                <option value="2" selected>Price High - Low</option>
                                <option value="3">Price Low - Hight</option>
                                <option value="4">Names A-Z</option>
                                <option value="5">Names Z-A</option>
                            </select>
                    </form>    
                    
                    
                    
                    <div class="pages" style='float:right;'>
                        <span class="manage_title">Page: &nbsp;<strong class='number_page' id='info_page'  data-page='1' data-total ='<?php echo $result; ?>'>1 of <?php echo $result; ?></strong></span> <a href="#" class="link_prev" data-click="0">Previous</a><a href="#" class="link_next" data-click="2">Next</a>
                    </div> 
                    
                    <div class="clear"></div>
            </div>  
        </div>
        <!--/ sorting, pages -->
        
        <!-- real estate list -->
        <div class="re-list">
        




                    <?php
                        $total = count($donnees);
                    if($total >= 5)
                        $total = 5;
        for($k=0;$k<$total;$k++){
                $id_portfolio=$donnees[$k]['portfolio_id'];
                $reponse = $bdd->query("SELECT id_portfolio FROM portfolio WHERE id_portfolio = '$id_portfolio' AND actif_portfolio = 1");
                $donnees = $reponse->fetchAll();
                if(count($donnees) != 0){
                         $object = new portfolio($id_portfolio);
                        if($object->actif_portfolio == 1){
                                    $reponse = $bdd->query("SELECT id_gallery FROM gallery where id_gallery='$object->link_portfolio'");
                                 $donnees2 = $reponse->fetchAll();
                                 $id_gallery=$donnees2[0]['id_gallery'];
                                 //Creation de la gallery
                                 $object_gallery = new gallery($id_gallery);
                                 $nom_fichier = $object_gallery->GetFirstImage();

                            echo"<div class='re-item' >";       
                             if($active_portfolio==1)    
                                echo"<div class='re-image'><a href='properties-details.php?id=".$object->id_portfolio."'><img src='admin/upload/uploads/timthumb.php?src=".$object->id_portfolio."/".$nom_fichier."&w=218&h=125' alt=''  ></a></div>";
                            else
                                echo"<div class='re-image'><a href='#'><img src='admin/upload/uploads/timthumb.php?src=".$object->id_portfolio."/".$nom_fichier."&w=218&h=125' alt=''  ></a></div>";
                            
                            echo"<div class='re-short'>";              
                            echo"<div class='re-top'>";
                            if($active_portfolio==1)
                                 echo"<h2><a href='properties-details.php?id=".$object->id_portfolio."'>".$object->nom_portfolio."</a></h2>";
                             else
                                echo"<h2><a href='#'>".$object->nom_portfolio."</a></h2>";
                                if($object->service_portfolio =='rent')
                                    echo"<span class='re-price'>$".$object->price_portfolio." / mo.</span>";
                                else
                                    echo"<span class='re-price'>$".$object->price_portfolio." </span>";
                            echo"</div>";                
                                $text_portfolio = $object->text_portfolio;                
                                $text_portfolio = explode('<ul', $object->text_portfolio);
                               
                            echo"<div class='re-descr'>".$text_portfolio[0];
                            echo"</div>";                
                            echo"<div class='re-bot'>";
                            if($active_portfolio==1){
                                echo"<a href='properties-details.php?id=".$object->id_portfolio."' class='link-more'>View Details</a>";
                                echo"<a href='properties-details.php?id=".$object->id_portfolio."' class='link-viewmap tooltip' title='View on Map'>View on Map</a>";

                            }else{
                                echo"<a href='#' class='link-more'>View Details</a>";
                                echo"<a href='#' class='link-viewmap tooltip' title='View on Map'>View on Map</a>";

                            }
                            
                            // Si il est dans les favoris
                if(isset($_SESSION['client_id'])){
                                            $id_client = $_SESSION['client_id'];
                                            $verif_favoris = $bdd->query("SELECT id FROM favoris where portfolio_id='$object->id_portfolio' AND client_id='$id_client'");
                                            $verif_favoris = $verif_favoris->fetchAll();
                    if(count($verif_favoris) == 1){
                        echo"<a class='link-save tooltip' href='#' hidefocus='true' data-id='".$object->id_portfolio."' style='outline: medium none;' oldtitle='Save Offer' aria-describedby='ui-tooltip-0'>Save Offer</a>";

                    }else{
                         echo"<a class='link-save-empty tooltip' href='#' hidefocus='true' data-id='".$object->id_portfolio."' style='outline: medium none;' oldtitle='Save Offer' aria-describedby='ui-tooltip-0'>Save Offer</a>";

                    }
                }else{
                    echo"<a class='link-save-empty tooltip' href='#' hidefocus='true' data-id='".$object->id_portfolio."' style='outline: medium none;' oldtitle='Save Offer' aria-describedby='ui-tooltip-0'>Save Offer</a>";

                }
                            
                           
                                        echo"<ul class='gallery' style='display:inline-block; width:10x; margin-left:0px; list-style:none;'>";
                                        if($object->link_portfolio != ''){
                                            $reponse = $bdd->query("SELECT id_gallery FROM gallery where id_gallery='$object->link_portfolio'");
                                            $donnees2 = $reponse->fetchAll();
                                            $id_gallery=$donnees2[0]['id_gallery'];
                                            //On crée une objet gallery
                                            $object_gallery = new gallery($id_gallery);

                                                    $link_gallery = explode(",", $object_gallery->link_gallery);
                                                    
                                                    $longueur=count($link_gallery);
                                                    //echo "longueur: ".$longueur;
                                                        for($j=0;$j<$longueur;$j++){
                                                            $id=$link_gallery[$j];
                                                            $reponse = $bdd->query("SELECT nom_fichier,id_fichier
                                                                                    FROM fichier
                                                                                    where id_fichier = '$id' ");

                                                        
                                                            $donnees3 = $reponse->fetchAll();
                                                                if(count($donnees3) != 0){
                                                                    $nom_fichier=$donnees3[0]['nom_fichier'];
                                                                    $id_fichier=$donnees3[0]['id_fichier'];

                                                                    if($j == 0){
                                                                          echo"<li style=''> <a href='admin/upload/uploads/timthumb.php?src=".$nom_fichier."&w=500' rel='prettyPhoto[gallery".$k."]' class='link-viewimages' title='View Images'>View Images</a>";
                                                                          echo"</li>";
                                                                    }else{
                                                                          echo"<li style='display:none;'> <a href='admin/upload/uploads/timthumb.php?src=".$nom_fichier."&w=500' rel='prettyPhoto[gallery".$k."]' class='link-viewimages' title='View Images'>View Images</a>";
                                                                          echo"</li>";
                                                                    }
                                                                }
                                                        }
                                                
                                        }
                                           
                                        echo "</ul >";
                            echo"</div>";
                            echo"</div>";
                            echo"<div class='clear'></div>";
                            echo"</div>";

                            
                        }
                }
               
                 
            }

        ?>
            
        
        </div>
        <!--/ real estate list -->
        <script type="text/javascript">
          $(".gallery a[rel^='prettyPhoto']").prettyPhoto({});
        </script>
     
    </div>
    <?php
        include('include/adresse.php');
     ?>
    <!--/ sidebar -->
    <div class="clear"></div>


</div>
</div>
<!--/ middle -->


<div class="footer" style='height:70px; background:green; margin-bottom:0px; '>
<div class="footer_inner"style='height:300px;'>
   
   
    
        
       <?php include('include/footer.php'); ?>
     
</div>    
</div>

</div>
 <script type="text/javascript">
     jQuery(document).ready(function($) {
        $('#sort_list').change(function(e){
                        e.preventDefault(); 
                        var page = <?php echo json_encode($result); ?>;
                         var filter_val = $('#sort_list').attr("value");
                        //alert(filter_val);
                       $('.number_page').html("1 of "+page);
                       $('#info_page').data('page',1);
                       $('#info_page').data('total',page);
                       $('.re-list').load("admin/php/affichagePropertyFavoris.php?filter="+filter_val);
                    
                });
         });
          <?php
                    if(isset($_SESSION['client_id'])){


                ?>
                    $('.link-save-empty').live('click',function(e){
                        var favoris = $(this);
                        e.preventDefault();
                        var id = $(this).data('id');
                        //alert(id);
                        $.post('admin/php/script.favoris.php',{id:id,action:'add'},function(e){
                            favoris.addClass('link-save');
                            favoris.removeClass('link-save-empty');
                              $.jGrowl("The property n°"+id+" has been added on your favoris", {
                                                                        header: 'Favoris',
                                                                        sticky: true,
                                                                        theme: 'warning'
                                                                    });
                             $.jGrowl.defaults.closerTemplate = '<div>hide all notifications</div>';
                        });

                    });

                     $('.link-save').live('click',function(e){
                        var favoris = $(this);
                        e.preventDefault();
                        var id = $(this).data('id');
                        //alert(id);
                        $.post('admin/php/script.favoris.php',{id:id,action:'delete'},function(e){
                            favoris.addClass('link-save-empty');
                            favoris.removeClass('link-save');
                              $.jGrowl("The property n°"+id+" has been deleted from your favoris", {
                                                                        header: 'Favoris',
                                                                        sticky: true,
                                                                        theme: 'warning'
                                                                    });
                             $.jGrowl.defaults.closerTemplate = '<div>hide all notifications</div>';
                        });

                    });



                <?php
                }

                ?>
    </script>
<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false&#038;ver=1.0'></script>
<script type='text/javascript' src='js/jquery.gmap.min.js?ver=3.3.0'></script>
         <?php include('analytic/script.analytic.php'); ?>
</body>
</html>
