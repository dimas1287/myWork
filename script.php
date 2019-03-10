<?php

require_once'autoload.php';
use Twilio\Rest\Client;

$number=$_REQUEST['from'];
$body=$_REQUEST['body'];

$DB_NAME='mhleadst_leadproject';
$DB_LOGIN='mhleadst_leadpro';
$DB_PASSWORD='Hu123KKKssz';

$AccountSid='AC9054b04b0a95893344d443a5f025fbe9';
$AuthToken='7625de7acc0915b411372425e98168c0';


if($body == "YES") {
	
	$response->message("Ok, we wil call you right now");
	
	    $client = new Client($AccountSid, $AuthToken);
    $sms = $client->account->messages->create(
         TO,
         array(
        'from' => "+1(605) 250-3984", 
        'body' => "Ok, we wil call you right now"
    )
);
	$link=mysql_connect("localhost", $DB_LOGIN, $DB_PASSWORD, $DB_NAME);
	if(!$link) {
		echo "Error, code of error: " . mysql_connect_errno();
	}
	
	$res='SELECT * FROM lead_sales_person WHERE telphone1 = $number';
	$query=mysql_query($res);
	$row=mysql_fetch_row($query);
	
	$to = "centennialhomes@press1totalk.info";
    $subject = 'Call ' . time();
    $header  = "From: robot@centennialhomes.com";
    mail($to, $subject, $msg, $header);
	
	$msg="<?P1TT VERSION '1.0'?>
<?XML VERSION '1.0'?>
<p1tt>
<interested>
             <int1>" . $row['int1'] . "</int1>
             <int2>" . $row['int2'] . "</int2>
             <int3>" . $row['int3'] . "</int3>
</interested>
<customer>
             <name part='first'>" . $row['fname'] . "</name>
             <name part='last'>" . $row['lname'] . "</name>
             <phone>" . $row['telphone1'] . "</phone>
</customer>
<ringto>
             <phone>" . $row['telphone1'] . "</phone>
             <phone>" . $row['telphone2'] . "</phone>
</ringto>
<customid>" . $row['id_lead'] . "</customid>
<calleridin>" . $row['telphone1'] . "</calleridin>
<calleridout>'6058480642'</calleridout>
</p1tt>";


} elseif ($body == "NO"){
	
	$response->message("Bye");
	
	    $client = new Client($AccountSid, $AuthToken);
    $sms = $client->account->messages->create(
         TO,
         array(
        'from' => "+1(605) 250-3984", 
        'body' => "bye"
    )
);
}
