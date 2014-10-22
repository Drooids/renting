<h3>Devis</h3>
<table class="datatable table table-striped table-bordered" id="example-2" >
										<thead>
											<tr>
												<th>Date</th>
												<th>Name</th>
												<th>Message</th>
												
											</tr>
										</thead>
										<tbody class="affiche_devis">
<?php

 include 'server.php';

 $reponse = $bdd->query("SELECT * FROM devis ORDER BY YEAR(Date) DESC, MONTH(Date) DESC, DAY(DATE) DESC");
 $donnees = $reponse->fetchAll();

                        for($k=0;$k<count($donnees);$k++){
                $devis_id=$donnees[$k]['devis_id'];
                $devis_info=$donnees[$k]['devis_info'];
                $devis_type_id=$donnees[$k]['devis_type_id'];
                $devis_text=$donnees[$k]['devis_text'];
                $devis_name=$donnees[$k]['devis_name'];
                $date=$donnees[$k]['date'];
                $devis_phone=$donnees[$k]['devis_phone'];
                $devis_email=$donnees[$k]['devis_email'];
                $devis_newsletter=$donnees[$k]['devis_newsletter'];
                $devis_lu=$donnees[$k]['devis_lu'];
                $devis_checked=$donnees[$k]['devis_checked'];
                $devis_contact_type=$donnees[$k]['devis_contact_type'];

                if($devis_lu == 0){
                	echo"<tr class='odd gradeX nonlu' data-click='".$devis_id."'>";
						echo"<td style='color:black; font-weight:bold;'>".$date."</td>";
						echo"<td style='color:black; font-weight:bold;'>".$devis_name."</td>";
						echo"<td style='color:black; font-weight:bold;'>".$devis_text."</td>";
					echo"</tr>";
                }else{
                	echo"<tr class='odd gradeX lu' data-click='".$devis_id."'>";
                		echo"<td style='color:black;'>".$date."</td>";
                		echo"<td style='color:black;'>".$devis_name."</td>";
						echo"<td style='color:black;'>".$devis_text."</td>";
					echo"</tr>";
                }
				
				
				
            }

 ?>
</tbody>
</table>

			<script>
			



			
			
			/* Table #example */
			
				$('.datatable').dataTable( {
					"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
					"sPaginationType": "bootstrap",
					"aaSorting": [[ 0, "desc" ]],
					"oLanguage": {
						"sLengthMenu": "_MENU_ records per page"
					},
					"bDestroy": true
				});
				
		</script>