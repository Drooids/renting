<?php session_start(); 

/* connect to gmail */
$mailboxPath = $_SESSION['email_box']."INBOX"; //'{incoming.servage.net:143}INBOX';
$username = $_SESSION['email_pro'];//'guillaume.rebmann33@gmail.com';
$password = $_SESSION['email_pass'];//'dasreich19331945';

$func = (!empty($_GET["func"])) ? $_GET["func"] : "view";
$folder = (!empty($_GET["folder"])) ? $_GET["folder"] : "INBOX";
$uid = (!empty($_GET["uid"])) ? $_GET["uid"] : 0;
$subject_final = '';
$nbre_lignes=0;
// connect to IMAP
// ...
	$imap = imap_open($mailboxPath, $username, $password);

switch ($func) {
    case "delete":
        deleteMail($imap, $folder, $uid);
        break;

    case "read":
        deleteMail($imap, $folder, $uid);
        break;

    case "view":
    default:
        viewMail($imap, $folder);
        break;
}


function viewMail($imap,$folder){

//Read only one email
   $uid = $_GET['uid'];
  /*    $headerText = imap_fetchHeader($imap, $uid, FT_UID);
      $header = imap_rfc822_parse_headers($headerText);

      // REM: Attention s'il y a plusieurs sections
      $corps = imap_fetchbody($imap, $uid, 1, FT_UID);
  
  imap_close($imap);



  $from=$header->from;
  echo "Message de:".$from[0]->personal." [".$from[0]->mailbox."@".$from[0]->host."]<br>";
  echo $corps;
*/
    




  $body = getBody($uid,$imap);

  echo $body;



}
//Connect to the server

/************************************************************/
/* 				Voici les fonctions                          */
/************************************************************/
function decode_imap_text($str){
    $result = '';
    $decode_header = imap_mime_header_decode($str);
    foreach ($decode_header AS $obj) {
        $result .= htmlspecialchars(rtrim($obj->text, "\t"));
    }
    return $result;
}

function getBody($uid, $imap) {
    $body = get_part($imap, $uid, "TEXT/HTML");
    // if HTML body is empty, try getting text body
    if($body == ''){
      $body = get_part($imap, $uid, "TEXT/PLAIN");
      $body= preg_replace("/\r\n|\r|\n/",'<br/>',$body);
    }
      
    
    return $body;
}

function get_part($imap, $uid, $mimetype, $structure = false, $partNumber = false) {
    if (!$structure) {
           $structure = imap_fetchstructure($imap, $uid, FT_UID);
          // echo $structure->encoding;
          // echo get_mime_type($structure);
    }
    //echo get_mime_type($structure);
    if ($structure) {

        if ($mimetype == get_mime_type($structure)) {
            if (!$partNumber) {
                $partNumber = 1;
            }
           
            $text = imap_fetchbody($imap, $uid, $partNumber, FT_UID);

            switch ($structure->encoding) {
                case 3:  return imap_base64($text);
                case 4:  return imap_qprint($text);
                default:  return $text;
           }
       }

        // multipart 
        if ($structure->type == 1) {
            foreach ($structure->parts as $index => $subStruct) {
                $prefix = "";
                if ($partNumber) {
                    $prefix = $partNumber . ".";
                }
                $data = get_part($imap, $uid, $mimetype, $subStruct, $prefix . ($index + 1));
                if ($data) {
                    return $data;
                }
            }
        }
    }
    return false;
}
function decode_qprint($str) {
    $str = preg_replace("/\=([A-F][A-F0-9])/","%$1",$str);
    $str = urldecode($str);
    $str = utf8_encode($str);
    return $str;
}
function get_mime_type($structure) {
    $primaryMimetype = array("TEXT", "MULTIPART", "MESSAGE", "APPLICATION", "AUDIO", "IMAGE", "VIDEO", "OTHER");

    if ($structure->subtype) {
       return $primaryMimetype[(int)$structure->type] . "/" . $structure->subtype;
    }
    return "TEXT/PLAIN";
}



 ?>


			