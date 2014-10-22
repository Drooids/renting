            <form action="#" method="post" class="form_search">
             <div class="row form_switch">
                    <label class="label_title">Transaction:</label>
                    
                    <div class="switch">
                        <label for="switch1" class="cb-enable selected"><span>Sale</span></label>
                        <label for="switch2" class="cb-disable"><span>Rent</span></label>
                        <input type="radio" id="switch1" name="field" value='sale' checked>
                        <input type="radio" id="switch2" name="field" value='rent'>
                    </div>
                </div>                    
            	<div class="row rowInput tf-seek-select-form-item-slider">
                    <label class="label_title">Properties:</label>
                    <select class="select_styled" name="properties_id"  id="tf-seek-input-select-properties_id">
                        <option value=''>All </option>
                        <option value='appartment'>Appartment</option>
                        <option value='house'>House</option>
                        <option value='room'>Room</option>
                        <option value='office'>Office</option>
                        <option value='land'>Land</option>
                        
                    </select>
                </div>
               
                <div class="row rowInput tf-seek-select-form-item-slider">
                    <label class="label_title">District:</label>
                    <select class="select_styled" name="district_id"  id="tf-seek-input-select-location_id">
                        <option value='district 1'>District 1 </option>
                        <option value='district 2'>District 2</option>
                        <option value='district 3'>District 3</option>
                        <option value='district 4'>District 4</option>
                        <option value='district 5'>District 5</option>
                        <option value='district 6'>District 6</option>
                        <option value='district 7'>District 7</option>
                        <option value='district 8'>District 8</option>
                        <option value='district 9'>District 9</option>
                        <option value='district 10'>District 10</option>
                        <option value='district 11'>District 11</option>
                        <option value='district 12'>District 12</option>
                        <option value='go Vap district '>Go Vap District</option>
                        <option value='tan Binh district '>Tan Binh District</option>
                        <option value='tan Phu district '>Tan Phu District</option>
                        <option value='binh Thanh district '>Binh Thanh District</option>
                        <option value='phu Nhuan district '>Phu Nhuan District</option>
                        <option value='thu Duc district '>Thu Duc District</option>
                        <option value='bin Tan district '>Bin Tan District</option>
                    </select>
                </div>
                
                <div class="row selectField">
                	<label class="label_title">No of rooms:</label>
                    
                    	<select class="select_styled" name="search_no_beds" id="search_no_beds" title="Beds">
                        		<option value="0">Beds</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="other">5+</option>
                        </select>
                        
                        <select class="select_styled" name="search_no_baths" id="search_no_baths" title="Baths">
                        		<option value="0">Baths</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="other">5+</option>
                        </select>
                </div>
                
                 <div class="row rangeField salePrice">
                    <label class="label_title">Price Range:</label>
                    
                    <div class="range-slider">
                    <input id="price_range_sale" type="text" name="price_range" value="200000;750000">

                    </div>
                    
                    <div class="clear"></div>
                </div>
                <div class="row rangeField rentPrice" style='display:none;'>
                    <label class="label_title">Price Range:</label>
                    
                    <div class="range-slider">
                    <input id="price_range_rent" type="text" name="price_range" value="500;2000">
                    
                    </div>
                    
                    <div class="clear"></div>
                </div>
                
                <div class="row submitField">
                	<input type="submit" value="FIND PROPERTIES" id="search_submit" class="btn_search">
                </div>
                
            </form>
			<script >
						jQuery(document).ready(function($) {
							// Switch Type
							$(".cb-enable").click(function(){
								var parent = $(this).parents('.switch');
								$(parent).removeClass('switch_off');								
								$('.cb-disable',parent).removeClass('selected');
								$(this).addClass('selected');	
                                $('.salePrice').show();
                                $('.rentPrice').hide();	
                                $("#price_range_sale").slider({ 
                                        from: 0,
                                        to: 3000000,
                                        scale: [0, '|', '250k', '|', '500k', '|', '750k', '|', '1,25Mil', '|', '2Mil', '|', '>3Mil'],
                                        heterogeneity: ['50/750000','75/1500000'],
                                        limits: false, 
                                        step: 1000,
                                        smooth: true,
                                        dimension: '&nbsp;$',
                                        skin: "round_gold"
                                });         					
							});
							$(".cb-disable").click(function(){
								var parent = $(this).parents('.switch');
								$(parent).addClass('switch_off');
								$('.cb-enable',parent).removeClass('selected');
								$(this).addClass('selected');	
                                $('.salePrice').hide();
                                $('.rentPrice').show();	
                                $("#price_range_rent").slider({ 
                                        from: 0,
                                        to: 3000,
                                        scale: ['0','500','1000','1500','2000','2500','>3000'],
                                        heterogeneity: ['50/1500'],
                                        limits: false, 
                                        step: 100,
                                        smooth: true, 
                                        dimension: '&nbsp;$',                             
                                        skin: "round_gold"
                                }); 					
							});
							
							// Price Range Input
                     		
                        $("#price_range_sale").slider({ 
                                from: 0,
                                to: 3000000,
                                scale: [0, '|', '250k', '|', '500k', '|', '750k', '|', '1,25Mil', '|', '2Mil', '|', '>3Mil'],
                                heterogeneity: ['50/750000','75/1500000'],
                                limits: false, 
                                step: 1000,
                                smooth: true,
                                dimension: '&nbsp;$',
                                skin: "round_gold"
                        });   

                        $('input[name=field]:checked').change(function(){
                            //alert($('input[name=field]').val());
                        });

				});
            </script> 