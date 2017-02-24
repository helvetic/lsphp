<h3>#1</h3>
<?php
/*
 * #1
 */


$name = 'Alexander';
$age = '26';

echo "My name is: $name", "<br>";
echo "I am $age years old", "<br>";
echo "\"!|\\/’\"\\";


?>
<hr><h3>#2</h3>
<?php
/*
 * #2
 */


$all = 80;
$feltPen = 23;
$pencil = 40;
$paint = $all - $feltPen - $pencil;

echo "На школьной выставке $all рисунков. 
  $feltPen из них выполнены фломастерами, 
  $pencil карандашами, $paint красками.";


?>
<hr><h3>#3</h3>
<?php
/*
 * #3
 */


define('SOMECONST', 'somecontsval');
if (defined('SOMECONST')) {
    echo 'SOMECONST exist', '<br>';
}
echo SOMECONST, '<br>';
//SOMECONST = 'someotherval';


?>
<hr><h3>#4</h3>
<?php
/*
 * #4
 */


$age = 112;

if ($age >= 18 && $age <= 65) {
    echo "Вам еще работать и работать";
} elseif ($age >= 65) {
    echo "Вам пора на пенсию";
} elseif ($age >= 1 && $age <= 17) {
    echo "Вам ещё рано работать";
} else {
    echo "Неизвестный возраст";
}


?>
<hr><h3>#5</h3>
<?php
/*
 * #5
 */


$day = 5;

switch ($day) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo 'Это рабочий день';
        break;
    case 6:
    case 7:
        echo 'Это выходной день';
        break;
    default:
        echo 'Неизвестный день';
}


?>
<hr><h3>#6</h3>
<?php
/*
 * #6
 */


$bmw = [
    'model' => 'X5',
    'speed' => 120,
    'doors' => 5,
    'year' => '2015'
];

$toyota = [
    'model' => 'Prius',
    'speed' => 180,
    'doors' => 4,
    'year' => '2017'
];

$opel = [
    'model' => 'Astra',
    'speed' => 150,
    'doors' => 5,
    'year' => '2016'
];

$cars = [
    'BMW' => $bmw,
    'Toyota' => $toyota,
    'Opel' => $opel
];

foreach ($cars as $firm => $car) {
    echo "CAR {$firm}", '<br>';
    echo "{$car['model']} {$car['speed']} {$car['doors']} {$car['year']}", '<hr>';
}


?>
<hr><h3>#7</h3>
<?php
/*
 * #7
 */

echo '<table>';
for ($i=1; $i<=10; $i++) {
    echo '<tr>';
    for ($j=1; $j<=10; $j++) {
        $num = $i * $j;
        if ($i%2 == 0 && $j%2 == 0) {
            echo "<td>($num)</td>";
        } elseif ($i%2 != 0 && $j%2 != 0) {
            echo "<td>[$num]</td>";
        } else {
            echo "<td>$num</td>";
        }
    }
    echo '</tr>';
}
echo '</table>';



?>
<hr><h3>#8</h3>
<?php
/*
 * #8
 */


$str = "In vino veritas";

echo $str , '<br>';

$array = explode(' ', $str);

echo '<pre>';
print_r($array);
echo '</pre>';

$result = '';
$i = 0;
$arrayLastIndex = count($array) - 1;

while (true) {
    $result .= $array[$i];
    if ($i == $arrayLastIndex) {
       break;
    }
    $result .= '-';
    $i++;
}

echo $result;