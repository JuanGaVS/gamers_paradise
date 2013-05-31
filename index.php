<?php

require 'facebook.php';
$app_id = "556218747762833";
$app_secret = "eec279827ce7706afada43d769d1bcb3";
$facebook = new Facebook(array(
'appId' => $app_id,
'secret' => $app_secret,
'cookie' => true
));
$signed_request = $facebook->getSignedRequest();
$page_id = $signed_request["page"]["id"];
$page_admin = $signed_request["page"]["admin"];
$like_status = $signed_request["page"]["liked"];
$country = $signed_request["user"]["country"];
$locale = $signed_request["user"]["locale"];
// The following statement does a test of $like_status and chooses which page to display to the visitor
if ($like_status) {$a = file_get_contents("instrucciones.php");
echo ($a);
}
else {$a = file_get_contents("prelike.php");
echo ($a);
}
?>