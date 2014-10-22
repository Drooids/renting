<?php
session_start();
if(isset($_REQUEST['option'])){
    $option = $_REQUEST['option'];
}else{
    $option = null;
}




/* connect to imap */
$mailboxPath = $_SESSION['email_box']."INBOX"; 
$username = $_SESSION['email_pro'];
$password = $_SESSION['email_pass'];

//affiche_email(1,connect_imap($mailboxPath,$username,$password));
affiche_mailbox(connect_imap($mailboxPath,$username,$password),'');
//ici on se conenct à IMAP
function connect_imap($mailboxPath,$username,$password){
	 $imap = imap_open($mailboxPath, $username, $password);
	 return $imap;
}


//Ici on affiche les infos du header (json)
function affiche_header($uid,$imap){
	$headerText = imap_fetchHeader($imap, $uid, FT_UID);
    $header = imap_rfc822_parse_headers($headerText);
    	$fromInfo = $header->from[0];
   		$replyInfo = $header->reply_to[0];
    //$class = ($header->Unseen == "U") ? "unreadMsg" : "readMsg";

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
        "udate" => (isset($header->date))
            ? date("jS F Y", strtotime($header->date)) : ""
    );

    header("Content-Type: text/json");
	$details= json_encode($details); 

	echo $details; 
}
// Ici on affiche un seul email (json)
function affiche_email($uid,$imap){
	$body = get_part($imap, $uid, "TEXT/HTML");
    // if HTML body is empty, try getting text body
    if($body == ''){
      $body = get_part($imap, $uid, "TEXT/PLAIN");
      $body= preg_replace("/\r\n|\r|\n/",'<br/>',$body);
    }
      
    
    echo $body;
}
//Ici on additionne les message dans un tableau (json)
function affiche_mailbox($imap,$num){
$tableau = array();
$folders = imap_list($imap, $_SESSION['email_box'], "*");
//Listing the email messages
$numMessages = imap_num_msg($imap);
if($numMessages < 20){
    $minus = $numMessages;
}else{
    $minus = 20;
}
for ($i = $numMessages; $i > ($numMessages - $minus); $i--) {
	
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
            ? date("jS F Y H:i:s", $header->udate) : "",
        "seen" => $class,
        "uid"  => imap_uid($imap, $i),
        "total"=> $numMessages-1

    );
    array_push($tableau, $details);

    

	}	
	header("Content-Type: text/json");
    $tableau= json_encode($tableau); 

    echo $tableau;
}


/*     Function utilisé pour l'utilisation des autres fonctions */

function decode_imap_text($str){
    $result = '';
    $decode_header = imap_mime_header_decode($str);
    foreach ($decode_header AS $obj) {
        $result .= htmlspecialchars(rtrim($obj->text, "\t"));
    }
    return $result;
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