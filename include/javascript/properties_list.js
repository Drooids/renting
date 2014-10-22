<!--  -->
        <script type="text/javascript">
        jQuery(document).ready(function($) {
            //Init function at the begining:

            if($('#properties').attr('value') == 'room'){
                searchRoom();
            }else if($('#properties').attr('value') == 'land'){
                searchLand();
            }else if($('#properties').attr('value') == 'office'){
                searchOffice();
            }else{
                resetFilter();
            }

            // Function d'envoi au serveur
            function send_filter_widget(district,price,available,properties,square,bed,bath,service){
                //alert(service);
                $.get("admin/php/filter_action.php",{action:'widget',district:district,price:price,available:available,properties:properties,square:square,bed:bed,bath:bath,service:service},function(result){
                      result = $.trim(result);
                      if(result != ''){
                        window.location = "properties.php";
                      }
                  });
            }

            function send_filter_refresh(district,price,available,properties,square,bed,bath,service,pool,pets,furnished,sort){
                $.get("admin/php/filter_action.php",{action:'widget',district:district,price:price,available:available,properties:properties,square:square,bed:bed,bath:bath,service:service,pool:pool,pets:pets,furnished:furnished,sort:sort},function(result){
                      result = $.trim(result);
                      if(result != ''){
                       $('.total_offer').html("("+result+" OFFERS)");
                        var page = parseInt(result/5);
                        //alert(page);
                                if(page < (result/5)){
                                    page=page+1;
                                }
                                if(page == 0){
                                    page=1;
                                }

                           // alert(page);
                       $('.number_page').html("1 of "+page);
                       $('#info_page').data('page',1);
                       $('#info_page').data('total',page);
                       $('.re-list').load("admin/php/affichageProperty.php");

                      }
                  });
            }

            function change_total(properties,district,service,price,available,square,pool,pets,furnished){
                $.get("admin/php/bath_affiche.php",{properties:properties,district:district,service:service,price:price,available:available,square:square,pool:pool,pets:pets,furnished:furnished},function(result){
                    //alert(result.bath_1);
                    $('#label_baths_1').html('1 ('+result.bath_1+' offers)');
                    $('#label_baths_2').html('2 ('+result.bath_2+' offers)');
                    $('#label_baths_3').html('3 ('+result.bath_3+' offers)');
                    $('#label_baths_4').html('4 ('+result.bath_4+' offers)');
                    $('#label_baths_5').html('5+ ('+result.bath_5+' offers)');
                });
              $.get("admin/php/bed_affiche.php",{properties:properties,district:district,service:service,price:price,available:available,square:square,pool:pool,pets:pets,furnished:furnished},function(result){
                    //alert(result.bath_1);
                    $('#label_beds_1').html('1 ('+result.bed_1+' offers)');
                    $('#label_beds_2').html('2 ('+result.bed_2+' offers)');
                    $('#label_beds_3').html('3 ('+result.bed_3+' offers)');
                    $('#label_beds_4').html('4 ('+result.bed_4+' offers)');
                    $('#label_beds_5').html('5+ ('+result.bed_5+' offers)');
              });
            }

            function update_change_total(){
                var filter_price_min=$('#price_from').attr('value');if(filter_price_min=='min'){filter_price_min="0"}var filter_price_max=$('#price_to').attr('value');if(filter_price_max=='max'){filter_price_max="99999999999999"}var filter_price=filter_price_min+';'+filter_price_max;var filter_square_min=$('#square_from').attr('value');if(filter_square_min=='min'){filter_square_min="0"}var filter_square_max=$('#square_to').attr('value');if(filter_square_max=='max'){filter_square_max="99999999999999"}var filter_square=filter_square_min+';'+filter_square_max;var filter_available=$('#available').attr('value');if(filter_available=='all'){filter_available=''}var filter_properties=$('#properties').attr('value');if(filter_properties=='all'){filter_properties=''}var filter_bed="";$('.filter_bed:checked').each(function(i){if(i==0){filter_bed+=$(this).attr('value')}else{filter_bed=filter_bed+';'+$(this).attr('value')}});var filter_bath="";$('.filter_bath:checked').each(function(i){if(i==0){filter_bath+=$(this).attr('value')}else{filter_bath=filter_bath+';'+$(this).attr('value')}});var filter_district="";$('.addField_remove').each(function(i){if(i==0){filter_district+=$(this).find('input').attr('value')}else{filter_district=filter_district+';'+$(this).find('input').attr('value')}});var filter_pool=$('input:radio[name=pool]:checked').attr('value');if(filter_pool=='2'){filter_pool=""}var filter_furnished="";var filter_service=$('input:radio[name=service]:checked').attr('value');if(filter_service=="service_appartment"){filter_service="rent";filter_furnished=1}
                    
                    filter_furnished = $('input:radio[name=Furnished]:checked').attr('value');
                       if(filter_furnished == "-1"){
                                 filter_furnished="";
                                 
                            }
                        
                          // pets
                    var filter_pet ="";
                        filter_pet = $('input:radio[name=pets]:checked').attr('value');
                       if(filter_pet == "-1"){
                             filter_pet="";
                             
                        }
                    //alert(filter_available);
                        //alert(filter_furnished);
                change_total(filter_properties,filter_district,filter_service,filter_price,filter_available,filter_square,filter_pool,filter_pet,filter_furnished);
            
            }
            // Changement de service
            $('input:radio[name=service]').change(function(){
                var changement = $('input:radio[name=service]').attr('checked');
                //alert(changement);
                 if(changement == 'checked'){
                    $('.hide_rent').show();
                 }else{
                    $('.hide_rent').hide();
                 }
                 
                        //alert(service_widget);
                        if(changement == 'checked'){
                            $('#ct_rent').attr('checked', true);
                            $("label[for='ct_rent']").attr('class','checked');
                            $('#ct_sale').attr('checked', false);
                            $("label[for='ct_sale']").attr('class','');
                        }else{
                            $('#ct_sale').attr('checked', true);
                            $("label[for='ct_sale']").attr('class','checked');
                            $('#ct_rent').attr('checked', false);
                            $("label[for='ct_rent']").attr('class','');

                        }
                update_change_total();
                 });
            //Changement d'avaibality
             $('#available').change(function(){
                update_change_total();
            });
            
            $('#properties').change(function(){
                update_change_total();
            });

            $('#sort_list').change(function(){
                 var filter_val = $('#sort_list').attr("value");
                $.get("admin/php/filter_action.php",{action:'widget',sort:filter_val},function(result){
                    if(result != ''){
                        var page = parseInt(result/5);
                                if(page < (result/5)){
                                    page=page+1;
                                }
                                if(page == 0){
                                    page=1;
                                }
                           // alert(page);
                       $('.number_page').html("1 of "+page);
                       $('#info_page').data('page',1);
                       $('#info_page').data('total',page);
                       $('.re-list').load("admin/php/affichageProperty.php");
                    }
                });
            });

           
            

            //Click du bouton sur le widget, ici on prend les prix aussi car pas de fonction changement
            $('#search_submit').live("click",function(){
                // Changement de service dans le Widget du TOP
            var service = $('.switch').find('input:radio[name=field]:checked').attr("value");

            // Changement du district dans le Widget du TOP
            var district = $('#tf-seek-input-select-location_id').attr("value");
               
        
            // Changement du bed dans le Widget du TOP
            var bed = $('#sopt_range_slider_range_bedrooms_select').attr("value");
               
            // Changement du bath dans le Widget du TOP
            var bath = $('#sopt_range_slider_range_baths_select').attr("value");
              
            //changement de properties dans le widget du TOP
            var properties = $('#tf-seek-input-select-type_properties').attr("value");
            
            //changement de available dans le widget du TOP
            var available = $('#tf-seek-input-select-avalaible_id').attr("value");   
            if(available == 'all'){
                available ='';
            }
            // City dans le widget du TOP
            var city_widget ='HCMC';

            //changement du price dans le widget du TOP
             if(service == 'rent')
                var price = $('#price_range_rent').attr('value');
            else
                var price = $('#price_range_sale').attr('value');

            //Changement du square range
            var square = $('#square_range').attr('value');
            
          

           // alert('hello');
            send_filter_widget(district,price,available,properties,square,bed,bath,service,0);          
                //send_filter('city',city_widget);
           
                return false;
            });
            
        
       /* var filter_select ='';
         if(value =='1'){
            filter_select='ORDER BY id_portfolio DESC'
         }else if(value =='2'){
            filter_select='ORDER by price_portfolio DESC'
         }else if(value =='3'){
            filter_select='ORDER by price_portfolio'
         }else if(value =='4'){
            filter_select='ORDER by nom_portfolio'
         }else if(value =='5'){
            filter_select='ORDER by nom_portfolio DESC'
         }*/
       
         
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 ////////////////////////////////////////////   Mise en place du Filter + Widget apres lancement de la page           /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            // Verification si c'est le service est bien mis en place
            var changement = $('input:radio[name=service]').attr('checked');
                //alert(changement);
                 if(changement == 'checked'){
                    $('.hide_rent').show();
                 }else{
                    $('.hide_rent').hide();
                 }
                 
                        //alert(service_widget);
                        if(changement == 'checked'){
                            $('#ct_rent').attr('checked', true);
                            $("label[for='ct_rent']").attr('class','checked');
                            $('#ct_sale').attr('checked', false);
                            $("label[for='ct_sale']").attr('class','');
                        }else{
                            $('#ct_sale').attr('checked', true);
                            $("label[for='ct_sale']").attr('class','checked');
                            $('#ct_rent').attr('checked', false);
                            $("label[for='ct_rent']").attr('class','');

                        }
           


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 ////////////////////////////////////////////   FILTER           /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        function searchRoom(){
            $('.bed_affiche').hide();
            $('.bath_affiche').hide();
            $('.petData').hide();
            $('.serviceData').hide();
            $('.swimmingData').hide();
        }
        
        function searchLand(){
            $('.bed_affiche').hide();
            $('.bath_affiche').hide();
            $('.petData').hide();
            $('.serviceData').hide();
            $('.swimmingData').hide();
            $('.furnishedData').hide();
        }
        function searchOffice(){
            $('.bed_affiche').hide();
            $('.bath_affiche').hide();
            $('.petData').hide();
            $('.serviceData').show();
            $('.swimmingData').hide();
            $('.furnishedData').hide();
        }
        function resetFilter(){
            $('.bed_affiche').show();
            $('.bath_affiche').show();
            $('.petData').show();
            $('.serviceData').show();
            $('.priceData').show();
            $('.squareData').show();
            $('.furnishedData').show();
        }

        $('#properties').change(function(){
            if($('#properties').attr('value') == 'room'){
                searchRoom();
            }else if($('#properties').attr('value') == 'land'){
                searchLand();
            }else if($('#properties').attr('value') == 'office'){
                searchOffice();
            }else{
                resetFilter();
            }

        });
        $('.confirm').live("click", function(){
         
        var filter_val = $('#sort_list').attr("value");
        
           
            

        var filter_price_min = $('#price_from').attr('value');
            //on met à 0 si on a min
            if(filter_price_min == 'min'){
                filter_price_min="0";
            }
       

        var filter_price_max = $('#price_to').attr('value');
            //on met à 999999999 si on a max
            if(filter_price_max == 'max'){
                    filter_price_max="99999999999999";
            }
        var filter_price = filter_price_min+';'+filter_price_max;
            

            // Square
        var filter_square_min = $('#square_from').attr('value');
            //on met à 0 si on a min
            if(filter_square_min == 'min'){
                filter_square_min="0";
            }

        var filter_square_max = $('#square_to').attr('value');
            //on met à 999999999 si on a max
            if(filter_square_max == 'max'){
                    filter_square_max="99999999999999";
                }
        var filter_square =  filter_square_min+';'+filter_square_max;

            //Availability
        var filter_available = $('#available').attr('value');
            if(filter_available == 'all'){
                filter_available='';
            }

            //Properties
        var filter_properties = $('#properties').attr('value');
           if(filter_properties == 'all'){
            filter_properties = '';
           }


            //Recuperer le nombre de chambre
        var filter_bed = "";
            $('.filter_bed:checked').each(function(i){
                if(i == 0){
                    filter_bed += $(this).attr('value');
                }else{
                    filter_bed = filter_bed+';'+$(this).attr('value');
                }
                });
                  
                
            // Recuperer le nombre de salle de bains
        var filter_bath = "";
            $('.filter_bath:checked').each(function(i){
                if(i == 0){
                    filter_bath += $(this).attr('value');
                }else{
                    filter_bath = filter_bath+';'+$(this).attr('value');
                }
                 
                });
               
               
                      
                    
           
            
            // Recuperer les differents district
        var filter_district = "";
            $('.addField_remove').each(function(i){
                if(i == 0){
                    filter_district += $(this).find('input').attr('value');
                }else{
                    filter_district = filter_district+';'+$(this).find('input').attr('value');
                }
                   
                        
                 
                });
            //Piscine
        var filter_pool = $('input:radio[name=pool]:checked').attr('value');
            if(filter_pool == '2'){
                filter_pool="";
            }

            // Service
            var filter_furnished ="";
            var filter_service ="";
        var filter_service = $('input:radio[name=service]:checked').attr('value');
           if(filter_service == "service_appartment"){
                 filter_service="rent";
                 filter_furnished = 1;
            }

        filter_furnished = $('input:radio[name=Furnished]:checked').attr('value');
           if(filter_furnished == "-1"){
                 filter_furnished="";
                 
            }
            
              // pets
        var filter_pet ="";
        filter_pet = $('input:radio[name=pets]:checked').attr('value');
           if(filter_pet == "-1"){
                 filter_pet="";
                 
            }

            send_filter_refresh(filter_district,filter_price,filter_available,filter_properties,filter_square,filter_bed,filter_bath,filter_service,filter_pool,filter_pet,filter_furnished,filter_val);
            update_change_total();
            if(mapObject != null){
                 refreshMarker(mapObject);
                console.log('Marker refreshed');
            }
              /*
            }
       $('.re-list').load("admin/load/affichageProperty.php?info="+encodeURIComponent(info));
         $('.link_next').data('click',2);
         $('.link_prev').data('click',0);
       //$('.bath_affiche').load("admin/load/bath_affiche.php?district="+encodeURIComponent(district_filter));
      // $('.bed_affiche').load("admin/load/bed_affiche.php?district="+encodeURIComponent(district_filter));

      $.get("admin/load/bath_affiche.php",{district:district_filter,service:serice_filter,price:price_filter},function(result){
            //alert(result.bath_1);
            $('#label_baths_1').html('1 ('+result.bath_1+' offers)');
            $('#label_baths_2').html('2 ('+result.bath_2+' offers)');
            $('#label_baths_3').html('3 ('+result.bath_3+' offers)');
            $('#label_baths_4').html('4 ('+result.bath_4+' offers)');
            $('#label_baths_5').html('5+ ('+result.bath_5+' offers)');
      });
      $.get("admin/load/bed_affiche.php",{district:district_filter,service:serice_filter,price:price_filter},function(result){
            //alert(result.bath_1);
            $('#label_beds_1').html('1 ('+result.bed_1+' offers)');
            $('#label_beds_2').html('2 ('+result.bed_2+' offers)');
            $('#label_beds_3').html('3 ('+result.bed_3+' offers)');
            $('#label_beds_4').html('4 ('+result.bed_4+' offers)');
            $('#label_beds_5').html('5+ ('+result.bed_5+' offers)');
      });

      $.get("admin/load/totalProperty.php",{request:requete+order},function(result){
           // alert(result.total);

               total=result.total;
               $('.total_offer').html("("+total+" OFFERS)");
               var page = parseInt(total/5);
                    if(page < (total/5)){
                        page=page+1;
                    }
                    if(page == 0){
                        page=1;
                    }
               // alert(page);
             $('.number_page').html("1 of "+page);
         });
*/
        return false;

        });
            


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 ////////////////////////////////////////////   Filter           /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     

       
            
            //alert('hello');
      //  $('.re-item').filter(".middle").hide();
       //     return false;
       // });
   
    

    $('.link_next').live("click",function(){
        var page = $('.number_page').data('page');
        var total = $('.number_page').data('total');
        if(page<total){
            page = page +1;
            $('.re-list').load("admin/php/affichageProperty.php?limit="+page);
            $('.number_page').html(page+" of "+total);
            $('#info_page').data('page',page);
        }

        return false;

    });
    $('.link_prev').live("click",function(){
        var page = $('.number_page').data('page');
        var total = $('.number_page').data('total');
        if(page>1){
            page = page -1;
            $('.re-list').load("admin/php/affichageProperty.php?limit="+page);
            $('.number_page').html(page+" of "+total);
            $('#info_page').data('page',page);
        }        

        return false;

    });
    $(".autocomplete").keypress(function(event) {
                    if (event.which == 13) {
                        event.preventDefault();
                         var tableau = ["district 1","district 2","district 3","district 4","district 5","district 6","district 7","district 8","district 9","district 10","district 11","district 12","Go Vap district","Tan Binh district","Tan Phu district","Binh Thanh district","Phu Nhuan district","Thu Duc district","Bin Tan district"];
                            var info = $(this).parent().find('input').attr('value');
                            var verif = 0;
                            if($.inArray(info ,tableau) == -1)
                                return false;
                            
                            $('.addField_remove').each(function(){
                                //console.log("Value:"+$(this).parent().find('input').attr('value')+" Info:"+info);
                                if($(this).find('input').attr('value')==info){
                                    verif = 1;
                                }
                                //alert(verif);
                            });
                            if($('.addField_remove').length == 0)
                                verif =0;
                            if(info != 'Add NEW Zone' && verif == 0){
                                   
                                    var result="<div class='custom-input addField_remove'><input type='text' name='district_3' value='"+info+"' class='autocomplete' readonly><span id='rem_district_3' class='rem_district'></span></div>";
                                $('.inputlist').prepend(result);
                                 $('.add_district').parent().find('input').attr('value','Add NEW Zone');
                                 
                                 update_change_total();

                            }else{

                            }
                            


                                    }
    });

    $('.add_district').live("click", function(){
            var tableau = ["district 1","district 2","district 3","district 4","district 5","district 6","district 7","district 8","district 9","district 10","district 11","district 12","Go Vap district","Tan Binh district","Tan Phu district","Binh Thanh district","Phu Nhuan district","Thu Duc district","Bin Tan district"];
            var info = $(this).parent().find('input').attr('value');
            var verif = 0;
            if($.inArray(info ,tableau) == -1)
                return false;
            

            $('.addField_remove').each(function(){
                //console.log("Value:"+$(this).find('input').attr('value')+" Info:"+info);
                if($(this).find('input').attr('value')==info){
                    verif = 1;
                    //alert(verif);
                }
                //alert(verif);
            });

            if($('.addField_remove').length == 0)
                verif =0;

            if(info != 'Add NEW Zone' && verif == 0){
                    
                
                        var result="<div class='custom-input addField_remove'><input type='text' name='district_3' value='"+info+"' class='autocomplete' readonly><span id='rem_district_3' class='rem_district'></span></div>";
                                $('.inputlist').prepend(result);
                                 $('.add_district').parent().find('input').attr('value','Add NEW Zone');
                                            
                 update_change_total();

            }else{

            }
            


         });

          $('.rem_district').live("click", function(){
           
            $(this).parent().remove();
            //alert(requete);
            update_change_total();


         });
          
          $(".autocomplete").autocomplete({
             source: ["district 1","district 2","district 3","district 4","district 5","district 6","district 7",
            "district 8","district 9","district 10","district 11","district 12","Go Vap district","Tan Binh district","Tan Phu district","Binh Thanh district","Phu Nhuan district","Thu Duc district","Bin Tan district"]
        });
         function validateEmail($email) {
              var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
              if( !emailReg.test( $email ) ) {
                return false;
              } else {
                return true;
              }
            }

        function SetNewsletter(email,newsletter){
                    $.post("admin/php/SetNewsletter.php",{email:email,newsletter:newsletter},
                         function() {
                            
                            //alert("saved !");
                     });
            
             }

            $('.newsletter').live("click",function(){
                email_test = $(this).parent().find('.newsletter_input').attr('value');
                if( validateEmail(email_test)) {
                   // alert("hello")
                   SetNewsletter(email_test,'new');
                   $.jGrowl("Thanks for your subscription", {
                                    header: 'NEWSLETTER',
                                    sticky: true,
                                    theme: 'warning'
                                });
                    $.jGrowl.defaults.closerTemplate = '<div>hide all notifications</div>';
                 }
                return false;
            });
            var mapObject = null;
        $('#showMap').live('click',function(){
            if($(this).hasClass('active') == false){
                $('#showList').removeClass('active');
                 $(this).addClass('active');
                 $('.list_manage').hide();
                 $('.re-list').hide();
                 $('.buttonFixedMenu').show();
                 //alert($(window).height());
                 var width = $(window).width();
                 $('#map-canvas').css('width',width+'px');
                 $('#fixedButton').addClass('fixedButton',100, "easeOutBounce");
                 $('#fixedMenu').addClass('fixedMenu',100, "easeOutBounce");
                 $('body').css('overflow','hidden');
                 $('.full_map').show();
                 $('.fixedMenu').show();
                 // alert($('.full_map').height());
                mapObject = initialize();
                refreshMarker(mapObject);
                console.log(mapObject);
            }
            
            return false;
        });

        $('#showList').live('click',function(){
            if($(this).hasClass('active') == false){
                //$('.fixedMenu').animate({right:"0"});

                $('#showMap').removeClass('active');
                 $(this).addClass('active');
                 $('.list_manage').show();
                 $('.re-list').show();
                 $('#fixedButton').removeClass('fixedButton',100, "easeOutBounce");
                 $('#fixedMenu').removeClass('fixedMenu',100, "easeOutBounce");
                    $('.buttonFixedMenu').hide();
                    $('.buttonFixedMenu_button').data('menu','inactive');
                    $('.fixedMenu').animate({right:"-310px"});
                    $('.buttonFixedMenu').animate({right:"0px"});
                    $('.buttonFixedMenu_button').removeClass('active');
                 $('body').css('overflow','');
                  $('.full_map').hide(1000);
                  delete(mapObject);
    
            }
            return false;

        });
        $('.buttonFixedMenu_button').live('click',function(){
            var data = $(this).data('menu');
            if(data == 'active'){
                $(this).data('menu','inactive');
                $('.fixedMenu').animate({right:"-310px"});
                $('.buttonFixedMenu').animate({right:"0px"});
                $('.buttonFixedMenu_button').removeClass('active');

            }else{
                $(this).data('menu','active');
                $('.fixedMenu').animate({right:"-10px"});
                $('.buttonFixedMenu').animate({right:"300px"});
                $('.buttonFixedMenu_button').addClass('active');
            }

            return false;
        });

        function getWindowInfo(id,price,bath,bed,img){
            var text ="<a href='properties-details.php?id="+id+"'><div style='width:180px; height:60px; diplay:block;'>";
            text+="<img src='"+img+"' style='width:70px; height:50px; float:left; border: 1px solid black;'>";
            text+=" <div style='font-size: 15px; float:left;'>";
            text+="<p style='margin:2px; color:black;font-weight:bold;'>"+price+"</p>";
            text+="<p style='margin:2px;'>"+bath+" bath, "+bed+" beds</p>";
            text+="</div></div></a>";
            return text;
          
        }
        
        function initialize() {
            
            var lat ="10.771549";
            var lng ="106.698310";
            var style =[{"featureType":"administrative","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"water","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","stylers":[{"visibility":"simplified"}]},{"featureType":"landscape","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"visibility":"off"}]},{"featureType":"road.local","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"water","stylers":[{"color":"#84afa3"},{"lightness":52}]},{"stylers":[{"saturation":-17},{"gamma":0.36}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#3f518c"}]}];

            var mapOptions = {
              zoom:15,
              center: new google.maps.LatLng(lat,lng),
              mapTypeId: google.maps.MapTypeId.ROADMAP,
              styles:style,
              scrollwheel: false,
              disableDefaultUI: true
              };

            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
             
                return map;
        }


        //on initialise dehors afin de remetre à zero apres
        var markerArray = [];
        var district = [];
        
         $.getJSON('include/javascript/district.json',function(data){
            console.log(data.features.length);

            for (var i = 0; i < data.features.length; i++) {
                var districtLatLng = [];
                for (var j = 0; j < data.features[i].geometry.coordinates[0].length; j++) {
                    
                    districtLatLng.push(new google.maps.LatLng(data.features[i].geometry.coordinates[0][j][1],data.features[i].geometry.coordinates[0][j][0]));
                   
                };
                  
            district[data.features[i].properties.Name] = new google.maps.Polygon({paths:districtLatLng, strokeColor: '#A8A8A8',strokeOpacity: 1.0,strokeWeight: 3,fillColor: '#A8A8A8',fillOpacity: 0.7});
                      
           
                //console.log(data.features[i].properties.Name);
            };
                    //console.log(district['District 1'].length);
                    //console.log(district['District 2']);
                    //console.log(district['District 3']);

                   
        });
        // A verifer apres
        function add_all_district(map){
            for (key in district){                
                    add_district(map,key);
                }
        }
        function remove_all_district(){
            for (key in district){                
                    remove_district(key);
                }
        }
        // Add one district
        function add_district(map,key){
            if(key in district)
                district[key].setMap(map);  
        }

        function remove_district(key){
            if(key in district)
                district[key].setMap(null);
        }






        function setAllMap(map) {
          for (var i = 0; i < markerArray.length; i++) {
                markerArray[i].setMap(map);
          }
        }

        function refreshMarker(map){
            setAllMap(null);
        var apartment = 'images/apartment-3.png';
        var house = 'images/house.png';
        var infowindow = null;
       
        
        $.get('./admin/php/script.GetDistrictMap.php',function(result){
                    add_all_district(map,'');
                for (var i = 0; i < result.length; i++) {
                    remove_district(result[i]);
                    console.log(result[i]+" Was removed");
                };
                if(result[0] == '')
                    remove_all_district();
            });
        

        $.get('admin/php/script.GetMarker.php',{action:'getAll'},function(e){
            locations =e ;
             var marker, i;
             var infoArray = new Array();
             var textArray = new Array();

            for (i = 0; i < locations.length; i++) {  
                        
                        textArray[i] = getWindowInfo(locations[i]['id'],locations[i]['price'],locations[i]['bath'],locations[i]['bed'],locations[i]['img']);
                        if(i == 0){
                                infoArray[locations[i].link]=textArray[i];
                                    total = locations[i].total;
                                // Fin du comptage du total
                                 var marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(locations[i]['lat'], locations[i]['lng']),
                                    map: map,
                                    icon:'images/icons/number_'+total+'.png',
                                  });
                                  markerArray.push(marker);
            
                                 marker.link = locations[i]['link'];
                                 google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                    return function() {
                                        if (infowindow) {
                                            infowindow.close();
                                        }
                                        //alert(marker.link);
                                        //console.log(infoArray[marker.link]);
                                      infowindow = new google.maps.InfoWindow({content: infoArray[marker.link] });
                                      infowindow.open(map, marker);
                                    }
                                  })(marker, i));

                                google.maps.event.addListener(map, 'click',function(){
                                    if(infowindow != null)
                                        infowindow.close();
                                });
                        }else{

                            if(locations[i].link == locations[i-1].link){
                               infoArray[locations[i].link]+=textArray[i];
                            }else{
                                    infoArray[locations[i].link]=textArray[i];
                                    total = locations[i].total;
                                // Fin du comptage du total
                                 var marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(locations[i]['lat'], locations[i]['lng']),
                                    map: map,
                                    icon:'images/icons/number_'+total+'.png',
                                  });
                                  markerArray.push(marker);
            
                                 marker.link = locations[i]['link'];
                                 google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                    return function() {
                                        if (infowindow) {
                                            infowindow.close();
                                        }
                                        //alert(marker.link);
                                        //console.log(infoArray[marker.link]);
                                      infowindow = new google.maps.InfoWindow({content: infoArray[marker.link] });
                                      infowindow.open(map, marker);
                                    }
                                  })(marker, i));

                                google.maps.event.addListener(map, 'click',function(){
                                    if(infowindow != null)
                                        infowindow.close();
                                });
                            }
                        }     

            }
            //console.log(infoArray);


    });
  

          
           
          
        
          
        
        }


            /*$('.link-viewmap').live("click",function(){

                
                data_essai="<div style=' width:100%; height:50px; background:green; zIndex:9999999999999999999; position:fixed; top:80px;'>Hlllo</div>";
                $('body').append(data_essai);
                alert('helllo');
                return false;
            });*/
        });
        </script>