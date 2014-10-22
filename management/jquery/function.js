				
				
			

				function htmlEncode(value){
				    if (value) {
				    	value = value.replace(/\'/g,'&apos;');
						value = value.replace(/\"/g,'&quot;')
				        return jQuery('<div />').text(value).html();
				    } else {
				        return '';
				    }
				}
				 
				function htmlDecode(value) {
				    if (value) {
				        return $('<div />').html(value).text();
				    } else {
				        return '';
				    }
				}

				function refreshBadgeDevis(){

				$.get("php/GetDevis.php",
					   function(data){
					     	$('#badge').html( "" + data.number ) // John
					     			.attr('title', 'Vous avez '+ data.number + ' nouveaux devis');
						   }, "json");
				}


				// Affichage du profil de l'utilisateur
				function afficheProfil(pseudo){
					$.get("php/GetProfil.php",{ username:pseudo},
					   function(data){
					   //	alert(data);
					   	var str = "<img  alt='Prenom et Nom' src='"+ data[0].photo + "'>";
					   	$('#nickname-pict').html(str)
					     $("#nickname").html(data[0].nom +' '+data[0].prenom);
					     $("#job").html(data[0].job);
					   }, "json");

				}

				function refreshDevis(key){
					$.get("php/GetDevisAfficheAll.php",{key:key},
					   function(data){
					   	
					   	/*alert(data[0].devis_id);
					   	alert(data[0].date);
					   	alert(data[0].devis_sujet);
					   	alert(data[0].devis_email);
					   	alert(data[0].devis_text);*/
					   	 var str=0;
					   

					    for (var i=0;i<data.length;i++){
					     	//alert(data[i].devis_new);
					     	if(data[i].devis_new==1){
					     	str +="<tr id='"+data[i].devis_id+"' style='background:#3a87ad;'><td>"+data[i].devis_id+"</td><td>"+data[i].date+"</td><td>"+data[i].devis_sujet+"</td><td>"+data[i].devis_email+"</td><td>"+data[i].devis_text+"</td><td><div class='btn-group' ><button class='btn dropdown-toggle' data-toggle='dropdown'>Action <span class='caret'></span></button><ul class='dropdown-menu'><li><a class='a' href='#'>Delete</a></li><li><a class='b' href='#'>Lu</a></li><li><a class='c' href='#'>Non Lu</a></li><li class='divider'></li><li><a href='#'>..</a></li></ul></div></tr>";
					    	}else{
					    		str +="<tr id='"+data[i].devis_id+"'><td>"+data[i].devis_id+"</td><td>"+data[i].date+"</td><td>"+data[i].devis_sujet+"</td><td>"+data[i].devis_email+"</td><td>"+data[i].devis_text+"</td><td><div class='btn-group' ><button class='btn dropdown-toggle' data-toggle='dropdown'>Action <span class='caret'></span></button><ul class='dropdown-menu'><li><a class='a' href='#'>Delete</a></li><li><a class='b' href='#'>Lu</a></li><li><a class='c' href='#'>Non Lu</a></li><li class='divider'></li><li><a href='#'>..</a></li></ul></div></tr>";
					    	}
					    	 
					     }
					     id=data.length;
					     $("#devis_affichage_all").html(str);
					   }, "json");

				}

				function DeleteImg(nom_fichier){
					$.get("upload/delete.php",{ nom_fichier:nom_fichier},
					   function(data){
					   	afficheBiblio();
					   	
					   }, "json");

				}
				

				function afficheBiblio(){
					$.get("php/GetBiblio.php",
					   function(data){
					   	var str='';

					   	var fin = data.length-1;
					   	//alert(fin);
					   	for (var i=0;i<data.length;i++){
					   		var start =1+i;
					   		if(i==0 ){
					   			str+="<ul class='thumbnails'>";
					   		}

					   			str+="<li class='span3'>";
					   			str+="<input id='"+data[i].id_fichier +"' type='checkbox' value='"+data[i].nom_fichier+"'>";
					   			str+="<ul class='thumbnail-actions'>";
								str+="<li><a href='#' title='Edit photo'><span class='icon-pencil'></span></a></li>";
								str+="<li><a href='upload/download.php?filename="+data[i].nom_fichier+"' title='Download photo'><span class='icon-download'></span></a></li>";
								str+="<li><a class='delete' href='"+data[i].nom_fichier+"'  title='Delete photo'><span class='icon-trash'></span></a></li>";
								str+="</ul>";
								str+="<a class='thumbnail' href='#'><img alt='Image 34' src='"+data[i].adresse_fichier+"/"+data[i].nom_fichier+"'></a>";
								str+="</li>";

							if(start % 4 == 0 && i != fin){
					   				str+="</ul>";
					   				str+="<ul class='thumbnails'>";
					   		}
							if(i == fin){
						   			str+="</ul>";
						   			//str+="<div class='form-actions'>";
									//str+="<button class='btn btn-alt btn-primary deleteCheck' type='submit'>Delete items</button>";
									//str+="</div>";
						   			
						   			}
					   		}
					   		$("#biblio").html(str);
					   }, "json");

				}
				
				

				function afficheGallery(key){
					$.get("php/GetGallery.php",{key:key},
					   function(data){
					   	var str='';
					   //	alert(data[0].id_gallery);

					   	var fin = data.length-1;
					   	//alert(fin);
					   	for (var i=0;i<data.length;i++){
					   		var start =1+i;
					   		if(i==0 ){
					   							str+="<a class='btn btn-alt btn-primary' data-toggle='modal' href='#CreationModal' style='margin-left:30px;margin-bottom:30px;'>Creer une nouvelle gallery</a>";
												str+="<div class='modal fade hide modal-info' id='CreationModal' style='width:300px; display:box;'>";
												str+="<div class='modal-header'>";
												str+="<button type='button' class='close' data-dismiss='modal'>×</button>";
												str+="<h3>Nouvelle Gallery</h3>";
												str+="</div>";
												str+="<div class='modal-body'>";
												str+="<p>Attention a bien choisir le nom</p>";
												str+="<input id='nomNew' class='input-large' style='height:30px;' type='text' value='Nom'>";
												str+="</div>";
												str+="<div class='modal-footer'>";
												str+="<a href='#' class='btn btn-alt' data-dismiss='modal'>Close</a>";
												str+="<a href='#' id ='createNew'class='btn btn-alt' data-dismiss='modal'>Save changes</a>";
												str+="</div>";
												str+="</div>";
												str+="<div  class='row-fluid' style='margin-top:50px;'>";

					   			
					   		}


					   			
							//str+="</ul>";
							if(i % 3 == 0 && i!=0){
					   				str+="</div>";
					   				str+="<div  class='row-fluid'>";
					   		}

str+="<article class='span4 data-block nested arti' >";
	str+="<div class='data-container'>";
		str+="<header>";
			str+="<h2>"+data[i].nom_gallery+"</h2>";
			str+="<ul class='data-header-actions'>";
			str+="<li><a href='galleryAffiche.php?gallery="+data[i].id_gallery+"' class='btn btn-alt btn-primary afficher' id='"+data[i].id_gallery+"'>Afficher</a></li>";
			str+="</ul>";
		str+="</header>";
		str+="<section>";
			str+="<ul class='thumbnails'  >";
			str+="<li>";
			str+="<ul class='thumbnail-actions' >";
										  
			str+="</li>";
			str+="<li><a href='upload/download.php?filename="+data[i].img_gallery+"' title='Download'><span class='icon-download'></span></a></li>";
			str+="</ul>";
			str+="<div class='thumbnail img2' ><img id='img-"+data[i].id_gallery+"' src='http://localhost/renting/management/upload/timthumb.php?src=http://localhost/renting/management/upload/uploads/"+data[i].img_gallery+"&w=218&h=125' alt='Sample Image'></div>";
			str+="</li>";
			str+="</ul>";
			str+="<p>Description: Pellentesque aliquet iaculis velit sit amet vestibulum.</p>";
			str+="<button type='button' data-click='"+ data[i].id_gallery +"' class='close delete'>×</button>";
		str+="</section>";
	str+="</div>";
	str+="<input id='id-"+data[i].id_gallery+"' type='hidden' value='"+data[i].id_gallery+"' name='id' />";
	str+="<input id='nom-"+data[i].id_gallery+"' type='hidden' value='"+data[i].nom_gallery+"' name='id' />";
str+="</article>";

												
							if(i == fin){
						   			str+="</div>";
						   					
						   			}
					   		}
					   		$("#biblio").html(str);
					   		var width = $(".arti").width();
						    var width2 = $(".img2").width();
						    
								//alert(width);
								//alert(width2);
								if(40+width2 > width){
									$(".img2").css("width",width-80);
								}
					   		setTimeout(
						  function() 
						  {
						    //do something special
						    
						    afficheSelectionPhoto();
						    $(window).resize(function() {
					if($(window).width() > $(window).height()){
							var width = $(".arti").width();
						    var width2 = $(".img2").width();
						    
								//alert(width);
								//alert(width2);
								if(width2 > width){
									$(".img2").css("width",width-80);
								}
					}
				   			
				});
						    //alert("salut");
						    //alert("salut c'est moi");
						  }, 2000);
					   		  });
				
				}


				function AffichProductPortfolio(key,select){
				$.get("php/GetPortfolio.php",{key:key,select:select},
					   function(data){
					   	var str='';
					   	var fin = data.length-1;
					   	//alert(fin);
					   	for (var i=0;i<data.length;i++){
					   		var start =1+i;
									   		

							
										str+="<article class='span4 data-block nested arti'>";
										str+="<div class='data-container'>";
										str+="<header>";
										//str+="<h2>"+data[i].nom_portfolio +"</h2>";
										str+="<div class='control-group success'>";
										str+="<div class='form-controls' style='overflow:hidden;'>";
										str+="<h3 >"+data[i].nom_portfolio+"</h5>";
										
										str+="<a  style='float:left' href='portfolio-modif.php?id="+ data[i].id_portfolio +"' data-click='"+ data[i].id_portfolio +"' class='btn btn-alt btn-primary modifier' >Modify</a>";
										str+="<a href='#' style='float:left; margin-left:10px;' data-click='"+ data[i].id_portfolio +"' class='btn btn-alt btn-primary delete  btn-danger' >Delete</a>";

										str+="<ul class='data-header-actions'>";									
										str+="</div>";
										str+="</div>";
										str+="</header>";


									str+="<section>";
										str+="<ul class='thumbnails'>";
											str+="<li>";
												str+="<ul class='thumbnail-actions'>";
													str+="<li><a href='choose-image.php?id="+data[i].id_portfolio+"&type=portfolio'  title='Edit'><span class='icon-pencil'></span></a>";								  
													str+="</li>";
													str+="<li><a href='upload/download.php?filename="+data[i].img_portfolio+"' title='Download'><span class='icon-download'></span></a></li>";
										//str+="<li><a class='delete' href='upload/uploads"+data[i].img_portfolio+"' title='Delete'><span class='icon-trash'></span></a></li>";
												str+="</ul>";
												str+="<div class='thumbnail'><img class='img img2' id='img-"+data[i].id_portfolio+"' src='upload/uploads/"+data[i].img_portfolio+"' alt='Sample Image' width='446' height ='281'></div>";
											str+="</li>";
										str+="</ul>";
										str+="<h3>Size of the picture:</h3>";
										str+="<p> 446 x 281 or a multiple</p>"
										str+="<h3>Price:</h3>";
										str+="<p>"+data[i].price_portfolio+"</p>";
										str+="<h3>Adress:</h3>";
										str+="<p>"+data[i].full_adress+"</p>";
									//str+="</div>";
									str+="</section>";
										str+="</div>";
										str+="</article>";
							
					   		
							if(start % 3 == 0 && i != fin){
					   				str+="</div>";
					   				str+="<div  class='row-fluid'>";
					   		}
					   		if(i == fin){
						   			str+="</div>";
						   			}
					   	}
					   
					   $("#portfolio-product").html(str);
					   	
					   	 	var width = $(".arti").width();
						    var width2 = $(".img2").width();
						    
								//alert(width);
								//alert(width2);
								if(40+width2 > width){
									$(".img2").css("width",width-80);
								}
							

					   });
				
				}
			

			function afficheSelectionPhoto(){
					$.get("php/GetSelectionPhoto.php",{},
					   function(data){
					   	var str='';
					   	var fin = data.length-1;
					   	//alert("salut le monde");
					   	for (var i=0;i<data.length;i++){
					   		var start =1+i;
					   		if(i==0 ){
					   			str+="<ul class='thumbnails'>";
					   		}
					   			str+="<li class='span3'>";
					   			//str+="<input id='"+data[i].id_fichier +"' type='checkbox' value='option'>";
					   			//str+="<ul class='thumbnail-actions'>";
								//str+="<li><a href='#' title='Edit photo'><span class='icon-pencil'></span></a></li>";
								//str+="<li><a href='upload/download.php?filename="+data[i].nom_fichier+"' title='Download photo'><span class='icon-download'></span></a></li>";
								//str+="<li><a class='delete' href='"+data[i].nom_fichier+"'  title='Delete photo'><span class='icon-trash'></span></a></li>";
								//str+="</ul>";
								str+="<a class='thumbnail' href='#'><img alt='Image 34' src='"+data[i].adresse_fichier+"/"+data[i].nom_fichier+"'></a>";
								str+="</li>";
							if(start % 4 == 0 && i != fin){
					   				str+="</ul>";
					   				str+="<ul class='thumbnails'>";
					   		}
							if(i == fin){
						   			str+="</ul>";						   			
						   			}
					   		}
					   		$(".affiche-gallery").html(str);
					   		

					   }, "json");

					

				}


				function SetPortfolio(id,available,available_date,pets,furnished,nom,text,type,img,link,actif,pool,parking,bed,bath,price,adress,city,district,service,user_id,gps,detail,autre,redirect){
					$.post("php/SetPortfolio.php",{id:id,available:available,available_date:available_date,pets:pets,furnished:furnished,nom:nom,text:text,type:type,img:img,link:link,actif:actif,pool:pool,parking:parking,bed:bed,bath:bath,price:price,adress:adress,city:city,district:district,service:service,user_id:user_id,gps:gps,detail:detail,autre:autre},
						 function() {
						 	if(redirect != null)
        						window.location.replace(redirect);
   					 });
			
				}

				function SetGallery(id,nom,img,link,autre,redirect){
					$.post("php/SetGallery.php",{id:id,nom:nom,img:img,link:link,autre:autre},
						 function() {
						 	if(redirect != null)
        						window.location.replace(redirect);
   					 });
				}

				function SetArticle(id,titre,text,img,actif,autre,option,redirect){
					$.post("php/SetArticle.php",{id:id,titre:titre,text:text,img:img,actif:actif,autre:autre,option:option},
						 function() {
						 	
						 	if(redirect != null)
        						window.location.replace(redirect);
   					 });
			
				}

					function SetTextFichier(id,text,titre,autre,redirect){
					$.post("php/SetTextFichier.php",{id:id,text:text,titre:titre,autre:autre},
						 function() {
						 	
						 	if(redirect != null)
        						window.location.replace(redirect);
   					 });
			
				}

				function SetDevis(id,email,phone,message,contact_type,name,newsletter){
					$.post("php/SetDevis.php",{id:id,email:email,phone:phone,message:message,contact_type:contact_type,name:name,newsletter:newsletter},
						 function() {
						 	
						 	alert("saved !");
   					 });
			
				}
