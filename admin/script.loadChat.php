<?php session_start();
include('php/class.load.php');
include('php/class.message.php');

if(isset($_GET['user_id']))
	$user_id = $_GET['user_id'];
else
	$user_id ="";



$client_id = $_SESSION['client_id'];

function time_passed($timestamp){
    //type cast, current time, difference in timestamps
    $timestamp      = (int) $timestamp;
    $current_time   = time();
    $diff           = $current_time - $timestamp;
    
    //intervals in seconds
    $intervals      = array (
        'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute'=> 60
    );
    
    //now we just find the difference
    if ($diff == 0)
    {
        return 'just now';
    }    

    if ($diff < 60)
    {
        return $diff == 1 ? $diff . ' second ago' : $diff . ' seconds ago';
    }        

    if ($diff >= 60 && $diff < $intervals['hour'])
    {
        $diff = floor($diff/$intervals['minute']);
        return $diff == 1 ? $diff . ' minute ago' : $diff . ' minutes ago';
    }        

    if ($diff >= $intervals['hour'] && $diff < $intervals['day'])
    {
        $diff = floor($diff/$intervals['hour']);
        return $diff == 1 ? $diff . ' hour ago' : $diff . ' hours ago';
    }    

    if ($diff >= $intervals['day'] && $diff < $intervals['week'])
    {
        $diff = floor($diff/$intervals['day']);
        return $diff == 1 ? $diff . ' day ago' : $diff . ' days ago';
    }    

    if ($diff >= $intervals['week'] && $diff < $intervals['month'])
    {
        $diff = floor($diff/$intervals['week']);
        return $diff == 1 ? $diff . ' week ago' : $diff . ' weeks ago';
    }    

    if ($diff >= $intervals['month'] && $diff < $intervals['year'])
    {
        $diff = floor($diff/$intervals['month']);
        return $diff == 1 ? $diff . ' month ago' : $diff . ' months ago';
    }    

    if ($diff >= $intervals['year'])
    {
        $diff = floor($diff/$intervals['year']);
        return $diff == 1 ? $diff . ' year ago' : $diff . ' years ago';
    }
}
if($user_id == 0){
	$userInfo = "Home-Saigon Staff";
}else{
	$userInfo = new user($client_id);
	$userInfo = $userInfo->nom." ".$userInfo->prenom;
}


