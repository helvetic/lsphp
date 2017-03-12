<?php

// #1
$numbers = [];

for ($i=0; $i<50; $i++) {
  $numbers[] = mt_rand(1, 100);
}


// #2
$csv = fopen("numbers.csv", "w");
fputcsv($csv, $numbers);
fclose($csv);

// #3
$csv = fopen("numbers.csv", "r");
$array = fgetcsv($csv, 0 , ',');
print_r($array);
fclose($csv);


$even = 0;
echo "<hr>$even ";

foreach ($array as $item) {
  if ($item % 2 == 0) {
    echo "+ $item";
    $even += $item;
  }
}

echo "<hr><div><strong>Сумма чётных: $even</strong></div>";