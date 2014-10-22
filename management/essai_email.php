<?php
/* connect to gmail */
$mailboxPath = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'guillaume.rebmann33@gmail.com';
$password = 'dasreich19331945';

$subject_final = '';
// connect to IMAP
// ...
    $mbox = imap_open($mailboxPath, $username, $password);
    $mid=14855;
    getmsg($mbox,$mid);

function getmsg($mbox,$mid) {
    // input $mbox = IMAP stream, $mid = message id
    // output all the following:
    global $htmlmsg,$plainmsg,$charset,$attachments;
    // the message may in $htmlmsg, $plainmsg, or both
    $htmlmsg = $plainmsg = $charset = '';
    $attachments = array();

    // HEADER
    $h = imap_fetchHeader($mbox,$mid, FT_UID);
    // add code here to get date, from, to, cc, subject...

    // BODY
    $s = imap_fetchstructure($mbox,$mid, FT_UID);
    if (!$s->parts)  // not multipart
        getpart($mbox,$mid,$s,0);  // no part-number, so pass 0
    else {  // multipart: iterate through each part
        foreach ($s->parts as $partno0=>$p)
            getpart($mbox,$mid,$p,$partno0+1);
    }
}

function getpart($mbox,$mid,$p,$partno) {
    // $partno = '1', '2', '2.1', '2.1.3', etc if multipart, 0 if not multipart
    global $htmlmsg,$plainmsg,$charset,$attachments;

    // DECODE DATA
    $data = ($partno)?
        imap_fetchbody($mbox,$mid,$partno, FT_UID):  // multipart
        imap_body($mbox,$mid, FT_UID);  // not multipart
    // Any part may be encoded, even plain text messages, so check everything.
    if ($p->encoding==4)
        $data = quoted_printable_decode($data);
    elseif ($p->encoding==3)
        $data = base64_decode($data);
    // no need to decode 7-bit, 8-bit, or binary

    // PARAMETERS
    // get all parameters, like charset, filenames of attachments, etc.
    $params = array();
    if ($p->parameters)
        foreach ($p->parameters as $x)
            $params[ strtolower( $x->attribute ) ] = $x->value;
    if ($p->dparameters)
        foreach ($p->dparameters as $x)
            $params[ strtolower( $x->attribute ) ] = $x->value;

    // ATTACHMENT
    // Any part with a filename is an attachment,
    // so an attached text file (type 0) is not mistaken as the message.
    if ($params['filename'] || $params['name']) {
        // filename may be given as 'Filename' or 'Name' or both
        $filename = ($params['filename'])? $params['filename'] : $params['name'];
        // filename may be encoded, so see imap_mime_header_decode()
        $attachments[$filename] = $data;  // this is a problem if two files have same name
    }

    // TEXT
    elseif ($p->type==0 && $data) {
        // Messages may be split in different parts because of inline attachments,
        // so append parts together with blank row.
        if (strtolower($p->subtype)=='plain')
            $plainmsg .= trim($data) ."\n\n";
        else
            $htmlmsg .= $data ."<br><br>";
        $charset = $params['charset'];  // assume all parts are same charset
    }

    // EMBEDDED MESSAGE
    // Many bounce notifications embed the original message as type 2,
    // but AOL uses type 1 (multipart), which is not handled here.
    // There are no PHP functions to parse embedded messages,
    // so this just appends the raw source to the main message.
    elseif ($p->type==2 && $data) {
        $plainmsg .= trim($data) ."\n\n";
    }

    // SUBPART RECURSION
    if ($p->parts) {
        foreach ($p->parts as $partno0=>$p2)
            getpart($mbox,$mid,$p2,$partno.'.'.($partno0+1));  // 1.2, 1.2.1, etc.
    }
}

?>