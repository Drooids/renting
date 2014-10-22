<?php session_start(); 
?>
<h3>Email</h3>
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
/* connect to gmail */
$mailboxPath = $_SESSION['email_box']."INBOX"; //'{incoming.servage.net:143}INBOX';
$username = $_SESSION['email_pro'];//'guillaume.rebmann33@gmail.com';
$password = $_SESSION['email_pass'];//'dasreich19331945';

$func = (!empty($_GET["func"])) ? $_GET["func"] : "view";
$folder = (!empty($_GET["folder"])) ? $_GET["folder"] : "INBOX";
$uid = (!empty($_GET["uid"])) ? $_GET["uid"] : 0;

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

//Listing the folder
$folders = imap_list($imap, "{imap.gmail.com:993/imap/ssl}", "*");

/*echo"<header class='header_older'>";

echo"<select style='float:right;'>";



$i=0;
foreach ($folders as $folder) {
	
    $folder = str_replace("{imap.gmail.com:993/imap/ssl}", "", $folder);
    $folder = str_replace("&AOk-", "é", $folder);
    if($i==0 ){

    echo "<option value='?folder=' . $folder . '&func=view' selected>".$folder."</option>";
    }else{
    	
     echo "<option value='?folder=' . $folder . '&func=view' >".$folder."</option>";
    }
    $i=$i+1;
}
echo "</select>";
echo"</header>";
*/



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
            ? date("jS F Y", $header->udate) : ""
    );

    $uid = imap_uid($imap, $i);



    if($class == 'unreadMsg'){
                	echo"<tr class='odd gradeX nonlu' data-click='".$uid."'>";
						echo"<td style='color:black; font-weight:bold;'>".$details['udate']."</td>";
						echo"<td style='color:black; font-weight:bold;'>".decode_imap_text($details['fromName'])."</td>";
						echo"<td style='color:black; font-weight:bold;'>".decode_imap_text($details['subject'])."</td>";
					echo"</tr>";
                }else{
                	echo"<tr class='odd gradeX lu' data-click='".$uid."'>";
                		echo"<td style='color:black;'>".$details['udate']."</td>";
                		echo"<td style='color:black;'>".decode_imap_text($details['fromName'])."</td>";
						echo"<td style='color:black;'>".decode_imap_text($details['subject'])."</td>";
					echo"</tr>";
                }
}




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
    if ($body == "") {
        $body = get_part($imap, $uid, "TEXT/PLAIN");
    }
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
                case 3: return imap_base64($text);
                case 4: return imap_qprint($text);
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

function get_mime_type($structure) {
    $primaryMimetype = array("TEXT", "MULTIPART", "MESSAGE", "APPLICATION", "AUDIO", "IMAGE", "VIDEO", "OTHER");

    if ($structure->subtype) {
       return $primaryMimetype[(int)$structure->type] . "/" . $structure->subtype;
    }
    return "TEXT/PLAIN";
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
			