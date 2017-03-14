<?php include '../helpers.php'; ?>

<h3>#1</h3>
<?php
function displayArray ($array, $concat = false)
{
    if ($concat) {
        return implode(', ', $array);
    }
    foreach ($array as $str) {
        echo "<p>$str</p>";
    }
}

$array = ['Lorem ipsum dolor sit amet', 'consectetur adipiscing elit', 'sed do eiusmod tempor incididunt'];

displayArray($array);
echo displayArray($array, true);

?>




<h3>#2</h3>
<?php
function calc($array, $operator)
{
    if (!count($array)) {
        echo 'Пустой массив', '<br>';
        return;
    }
    
    $checkedArray = array_filter($array, "is_numeric");
    if (count($array) !== count($checkedArray)) {
        echo 'Некорректный ввод чисел', '<br>';
        return;
    }
    
    switch ($operator) {
        case '+':
            $result = $array[0];
            for ($i=1; $i<count($array); $i++) {
                $result += $array[$i];
            }
            break;
        case '-':
            $result = $array[0];
            for ($i=1; $i<count($array); $i++) {
                $result -= $array[$i];
            }
            break;
        case '*':
            $result = $array[0];
            for ($i=1; $i<count($array); $i++) {
                $result *= $array[$i];
            }
            break;
        case '/':
            $result = $array[0];
            for ($i=1; $i<count($array); $i++) {
                if ($array[$i] == 0) {
                  $result = 'Деление на ноль не предусмотрено';
                  break;
                }
                $result /= $array[$i];
            }
            break;
        default:
            $result = 'Некорректный оператор';
    }
    
    echo $result, '<br>';
}

calc([], '-');
calc(['2e',2,3,4], '+');
calc([1,2,3,4], '-');
calc([1,2,3,4], '*');
calc([2,2,0.25], '/');
calc([2,4,0,3], '/');
calc([1,2,3,4], '#');

?>




<h3>#3</h3>
<?php
function calcEverything($operator)
{
    $array = array_slice(func_get_args(), 1);
    $resultStr = implode(" $operator ", $array) . ' = ';
    
    switch ($operator) {
        case '+':
            $result = $array[0];
            for ($i=1; $i<count($array); $i++) {
                $result += $array[$i];
            }
            break;
        case '-':
            $result = $array[0];
            for ($i=1; $i<count($array); $i++) {
                $result -= $array[$i];
            }
            break;
        case '*':
            $result = $array[0];
            for ($i=1; $i<count($array); $i++) {
                $result *= $array[$i];
            }
            break;
        case '/':
            $result = $array[0];
            for ($i=1; $i<count($array); $i++) {
                if ($array[$i] == 0) {
                  $result = 'Деление на ноль не предусмотрено';
                  break;
                }
                $result /= $array[$i];
            }
            break;
    }
    
     echo $resultStr . $result , '<br>';

}

calcEverything('+', 1, 2, 3, 5.2);
calcEverything('*', 2, 2, 3, 8);

?>




<h3>#4</h3>
<?php
function getMultiplyTable($num1, $num2)
{
    $checkedArray = array_filter(func_get_args(), "is_int");
    if (count(func_get_args()) !== count($checkedArray)) {
        echo 'Аргументы должны быть целыми числами', '<br>';
        return;
    }
    
    echo '<table>';
    for ($i=1; $i<=$num1; $i++) {
        echo '<tr>';
        for ($j=1; $j<=$num2; $j++) {
            $result = $i*$j;
            echo "<td>$result</td>";
        }
        echo '</tr>';
    }
    echo '</table>';
    
}

getMultiplyTable('d', 4);
getMultiplyTable(3, 4);
getMultiplyTable(3.14, 4);

?>




<h3>#5</h3>
<?php
function isPalindrome($str)
{
    $str = mb_strtolower(str_replace(' ', '', $str));
    preg_match_all('/./us', $str, $array);
    $revArray[0] = array_reverse($array[0]);
    
    return ($array === $revArray);
}

