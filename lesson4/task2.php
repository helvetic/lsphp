<?php

// #1
$animals = [
    'Llama' => [
        'Class' => 'Mammalia',
        'Family' => 'Camelidae',
        'Genus' => 'Lama'
    ],
    'Alpaca' => [
        'Class' => 'Mammalia',
        'Family' => 'Camelidae',
        'Genus' => 'Vicugna'
    ],
    'Sheep' => [
        'Class' => 'Mammalia',
        'Family' => 'Bovidae',
        'Genus' => 'Ovis'
    ]
];

$json = json_encode($animals, JSON_PRETTY_PRINT );

$output = fopen("output.json", "w");
if (fwrite($output, $json)) {
  echo 'Файл output.json записан', '<br>';
}
fclose($output);


// #2
$output = fopen("output.json", "r");
$data = fread($output, filesize("output.json"));
fclose($output);


if (mt_rand(0, 1)) {
  echo 'Повезло!', '<br>';
  $data = json_decode($data, true);
  unset($data['Llama']);
  unset($data['Alpaca']);
  $data['Chamaeleo'] = [
      'Class' => 'Reptilia',
      'Family' => 'Chamaeleonidae',
      'Genus' => 'Chamaeleo'
  ];
  $data = json_encode($data, JSON_PRETTY_PRINT );
}

$output2 = fopen("output2.json", "w");
if (fwrite($output2, $data)) {
  echo 'Файл output2.json записан', '<br>';
}
fclose($output2);


// #3
$output = fopen("output.json", "r");
$data1 = json_decode(fread($output, filesize("output.json")), true);
fclose($output);

$output2 = fopen("output2.json", "r");
$data2 = json_decode(fread($output2, filesize("output2.json")), true);
fclose($output2);



function showArraysDiff($arr1, $arr2)
{
  foreach ($arr1 as $key => $val) {
    echo "<tr><th>$key</th></tr>";
    foreach ($val as $k => $v) {
      echo "<tr><td>$k</td><td>$v</td></tr>";
    }
  }
}


echo '<table cellspacing="5" cellpadding="10" border="1">';

echo '<tr>';

echo '<td valign="top" bgcolor="#eaffea"><pre>';
print_r(array_diff_assoc($data1, $data2));
echo '</pre></td>';


echo '<td valign="top" bgcolor="#eaffea"><pre>';
print_r(array_diff_assoc($data2, $data1));
echo '</pre></td>';

echo '</tr>';

echo '<tr>';

echo '<td valign="top"><pre>';
print_r($data1);
echo '</pre></td>';


echo '<td valign="top"><pre>';
print_r($data2);
echo '</pre></td>';

echo '</tr>';

echo '</table>';
