<?php header("Content-Type: text/json"); 
session_start();
include('class.load.php');
$filter = unserialize($_SESSION['filter']); 
$result = array();
$data = array();

//Special Sort
function build_sorter($key) {
    return function ($a, $b) use ($key) {
        return strnatcmp($a[$key], $b[$key]);
    };
}
//Create one array
function pushIntoArray($id,$total){
	global $bdd;
	$object = new portfolio($id);
	 if($object->link_portfolio != ''){
                            $reponse2 = $bdd->query("SELECT id_gallery FROM gallery where id_gallery='$object->link_portfolio'");
                             //echo "SELECT id_gallery FROM gallery where id_gallery='$object->link_portfolio'";
                             $donnees2 = $reponse2->fetchAll();
                             $id_gallery=$donnees2[0]['id_gallery'];
                             //Creatio nde la gallery
                             $object_gallery = new gallery($id_gallery);
                             //$img = "admin/upload/uploads/timthumb.php?src=".$object->id_portfolio."/".$object_gallery->GetFirstImage()."&w=218&h=125";
                             $img = "admin/upload/uploads/".$object->id_portfolio."/".$object_gallery->GetFirstImage();
      }else{
      	$img="";
      }   

      if($object->link_adress_portfolio == 0){
      	$link = $object->id_portfolio;
      	$lat =$object->lat_portfolio;
      	$lng =$object->lng_portfolio;
      }else{
      	$link = $object->link_adress_portfolio;
      	$linkObject = new portfolio($link);
      	$lat =$linkObject->lat_portfolio;
      	$lng =$linkObject->lng_portfolio;
      }
      	

      $json = array(
                    'id'=>$id,
                    'lat'=>$lat,
                    'lng'=>$lng,
                    'type'=>$object->type_portfolio,
                    'price'=>$object->price_portfolio,
                    'bath'=>$object->bath_portfolio,
                    'bed'=>$object->bed_portfolio,
                    'img'=>$img,
                    'link'=>$link,
                    'total'=>$total
                    );
		return $json;
}

$reponse = $bdd->query($filter->request());
$donnees = $reponse->fetchAll();


foreach ($donnees as $key => $value) {
	 $object = new portfolio($value['id_portfolio']);

	  if($object->link_adress_portfolio == 0)
      	$link = $object->id_portfolio;
      else
      	$link = $object->link_adress_portfolio;

	 $currentData = array('id' =>$object->id_portfolio , 'link' =>$link);
	 array_push($data,$currentData);


}
usort($data, build_sorter('link'));
$newArr = array();
foreach ($data as $key => $value) {
        // What you were using:
        // $newArr[$value['user_groups']]++;

        // What you should be using:
	//$newArr[$value['id']]++;
        $newArr[$value['link']]++;
}
foreach ($data as $key => $value) {
	array_push($result,pushIntoArray($value['id'],$newArr[$value['link']]));
}
//array_push($result,pushIntoArray($value['id_portfolio'],$link));
	
	echo json_encode($result); 


?>