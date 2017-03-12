<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$json = json_decode(curl_exec($ch));

curl_close($ch);

foreach ($json->query->pages as $page) {
  echo "Page id: {$page->pageid}", '<br>';
  echo "Page title: {$page->title}", '<br>';
}