<?php

$xml = new DOMDocument();
$xml->load('data.xml');

$data = new SimpleXMLElement($xml->saveXML());

$order = $data->attributes();


echo "<h1>Order #{$order->PurchaseOrderNumber}</h1>";
echo "<div><i>As of {$order->OrderDate}</i></div>";


echo '<h2>Addresses:</h2>';
echo '<table>';
foreach ($data->Address as $address) {
  echo "<th colspan='2'>Type: {$address->attributes()['Type']}</th>";
  foreach ($address as $key => $val) {
    echo "<tr><td>$key</td><td>$val</td></tr>";
  }
}
echo '</table><hr>';


echo "<div>DeliveryNotes: {$data->DeliveryNotes}</div>";


echo '<h2>Products:</h2>';
echo '<table>';
foreach ($data->Items->Item as $item) {
  echo "<th colspan='2'>PartNumber: {$item->attributes()['PartNumber']}</th>";
  foreach ($item as $key => $val) {
    echo "<tr><td>$key</td><td>$val</td></tr>";
  }
}
echo '</table><hr>';