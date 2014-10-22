
    <div class="grid_4 sidebar " >
    	
        <!-- filter -->
        <div class="widget-container widget_adv_filter fixedMenu" style='display:none'>
			<h3 class="widget-title">FILTER THE RESULTS</h3>
				
            	<form action="#" method="get" class="form_white">
                    <div class="row input_styled inlinelist serviceData">
                        <label class="label_title">Service:</label><br>
                        <?php if($filter->service == 'rent'){ ?>
                        <input type="radio" name="service" value="rent" id="ct_rent" checked> <label for="ct_rent">Rent</label>
                        <input type="radio" name="service" value="sale" id="ct_sale"> <label for="ct_sale">Sale</label>
                        <?php }elseif($filter->service == 'sale') {?>
                        <input type="radio" name="service" value="rent" id="ct_rent" > <label for="ct_rent">Rent</label>
                        <input type="radio" name="service" value="sale" id="ct_sale" checked> <label for="ct_sale">Sale</label>
                        <?php }else{ ?>
                        <input type="radio" name="service" value="rent" id="ct_rent" checked> <label for="ct_rent">Rent</label>
                        <input type="radio" name="service" value="sale" id="ct_sale" > <label for="ct_sale">Sale</label>
                        <?php } ?>
                        
                        <!--<input type="radio" name="pool" value="2" id="ct_both" checked> <label for="ct_both">I don't care</label>-->
                    </div>
                    <?php if($filter->service == 'rent' || $filter->service == 'service_appartment'){?>
                         <div class='hide_rent' >
                    <?php }else{ ?>
                         <div class='hide_rent' style='display:none;'>
                    <?php } ?>
                   <!-- Ne pas oublier de rajouter ceci -->
                        <div class="row input_styled inlinelist  furnishedData" >
                            <label class="label_title">Furnished:</label><br>
                            <input type="radio" name="Furnished" value="1" id="ct_furn_yes" <?php if($filter->furnished == 1) echo "checked" ; ?>> <label for="ct_furn_yes">Yes</label>
                            <input type="radio" name="Furnished" value="0" id="ct_furn_no" <?php if($filter->furnished == 0) echo "checked" ; ?>> <label for="ct_furn_no">no</label>
                           <input type="radio" name="Furnished" value="-1" id="ct_furn_dontcare" <?php if($filter->furnished == '') echo "checked" ; ?>> <label for="ct_furn_dontcare">I don't care</label>
                        </div>
                        <div class="row input_styled inlinelist  petData">
                            <label class="label_title">Allow Pets:</label><br>
                            <input type="radio" name="pets" value="1" id="ct_pets_yes" <?php if($filter->pets == 1) echo "checked" ; ?>> <label for="ct_pets_yes">Yes</label>
                            <input type="radio" name="pets" value="0" id="ct_pets_no" <?php if($filter->pets == 0) echo "checked" ; ?>> <label for="ct_pets_no">no</label>
                            <input type="radio" name="pets" value="-1" id="ct_pets_dontcare" <?php if($filter->pets == "") echo "checked" ; ?>> <label for="ct_pets_dontcare">I don't care</label>
                        </div>
                    <!-- Ne pas oublier de rajouter ceci -->
                    </div>
                	<div class="row cityData">
                    	<label class="label_title">Location:</label>
                        <input type="text" name="location" value="Ho Chi Minh City" class="inputField" readonly>
                    </div>
                    <div class="row propertieData">
                        <label class="label_title">Properties:</label>
                        <select class="select_styled white_select" name="properties" id="properties" style='width:145px;'>

                                <option value="all" <?php if($filter->properties === '') echo "selected" ; ?>>All</option>
                                <option value="house" <?php if($filter->properties === 'house') echo "selected" ; ?>>House</option>
                                <option value="appartment" <?php if($filter->properties === 'appartment') echo "selected" ; ?>>Appartment</option>            
                                <option value="office" <?php if($filter->properties === 'office') echo "selected" ; ?>>Office</option>
                                <option value="land" <?php if($filter->properties === 'land') echo "selected" ; ?>>Land</option>
                                <option value="room" <?php if($filter->properties === 'room') echo "selected" ; ?>>Room</option>
                            </select>
                    </div>
                    <div class="row availableData">
                        <label class="label_title">Available:</label>
                        <select class="select_styled white_select" name="available" id="available" style='width:145px;'>
                                <?php
                                    $month_minus0 = mktime(date("H"), date("i"), date("s"), date("m")+1, date("d"), date("Y"));
                                    $month_minus1 = mktime(date("H"), date("i"), date("s"), date("m")+2, date("d"), date("Y"));
                                    $month_minus2 = mktime(date("H"), date("i"), date("s"), date("m")+3, date("d"), date("Y"));
                                    $month_minus3 = mktime(date("H"), date("i"), date("s"), date("m")+4, date("d"), date("Y"));
                                    $month_minus4 = mktime(date("H"), date("i"), date("s"), date("m")+5, date("d"), date("Y"));
                                    $month_minus5 = mktime(date("H"), date("i"), date("s"), date("m")+6, date("d"), date("Y"));
                                    $month_minus6 = mktime(date("H"), date("i"), date("s"), date("m")+7, date("d"), date("Y"));
                            ?>
                        <option value='all'>I don't care</option>
                        <option value='<?php echo date("F Y", $month_minus0); ?>'>This Month</option>
                        <option value='<?php echo date("F Y", $month_minus1 ); ?>'><?php echo date("F Y", $month_minus0 ); ?></option>
                        <option value='<?php echo date("F Y", $month_minus2 ); ?>'><?php echo date("F Y", $month_minus1 ); ?></option>
                        <option value='<?php echo date("F Y", $month_minus3 ); ?>'><?php echo date("F Y", $month_minus2 ); ?></option>
                        <option value='<?php echo date("F Y", $month_minus4 ); ?>'><?php echo date("F Y", $month_minus3 ); ?></option>
                        <option value='<?php echo date("F Y", $month_minus5 ); ?>'><?php echo date("F Y", $month_minus4 ); ?></option>
                        <option value='<?php echo date("F Y", $month_minus6 ); ?>'>After <?php echo date("F Y", $month_minus5 ); ?></option>
                                
                            </select>
                    </div>
                    
                    <div class="row input_styled priceData">
                    	<label class="label_title">Price ($):</label>
                        <input type="text" name="price_from" id="price_from" value="<?php if($filter->price_min != ''){echo $filter->price_min;}else{echo 'min';} ?>" class="inputField inputSmall"  onFocus="if (this.value == 'min') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'min';}"> &nbsp;&nbsp;&nbsp;
                        
                        <input type="text" name="price_to" id="price_to" value="<?php if($filter->price_max != ''){echo $filter->price_max;}else{echo 'max';} ?>" class="inputField inputSmall"  onFocus="if (this.value == 'max') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'max';}">
                    </div>
                    <div class="row input_styled squareData">
                        <label class="label_title">Square (m²):</label>
                        <input type="text" name="square_from" id="square_from" value="min" class="inputField inputSmall" o onFocus="if (this.value == 'min') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'min';}"> &nbsp;&nbsp;&nbsp;
                        
                        <input type="text" name="square_to" id="square_to" value="max" class="inputField inputSmall"  onFocus="if (this.value == 'max') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'max';}">
                    </div>
                    
                    <div class="row input_styled checklist bed_affiche">
                    	<label class="label_title">Bedrooms:</label>

                        
                        <?php
                               
                                    
                                    //echo $bed_filter;
                                    $bed_1 =0;
                                    $bed_2 =0;
                                    $bed_3 =0;
                                    $bed_4 =0;
                                    $bed_5 =0;
                                    $reponse = $bdd->query($filter->request());
                                    $donnees = $reponse->fetchAll();
                                    foreach ($donnees as $key => $value) {
                                        switch ($value['bed_portfolio']) {
                                            case '1':
                                                $bed_1++;
                                                break;
                                            case '2':
                                                $bed_2++;
                                                break;
                                            case '3':
                                                $bed_3++;
                                                break;
                                            case '4':
                                                $bed_4++;
                                                break;
                                            case '5':
                                                $bed_5++;
                                                break;
                                            
                                            default:
                                                # code...
                                                break;
                                        }
                                       
                                    }

                                     echo"<input type='checkbox' name='filter_beds_1' id='filter_beds_1' class='filter_bed' value='1' checked> <label for='filter_beds_1' id='label_beds_1' class='checked'>1 (".$bed_1." offers) </label>";
                                     echo"<input type='checkbox' name='filter_beds_2' id='filter_beds_2' class='filter_bed' value='2' checked> <label for='filter_beds_2' id='label_beds_2' class='checked'>2 (".$bed_2." offers) </label>";
                                     echo"<input type='checkbox' name='filter_beds_3' id='filter_beds_3' class='filter_bed' value='3' checked> <label for='filter_beds_3' id='label_beds_3' class='checked'>3 (".$bed_3." offers) </label>";
                                     echo"<input type='checkbox' name='filter_beds_4' id='filter_beds_4' class='filter_bed' value='4' checked> <label for='filter_beds_4' id='label_beds_4' class='checked'>4 (".$bed_4." offers) </label>";
                                     echo"<input type='checkbox' name='filter_beds_5' id='filter_beds_5' class='filter_bed' value='5' checked> <label for='filter_beds_5' id='label_beds_5' class='checked'>5 (".$bed_5." offers) </label>";


                                   /*
                                        if($filter->bed == $k && $k !=5)
                                        echo"<input type='checkbox' name='filter_beds_".$k."' id='filter_beds_".$k."' class='filter_bed' value='".$k."' checked> <label for='filter_beds_".$k."' id='label_beds_".$k."' class='checked'>".$k." (".$bed." offers) </label>";
                                    elseif($filter->bed == $k && $k ==5)
                                        echo"<input type='checkbox' name='filter_beds_".$k."' id='filter_beds_".$k."' class='filter_bed' value='".$k."' checked> <label for='filter_beds_".$k."' id='label_beds_".$k."' class='checked'>".$k."+ (".$bed." offers) </label>";
                                    elseif($k ==5 && $filter->bed != $k)
                                        echo"<input type='checkbox' name='filter_beds_".$k."' id='filter_beds_".$k."' class='filter_bed' value='".$k."'> <label for='filter_beds_".$k."' id='label_beds_".$k."'>".$k."+ (".$bed." offers) </label>";
                                    else
                                        echo"<input type='checkbox' name='filter_beds_".$k."' id='filter_beds_".$k."' class='filter_bed' value='".$k."'> <label for='filter_beds_".$k."' id='label_beds_".$k."'>".$k." (".$bed." offers) </label>";
                                     */
                                
                        ?>
                      
                    </div>

                    <div class="row input_styled checklist bath_affiche">
                        <label class="label_title">Bathrooms:</label>
                        <?php
                                       //echo $bed_filter;
                                    $bath_1 =0;
                                    $bath_2 =0;
                                    $bath_3 =0;
                                    $bath_4 =0;
                                    $bath_5 =0;
                                    $reponse = $bdd->query($filter->request());
                                    $donnees = $reponse->fetchAll();
                                    foreach ($donnees as $key => $value) {
                                        switch ($value['bath_portfolio']) {
                                            case '1':
                                                $bath_1++;
                                                break;
                                            case '2':
                                                $bath_2++;
                                                break;
                                            case '3':
                                                $bath_3++;
                                                break;
                                            case '4':
                                                $bath_4++;
                                                break;
                                            case '5':
                                                $bath_5++;
                                                break;
                                            
                                            default:
                                                # code...
                                                break;
                                        }
                                       
                                    }

                                     echo"<input type='checkbox' name='filter_baths_1' id='filter_baths_1' class='filter_bath' value='1' checked> <label for='filter_baths_1' id='label_baths_1' class='checked'>1 (".$bath_1." offers) </label>";
                                     echo"<input type='checkbox' name='filter_baths_2' id='filter_baths_2' class='filter_bath' value='2' checked> <label for='filter_baths_2' id='label_baths_2' class='checked'>2 (".$bath_2." offers) </label>";
                                     echo"<input type='checkbox' name='filter_baths_3' id='filter_baths_3' class='filter_bath' value='3' checked> <label for='filter_baths_3' id='label_baths_3' class='checked'>3 (".$bath_3." offers) </label>";
                                     echo"<input type='checkbox' name='filter_baths_4' id='filter_baths_4' class='filter_bath' value='4' checked> <label for='filter_baths_4' id='label_baths_4' class='checked'>4 (".$bath_4." offers) </label>";
                                     echo"<input type='checkbox' name='filter_baths_5' id='filter_baths_5' class='filter_bath' value='5' checked> <label for='filter_baths_5' id='label_baths_5' class='checked'>5 (".$bath_5." offers) </label>";


                        ?>
                          </div>

                   <div class="row input_styled inlinelist swimmingData">
                        <label class="label_title">Swimming pool:</label><br>
                        <input type="radio" name="pool" value="1" id="ct_yes" > <label for="ct_yes">Yes</label>
                        <input type="radio" name="pool" value="0" id="ct_no"> <label for="ct_no">No</label>
                        <input type="radio" name="pool" value="2" id="ct_both" checked> <label for="ct_both">I don't care</label>
                    </div>
                    
                    <!--<div class="row input_styled checklist">
                    	<label class="label_title">Square Ft:</label>
                        <input type="checkbox" name="filter_square_1" id="filter_square_1" value="1000"> <label for="filter_square_1">1000 (85 offers)</label>
                        <input type="checkbox" name="filter_square_2" id="filter_square_2" value="1500"> <label for="filter_square_2">1500 (19 offers)</label>
                        <input type="checkbox" name="filter_square_3" id="filter_square_3" value="2000"> <label for="filter_square_3">2000 (36 offers)</label>
                        <input type="checkbox" name="filter_square_4" id="filter_square_4" value="2500"> <label for="filter_square_4">2500+ (12 offers)</label>
                    </div>-->
                   
                    <div class="row inputlist">
                         <?php if($filter->district != '') { ?>
                        <div class="custom-input addField_remove">
                        <input class="autocomplete ui-autocomplete-input" type="text" value="<?php echo $filter->district; ?>" name="<?php echo $filter->district; ?>" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
                        <span id="rem_district_3" class="rem_district"></span>
                        </div>                    
                    <?php } ?>
                    	<label class="label_title">District:</label>
                       <div class="custom-input addField_add"><input class='autocomplete' type="text" name="district_4" class="addField" value="Add NEW Zone" onFocus="if (this.value == 'Add NEW Zone') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Add NEW Zone';}"><span id="add_district_4" class='add_district'></span></div>                                                
                    </div>
                    
                    <div class="row rowSubmit">
                    	<input type="submit" value="FILTER RESULTS" class="btn-submit confirm">
                    </div>
                    
                </form>            
		</div>
    </div>
        
       
        