?>										
										<div class="panel-heading">
											<h4 class="panel-title pull-left">Messages with: <?php echo $userInfo; ?></h4>
											<div class="btn-group btn-group-sm pull-right">
												<!--<button class="btn btn-default" type="button" data-toggle="tooltip" data-container="body" data-title="New Chat"><span class="icon-comments"></span></button>
												<button class="btn btn-default" type="button" data-toggle="tooltip" data-container="body" data-title="Settings"><span class="icon-cog"></span></button>
												<button class="btn btn-default" type="button" data-toggle="tooltip" data-container="body" data-title="Close Chat"><span class="icon-remove"></span></button>
												-->
											</div>
										</div>
										<div class="chat_messages" id="chat_messages">
										<!-- Affichage des messages -->
										<!-- Chat right = Team -->
										<!-- Chat left = client -->
										<?php
											//Today date
	   										$date = date_create();
                        					$today = date_timestamp_get($date);

											
											if($user_id == 0){
												$reponse = $bdd->query("SELECT * FROM message WHERE (message_from = '$client_id' AND user = 'client' AND message_to ='0') OR (message_to = '$client_id' AND user = 'admin' AND message_from IN ( SELECT id FROM user WHERE right_user = '0')) ORDER BY date_creation");
	   										}else{
	   											$reponse = $bdd->query("SELECT * FROM message WHERE (message_from = '$client_id' AND user = 'client' AND message_to = '$user_id') OR (message_to = '$client_id' AND user = 'admin' AND message_from ='$user_id') ORDER BY date_creation");
	   											//echo "SELECT * FROM message WHERE (message_from = '$client_id' AND user = 'client' AND message_to = '$user') OR (message_to = '$client_id' AND user = 'admin' AND message_from ='$user') ORDER BY date_creation";
	   										}
	   										$reponse = $reponse->fetchAll();
	   									//	echo "request: "."SELECT * FROM message WHERE ('from' = '$client' AND user = 'client') OR ('to' = '$client' AND user = 'admin')";
	   									//	echo "number of data: ".count($reponse);

	   										foreach ($reponse as $key => $value) {
	   											$timestamp = strtotime($value['date_creation']);
	   											$body = "";
	   											$message = new message($value['id']);
	   											if($message->user == 'admin'){
	   												$user = new user($value['message_from']);
	   													$body.="<div class='chat_message ch_right' data-id='".$value['id']."'>";
	   													if($user->photo != "")
	   														$body.="<img alt='' src='".$user->photo."' class='img-thumbnail'>";
	   													else
	   														$body.="<img alt='' src='empty-profile.png' class='img-thumbnail'>";
	   											}else{
	   												$client = new client($value['message_from']);
	   													$body.="<div class='chat_message ' data-id='".$value['id']."'>";
	   													if($client->photo != "")
	   														$body.="<img alt='' src='".$client->photo."' class='img-thumbnail'>";
	   													else
	   														$body.="<img alt='' src='empty-profile.png' class='img-thumbnail'>";
	   											}

	   												$body.="<div class='chat_message_body'>";
	   											switch ($value['type']) {
	   												case 'text':
	   													$body.="<p>".$value['content']."</p>";
	   													break;
	   												case 'devis':
	   													$portfolio = new portfolio($value['link_id']);
														$link_portfolio = $portfolio->link_portfolio;
														$reponse2 = $bdd->query("SELECT id_gallery,nom_gallery,link_gallery,img_gallery
                                        										FROM gallery where id_gallery='$link_portfolio'");
                                        				$donnees = $reponse2->fetchAll();
                                      
                                            			$link_gallery = explode(",", $donnees[0]['link_gallery']);
                                            			$id=$link_gallery[0];
		                                                $reponse2 = $bdd->query("SELECT nom_fichier,id_fichier
		                                                                        FROM fichier
		                                                                        where id_fichier = '$id' ");

                                            
                                               			$donnees = $reponse2->fetchAll();
                                                		$nom_fichier=$donnees[0]['nom_fichier'];
                                                    	$id_fichier=$donnees[0]['id_fichier'];
														$body.="<div style=' width:100%;  height:156px; display:block;'>";
														$body.="<div style='float:left; border-style:solid; border-width:medium;'>";
														$body.="<img style='Z-index:100; width:200px; height:150px; max-width:400px; margin:0px 0px 0px 0px; float:left;' src='upload/uploads/".$value['link_id']."/".$nom_fichier."' >";
														$body.="</div>";
														$body.="<div style='float:left; height:150px; margin-left:5px; margin-top:5px; width:230px; overflow:hidden;'>";
														$body.=$value['content'];
														$body.="</br><a href='#' data-link='".$value['link_id']."' class='property'> See the property </a>";
														$body.="</div>";
														$body.="</div>";
	   													break;
	   												
	   												default:
	   													# code...
	   													break;
	   											}
	   												
	   											$date = date("d M Y ", strtotime($value['date_creation']));
	   											
	   											
	   												$body.="<p class='chat_message_date' data-date='".strtotime($value['date_creation'])."'>".$date." (".time_passed(strtotime($value['date_creation'])).")</p>";


	   												$body.="</div></div>";
	   											echo $body;
	   										}

										?>
										<!-- Fin affichage des messages -->
										</div>
										<div class="panel-footer">
											<div class="chat_submit">
												<div class="input-group">
													<input type="text" class="form-control input-lg" placeholder="Add a message...">
													<span class="input-group-btn">
														<button class="btn btn-primary btn-lg send" type="button" data-id='<?php echo $client_id; ?>'><span class="icon-comments"></span></button>
													</span>
												</div>
											</div>
										</div>
	<script type="text/javascript">
	jQuery(document).ready(function($){
			function HTMLentities(texte) {

						texte = texte.replace(/"/g,'&quot;'); // 34 22
						texte = texte.replace(/&/g,'&amp;'); // 38 26
						texte = texte.replace(/\'/g,'&#39;'); // 39 27
						texte = texte.replace(/</g,'&lt;'); // 60 3C
						texte = texte.replace(/>/g,'&gt;'); // 62 3E
						texte = texte.replace(/\^/g,'&circ;'); // 94 5E
						texte = texte.replace(/‘/g,'&lsquo;'); // 145 91
						texte = texte.replace(/’/g,'&rsquo;'); // 146 92
						texte = texte.replace(/“/g,'&ldquo;'); // 147 93
						texte = texte.replace(/”/g,'&rdquo;'); // 148 94
						texte = texte.replace(/•/g,'&bull;'); // 149 95
						texte = texte.replace(/–/g,'&ndash;'); // 150 96
						texte = texte.replace(/—/g,'&mdash;'); // 151 97
						texte = texte.replace(/˜/g,'&tilde;'); // 152 98
						texte = texte.replace(/™/g,'&trade;'); // 153 99
						texte = texte.replace(/š/g,'&scaron;'); // 154 9A
						texte = texte.replace(/›/g,'&rsaquo;'); // 155 9B
						texte = texte.replace(/œ/g,'&oelig;'); // 156 9C
						// texte = texte.replace(//g,'&#357;'); // 157 9D
						texte = texte.replace(/ž/g,'&#382;'); // 158 9E
						texte = texte.replace(/Ÿ/g,'&Yuml;'); // 159 9F
						// texte = texte.replace(/ /g,'&nbsp;'); // 160 A0
						texte = texte.replace(/¡/g,'&iexcl;'); // 161 A1
						texte = texte.replace(/¢/g,'&cent;'); // 162 A2
						texte = texte.replace(/£/g,'&pound;'); // 163 A3
						//texte = texte.replace(/ /g,'&curren;'); // 164 A4
						texte = texte.replace(/¥/g,'&yen;'); // 165 A5
						texte = texte.replace(/¦/g,'&brvbar;'); // 166 A6
						texte = texte.replace(/§/g,'&sect;'); // 167 A7
						texte = texte.replace(/¨/g,'&uml;'); // 168 A8
						texte = texte.replace(/©/g,'&copy;'); // 169 A9
						texte = texte.replace(/ª/g,'&ordf;'); // 170 AA
						texte = texte.replace(/«/g,'&laquo;'); // 171 AB
						texte = texte.replace(/¬/g,'&not;'); // 172 AC
						texte = texte.replace(/­/g,'&shy;'); // 173 AD
						texte = texte.replace(/®/g,'&reg;'); // 174 AE
						texte = texte.replace(/¯/g,'&macr;'); // 175 AF
						texte = texte.replace(/°/g,'&deg;'); // 176 B0
						texte = texte.replace(/±/g,'&plusmn;'); // 177 B1
						texte = texte.replace(/²/g,'&sup2;'); // 178 B2
						texte = texte.replace(/³/g,'&sup3;'); // 179 B3
						texte = texte.replace(/´/g,'&acute;'); // 180 B4
						texte = texte.replace(/µ/g,'&micro;'); // 181 B5
						texte = texte.replace(/¶/g,'&para'); // 182 B6
						texte = texte.replace(/·/g,'&middot;'); // 183 B7
						texte = texte.replace(/¸/g,'&cedil;'); // 184 B8
						texte = texte.replace(/¹/g,'&sup1;'); // 185 B9
						texte = texte.replace(/º/g,'&ordm;'); // 186 BA
						texte = texte.replace(/»/g,'&raquo;'); // 187 BB
						texte = texte.replace(/¼/g,'&frac14;'); // 188 BC
						texte = texte.replace(/½/g,'&frac12;'); // 189 BD
						texte = texte.replace(/¾/g,'&frac34;'); // 190 BE
						texte = texte.replace(/¿/g,'&iquest;'); // 191 BF
						texte = texte.replace(/À/g,'&Agrave;'); // 192 C0
						texte = texte.replace(/Á/g,'&Aacute;'); // 193 C1
						texte = texte.replace(/Â/g,'&Acirc;'); // 194 C2
						texte = texte.replace(/Ã/g,'&Atilde;'); // 195 C3
						texte = texte.replace(/Ä/g,'&Auml;'); // 196 C4
						texte = texte.replace(/Å/g,'&Aring;'); // 197 C5
						texte = texte.replace(/Æ/g,'&AElig;'); // 198 C6
						texte = texte.replace(/Ç/g,'&Ccedil;'); // 199 C7
						texte = texte.replace(/È/g,'&Egrave;'); // 200 C8
						texte = texte.replace(/É/g,'&Eacute;'); // 201 C9
						texte = texte.replace(/Ê/g,'&Ecirc;'); // 202 CA
						texte = texte.replace(/Ë/g,'&Euml;'); // 203 CB
						texte = texte.replace(/Ì/g,'&Igrave;'); // 204 CC
						texte = texte.replace(/Í/g,'&Iacute;'); // 205 CD
						texte = texte.replace(/Î/g,'&Icirc;'); // 206 CE
						texte = texte.replace(/Ï/g,'&Iuml;'); // 207 CF
						texte = texte.replace(/Ð/g,'&ETH;'); // 208 D0
						texte = texte.replace(/Ñ/g,'&Ntilde;'); // 209 D1
						texte = texte.replace(/Ò/g,'&Ograve;'); // 210 D2
						texte = texte.replace(/Ó/g,'&Oacute;'); // 211 D3
						texte = texte.replace(/Ô/g,'&Ocirc;'); // 212 D4
						texte = texte.replace(/Õ/g,'&Otilde;'); // 213 D5
						texte = texte.replace(/Ö/g,'&Ouml;'); // 214 D6
						texte = texte.replace(/×/g,'&times;'); // 215 D7
						texte = texte.replace(/Ø/g,'&Oslash;'); // 216 D8
						texte = texte.replace(/Ù/g,'&Ugrave;'); // 217 D9
						texte = texte.replace(/Ú/g,'&Uacute;'); // 218 DA
						texte = texte.replace(/Û/g,'&Ucirc;'); // 219 DB
						texte = texte.replace(/Ü/g,'&Uuml;'); // 220 DC
						texte = texte.replace(/Ý/g,'&Yacute;'); // 221 DD
						texte = texte.replace(/Þ/g,'&THORN;'); // 222 DE
						texte = texte.replace(/ß/g,'&szlig;'); // 223 DF
						texte = texte.replace(/à/g,'&aacute;'); // 224 E0
						texte = texte.replace(/á/g,'&aacute;'); // 225 E1
						texte = texte.replace(/â/g,'&acirc;'); // 226 E2
						texte = texte.replace(/ã/g,'&atilde;'); // 227 E3
						texte = texte.replace(/ä/g,'&auml;'); // 228 E4
						texte = texte.replace(/å/g,'&aring;'); // 229 E5
						texte = texte.replace(/æ/g,'&aelig;'); // 230 E6
						texte = texte.replace(/ç/g,'&ccedil;'); // 231 E7
						texte = texte.replace(/è/g,'&egrave;'); // 232 E8
						texte = texte.replace(/é/g,'&eacute;'); // 233 E9
						texte = texte.replace(/ê/g,'&ecirc;'); // 234 EA
						texte = texte.replace(/ë/g,'&euml;'); // 235 EB
						texte = texte.replace(/ì/g,'&igrave;'); // 236 EC
						texte = texte.replace(/í/g,'&iacute;'); // 237 ED
						texte = texte.replace(/î/g,'&icirc;'); // 238 EE
						texte = texte.replace(/ï/g,'&iuml;'); // 239 EF
						texte = texte.replace(/ð/g,'&eth;'); // 240 F0
						texte = texte.replace(/ñ/g,'&ntilde;'); // 241 F1
						texte = texte.replace(/ò/g,'&ograve;'); // 242 F2
						texte = texte.replace(/ó/g,'&oacute;'); // 243 F3
						texte = texte.replace(/ô/g,'&ocirc;'); // 244 F4
						texte = texte.replace(/õ/g,'&otilde;'); // 245 F5
						texte = texte.replace(/ö/g,'&ouml;'); // 246 F6
						texte = texte.replace(/÷/g,'&divide;'); // 247 F7
						texte = texte.replace(/ø/g,'&oslash;'); // 248 F8
						texte = texte.replace(/ù/g,'&ugrave;'); // 249 F9
						texte = texte.replace(/ú/g,'&uacute;'); // 250 FA
						texte = texte.replace(/û/g,'&ucirc;'); // 251 FB
						texte = texte.replace(/ü/g,'&uuml;'); // 252 FC
						texte = texte.replace(/ý/g,'&yacute;'); // 253 FD
						texte = texte.replace(/þ/g,'&thorn;'); // 254 FE
						texte = texte.replace(/ÿ/g,'&yuml;'); // 255 FF
						return texte;
					}
			function time_passe(timestamp){
					var current = Math.round(new Date().getTime() / 1000);
					var timestamp = timestamp;
					var diff = current-timestamp;
    				var intervals = new Array();
    					intervals['year'] = 31556926;
    					intervals['month'] = 2629744;
    					intervals['week'] = 604800;
    					intervals['day'] = 86400;
    					intervals['hour'] = 3600;
    					intervals['minute'] = 60;
 				if(diff == 0)
 					return 'Just now';
 				if(diff < 60)
 					return diff == 1 ? diff+' second ago' : diff+' seconds ago';
 			
			    if (diff >= 60 && diff < intervals['hour'])
			    {
			        diff = Math.floor(diff/intervals['minute']);
			        return diff == 1 ? diff+' minute ago' : diff+' minutes ago';
			    }        

			    if (diff >= intervals['hour'] && diff < intervals['day'])
			    {
			        diff = Math.floor(diff/intervals['hour']);
			        return diff == 1 ? diff+' hour ago' : diff+' hours ago';
			    }    

			    if (diff >= intervals['day'] && diff < intervals['week'])
			    {
			        diff = Math.floor(diff/intervals['day']);
			        return diff == 1 ? diff+' day ago' : diff+' days ago';
			    }    

			    if (diff >= intervals['week'] && diff < intervals['month'])
			    {
			        diff = Math.floor(diff/intervals['week']);
			        return diff == 1 ? diff+' week ago' : diff+' weeks ago';
			    }    

			    if (diff >= intervals['month'] && diff < intervals['year'])
			    {
			        diff = Math.floor(diff/intervals['month']);
			        return diff == 1 ? diff+' month ago' : diff+' months ago';
			    }    

			    if (diff >= intervals['year'])
			    {
			        diff = Math.floor(diff/intervals['year']);
			        return diff == 1 ? diff+' year ago' : diff+' years ago';
			    }
			}	

				function afficheMessage(id,from,to,content,date,timestamp,type,user,photo,link_id,link_photo){
					var text = "";
					if(user == 'admin')
						text +="<div class='chat_message ch_right' data-id='"+id+"'>";
					else
						text +="<div class='chat_message ' data-id='"+id+"'>";
						
						text +="<img alt='' src='"+photo+"' class='img-thumbnail'>";
						text +="<div class='chat_message_body'>";
					if(type == "text"){
						text +="<p>"+content+"</p>";
					}else if(type == "devis"){
						text +="<div style=' width:100%;  height:156px; display:block;'>";
						text +="<div style='float:left; border-style:solid; border-width:medium;'>";
						text +="<img style='Z-index:100; width:200px; height:150px; max-width:400px; margin:0px 0px 0px 0px; float:left;' src='upload/uploads/"+link_id+"/"+link_photo+"' >";
						text +="</div>";
						text +="<div style='float:left; height:150px; margin-left:5px; margin-top:5px; width:230px; overflow:hidden;'>";
						text +=content;
						text +="</br><a href='#' data-link='"+link_id+"' class='property'> See the property </a>";
						text +="</div>";
						text +="</div>";
					}
						text +="<p class='chat_message_date' data-date='"+timestamp+"''>"+date+" ("+time_passe(timestamp)+")</p>";
						text +="</div>";
						text +="</div>";
						return text;
				}
				function refreshDate(){
				    //alert('hello');
				    $('.chat_message_date').each(function(e){
				    	var date = $(this).data('date');
				    	var text = $(this).text();
				    	text = text.split('(');
				    	//alert($(this).text());

				    	$(this).html(time_passe(date));
				    });
				    setTimeout(refreshDate, 10000);
				};
				function refreshMessage(){
					var user_id = $('.send').data('id');
					$.post('php/admin.messageGet.php',{user_id:user_id},function(result){
						for (var i = 0; i < result.length; i++) {
							$('.chat_messages').append(afficheMessage(result[0].id,result[0].message_from,result[0].message_to,result[0].content,result[0].date,result[0].message_timestamp,result[0].type,result[0].user,result[0].photo,result[0].link_id,result[0].link_photo));
						};
						
						if(result.length != 0){
							
							var objDiv = document.getElementById("chat_messages");
								objDiv.scrollTop = objDiv.scrollHeight;
						}
						
						
						setTimeout(refreshMessage, 2000);
					});
				}
				// on lance les functions
				refreshDate();
				refreshMessage();
				var objDiv = document.getElementById("chat_messages");
					objDiv.scrollTop = objDiv.scrollHeight;

				$('.send').on('click',function(){
			 		var message = $('.input-lg').val();
			 		var user_id = $(this).data('id');
			 		var client_id = "<?php echo $user_id; ?>";
			 		message = HTMLentities(message);
			 		$.post('php/script.sendMessage.php?action=ClientToUser',{user:'client',message_from:client_id,message_to:user_id,type:'text',content:message},function(result){
			 			 $('.input-lg').val('');
			 			$('.chat_messages').append(afficheMessage(result[0].id,result[0].message_from,result[0].message_to,result[0].content,result[0].date,result[0].message_timestamp,result[0].type,result[0].user,result[0].photo,result[0].link_id,result[0].link_photo));			
			 			if(result.length != 0){
									
									var objDiv = document.getElementById("chat_messages");
										objDiv.scrollTop = objDiv.scrollHeight;
								}
						
			 		});
			 	});
			 	$(".input-lg").keypress(function(event) {
				    if (event.which == 13) {
				        event.preventDefault();
				        var message = $('.input-lg').val();
				 		var user_id = $(this).data('id');
				 		var client_id = "<?php echo $user_id; ?>";
				 		message = HTMLentities(message);
				 		$.post('php/script.sendMessage.php?action=ClientToUser',{user:'client',message_from:client_id,message_to:user_id,type:'text',content:message},function(result){
				 			 $('.input-lg').val('');
				 			$('.chat_messages').append(afficheMessage(result[0].id,result[0].message_from,result[0].message_to,result[0].content,result[0].date,result[0].message_timestamp,result[0].type,result[0].user,result[0].photo,result[0].link_id,result[0].link_photo));			
				 			if(result.length != 0){
										
										var objDiv = document.getElementById("chat_messages");
											objDiv.scrollTop = objDiv.scrollHeight;
									}
							
				 		});
				    }
				});
				$('.chat_messages').on('click','.property',function(e){
					e.preventDefault();
					var id = $(this).data('link');
					parent.window.location = "../properties-details.php?id="+id;
				});

	});
	</script>





