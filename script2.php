<?php

$number=$_REQUEST['from'];
$body=$_REQUEST['body'];

if($body == "YES") {
  header(Content-Type: text/xml);
  <Response>
    <Message>We will call you right now</Message>
  </Response>
} else if($body == "NO") {
  header(Content-Type: text/xml);
  <Response>
  <Message>Bye</Mesage>
  </Response>
}