function displayResult($isPali)
{
    if ($isPali) {
        echo 'Это слово палиндром', '<br>';
    } else {
        echo 'Это слово не палиндром', '<br>';
    }
}

displayResult(isPalindrome('Sum summus mus'));
displayResult(isPalindrome('In vino veritas'));
displayResult(isPalindrome('Около меня не молоко'));
displayResult(isPalindrome('пиа'));

?>




<h3>#6</h3>
<?php
display(date('d.m.Y h:i'));
display(mktime(0,0,0,2,24,2016));
?>




<h3>#7</h3>
<?php
$str = 'Карл у Клары украл Кораллы';
$str = str_replace('К', '', $str);
display($str);

$str2 = 'Две бутылки лимонада';
$str2 = str_replace('Две', 'Три', $str2);
display($str2);
?>




<h3>#8</h3>
<?php
function checkRX($str)
{
    if (strpos($str, ':)') !== false) {
        smile();
        return;
    }
    
    preg_match('/packets:(\d*)/', $str, $matches);
    $packets = $matches[1];
    if ($packets > 1000) {
        display('Сеть есть');
    }
}

function smile()
{
    $result = '
                          oooo$$$$$$$$$$$$oooo
                      oo$$$$$$$$$$$$$$$$$$$$$$$$o
                   oo$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$o         o$   $$ o$
   o $ oo        o$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$o       $$ $$ $$o$
oo $ $ "$      o$$$$$$$$$    $$$$$$$$$$$$$    $$$$$$$$$o       $$$o$$o$
"$$$$$$o$     o$$$$$$$$$      $$$$$$$$$$$      $$$$$$$$$$o    $$$$$$$$
  $$$$$$$    $$$$$$$$$$$      $$$$$$$$$$$      $$$$$$$$$$$$$$$$$$$$$$$
  $$$$$$$$$$$$$$$$$$$$$$$    $$$$$$$$$$$$$    $$$$$$$$$$$$$$  """$$$
   "$$$""""$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$     "$$$
    $$$   o$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$     "$$$o
   o$$"   $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$       $$$o
   $$$    $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$" "$$$$$$ooooo$$$$o
  o$$$oooo$$$$$  $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$   o$$$$$$$$$$$$$$$$$
  $$$$$$$$"$$$$   $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$     $$$$""""""""
 """"       $$$$    "$$$$$$$$$$$$$$$$$$$$$$$$$$$$"      o$$$
            "$$$o     """$$$$$$$$$$$$$$$$$$"$$"         $$$
              $$$o          "$$""$$$$$$""""           o$$$
               $$$$o                                o$$$"
                "$$$$o      o$$$$$$o"$$$$o        o$$$$
                  "$$$$$oo     ""$$$$o$$$$$o   o$$$$""
                     ""$$$$$oooo  "$$$o$$$$$$$$$"""
                        ""$$$$$$$oo $$$$$$$$$$
                                """"$$$$$$$$$$$
                                    $$$$$$$$$$$$
                                     $$$$$$$$$$"
                                      "$$$""""';
    echo "<pre>$result</pre>";
  
}

checkRX('RX packets:950381 errors:0 dropped:0 overruns:0 frame:0. ');
checkRX('RX:) packets:950381 errors:0 dropped:0 overruns:0 frame:0. ');
?>



<h3>#9</h3>
<?php
function getFileContent($filename)
{
    $file = fopen($filename, 'r');
    $fileContent = fread($file, filesize($filename));
    fclose($file);
    echo $fileContent, '<br>';
}
getFileContent('test.txt');
?>



<h3>#10</h3>
<?php
$newfile = fopen('anotherfile.txt', 'w');
if ($newfile) {
    display('anotherfile.txt created');
    fwrite($newfile, 'Hello again!');
}
fclose($newfile);

?>