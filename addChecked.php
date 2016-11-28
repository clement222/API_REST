<?php

$side     = $_POST["side"];
$symbol   = $_POST["symbol"];
$orderQty = $_POST["orderQty"];
$limit    = $_POST["limit"];
$stop     = $_POST["stop"];
$user_key = "4f6158ef97874d8d49ead880fc6fe756";

$values = $stop && $limit ?
  "user_key=".$user_key."&Symbol=".$symbol."&OrderQty=".$orderQty."&Side=".$side."&Stop=".$stop."&Limit=".$limit."&Type=ModifiableStopLoss" :
  "user_key=".$user_key."&Symbol=".$symbol."&OrderQty=".$orderQty."&Side=".$side."&Stop=".$stop."&Limit=".$limit."&Type=Simple";

$curl = curl_init("https://api-2445581154346.apicast.io/positions");
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $values); //On envoie les valeurs
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);

$result = json_decode($result, true);

if (array_key_exists("error", $result)) {
  echo $result["error"];
}

?>