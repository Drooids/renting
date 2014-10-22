<?php
 session_start();
if(isset($_REQUEST['option'])){
    $option = $_REQUEST['option'];
}else{
    $option = null;
}




/* connect to gmail */
$mailboxPath = $_SESSION['email_box']; //'{incoming.servage.net:143}INBOX';
$username = $_SESSION['email_pro'];//'guillaume.rebmann33@gmail.com';
$password = $_SESSION['email_pass'];//'dasreich19331945';

$option_folder = "*";
$folder="INBOX";

if($option == 'etape_1'){
    login($mailboxPath."INBOX",$username,$password);
}elseif($option == 'etape_2'){
    list_verif($mailboxPath."INBOX",$username,$password,$box,$option_folder);

}elseif($option == 'etape_3'){
    affiche_all($mailboxPath."INBOX",$username,$password,$box,$option_folder);

}elseif($option == 'etape_4'){
    affiche_one($mailboxPath."INBOX", $username, $password,$folder);
}

//Connect to the server

/************************************************************/
/* 				Voici les fonctions                          */
/************************************************************/
function login($mailboxPath,$username,$password){
        $imap = imap_open($mailboxPath, $username, $password);
        if($imap){
            echo 'success';
        }else{
            echo 'error';
        }
}

function list_verif($mailboxPath,$username,$password,$box,$option_folder){
    $imap = imap_open($mailboxPath, $username, $password);
    $folders = imap_list($imap,$box,$option_folder);
     if($folders){
            echo 'success';
        }else{
            echo 'error';
        }
}

function affiche_all($mailboxPath,$username,$password,$box,$option_folder){
    $imap = imap_open($mailboxPath, $username, $password);
   
//Listing the folder
$folders = imap_list($imap,$mailboxPath, "*");

//Listing the email messages
$numMessages = imap_num_msg($imap);
for ($i = $numMessages; $i > 0; $i--) {
        $header = imap_header($imap, $i);
        $uid = imap_uid($imap, $i);

        $fromInfo = $header->from[0];
        $replyInfo = $header->reply_to[0];
        $class = ($header->Unseen == "U") ? "unreadMsg" : "readMsg";

        $details = array(
            "fromAddr" => (isset($fromInfo->mailbox) && isset($fromInfo->host))
                ? $fromInfo->mailbox . "@" . $fromInfo->host : "",
            "fromName" => (isset($fromInfo->personal))
                ? $fromInfo->personal : "",
            "replyAddr" => (isset($replyInfo->mailbox) && isset($replyInfo->host))
                ? $replyInfo->mailbox . "@" . $replyInfo->host : "",
            "replyName" => (isset($replyTo->personal))
                ? $replyto->personal : "",
            "subject" => (isset($header->subject))
                ? $header->subject : "",
            "udate" => (isset($header->udate))
                ? date("jS F Y", $header->udate) : ""
        );

        $uid = imap_uid($imap, $i);



      
    }
    return true;




}

function affiche_one($mailboxPath, $username, $password,$folder){
     $imap = imap_open($mailboxPath, $username, $password);

        viewMail($imap, $folder);
}






function viewMail($imap,$folder){

   $uid = $_GET['uid'];


  $body = getBody($uid,$imap);
  if($body){
    return true;
  }else{
    return false;
  }



}
//Connect to the server

/************************************************************/
/*              Voici les fonctions                          */
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
   
    return $body;
}

function get_part($imap, $uid, $mimetype, $structure = false, $partNumber = false) {
    if (!$structure) {
           $structure = imap_fetchstructure($imap, $uid, FT_UID);
    }
    if ($structure) {
        if ($mimetype == get_mime_type($structure)) {
            if (!$partNumber) {
                $partNumber = 1;
            }
            $text = imap_fetchbody($imap, $uid, $partNumber, FT_UID);

            switch ($structure->encoding) {
                case 3:  return imap_base64($text);
                case 4:  return imap_qprint($text);
                default: return $text;
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


            
			