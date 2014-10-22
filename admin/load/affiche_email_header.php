<?php
session_start();
?>
<header  class='header_devis span8' style=' float:left;'>
   
<?php
/* connect to gmail */
$mailboxPath = $_SESSION['email_box']."INBOX"; //'{incoming.servage.net:143}INBOX';
$username = $_SESSION['email_pro'];//'guillaume.rebmann33@gmail.com';
$password = $_SESSION['email_pass'];//'dasreich19331945';

$func = (!empty($_GET["func"])) ? $_GET["func"] : "view";
$folder = (!empty($_GET["folder"])) ? $_GET["folder"] : "INBOX";
$uid = (!empty($_GET["uid"])) ? $_GET["uid"] : 0;
$subject_final = '';
$to="";
$to_nom="";
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

global $subject_final;
global $to;
global $to_nom;
$to = decode_imap_text($details['fromName']);
$to_nom = decode_imap_text($details['fromAddr']);
 $subject_final = decode_imap_text($details['subject']);

echo"<h2>".decode_imap_text($details['fromName'])."</h2><span style='font-weight:bold; line-height:40px; float:left; margin-left:20px; margin-bottom:-2px;'>&#60;".decode_imap_text($details['fromAddr'])."&#62;</span>";
echo"</header>";
echo"<header class='span8'>";
echo"<span style='margin-left:0px;'> received the: ".$details['udate']."</span>";
echo"</header>";


  



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




 ?>
<script type="text/javascript">
 $(document).ready(function(){
    var li ="<?php echo$subject_final; ?>";
    //alert(li.length);
    if(li.length >=100)
            li.substr(0,100);
    var li = "<li class='active' id='current_email'><a href='#'>"+li+"</a><span class='divider'></span></li>";
    var id =  "<?php echo $uid; ?>";
    $('.breadcrumb').append(li);
        $('#uploadfiles').data('to',"<?php echo $to; ?>");
        $('#uploadfiles').data('tonom',"<?php echo $to_nom; ?>");
        $('#uploadfiles').data('subject',"<?php echo $subject_final; ?>");   

    $('.email_return').live('click',function(){
        $('#current_email').remove();
        $("#frame").css('height','');
        if($('.affiche_all').data('click') == 'hide'){
                $('.affiche_one').hide();
                $('.affiche_one').data('click','hide');
                $('.affiche_all').show();
                $('.affiche_all').data('click','show');
                $('#affiche_all_article').removeClass('nested');
               
        }
        return false;
            
    });
 });
 </script>

			