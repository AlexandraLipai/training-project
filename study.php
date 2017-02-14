
///
<?php
$array = array
(
    array('a' => 'b', 'c'=>'600'),
    array('a' => 'e', 'c' => '500'),
);

usort($array, function($a, $b){
    return ($a['c'] - $b['c']);
});
var_dump($array);
$x = array
(
    array('a' => 'n', 'c' => 'm'),
    array('a' => 'd', 'c'=>'f'),
);
array_multisort($x);
var_dump($x);
?>
<?php
function cmp($a, $b)
{
    return strcmp($a["fruit"], $b["fruit"]);
}

$fruits[0]["fruit"] = "lemons";
$fruits[1]["fruit"] = "apples";
$fruits[2]["fruit"] = "grapes";
var_dump($fruits);
usort($fruits, "cmp");

while (list($key, $value) = each($fruits)) {
    echo "\$fruits[$key]: " . $value["fruit"] . "\n";
}

?>
Сортировка по столбцам (multisort)
<?php
$data = array(
    array('id'=>1, 'name'=>'Иван', 'surname'=>'Иванов'),
    array('id'=>2, 'name'=>'Андрей', 'surname'=>'Иванов'),
    array('id'=>3, 'name'=>'Петр', 'surname'=>'Иванов'),
    array('id'=>4, 'name'=>'Петр', 'surname'=>'Петров'),
    array('id'=>5, 'name'=>'Сергей', 'surname'=>'Петров'),
    array('id'=>6, 'name'=>'Михаил', 'surname'=>'Петров'),
    array('id'=>7, 'name'=>'Федор', 'surname'=>'Петров'),
    array('id'=>8, 'name'=>'Иван', 'surname'=>'Сидоров'),
    array('id'=>9, 'name'=>'Максим', 'surname'=>'Сидоров'),
    array('id'=>10, 'name'=>'Павел', 'surname'=>'Сидоров'));

foreach ($data as $key => $row) {
    $name[$key]  = $row['name'];
    $surname[$key] = $row['surname'];
}
array_multisort($surname, SORT_DESC, $name, SORT_ASC, $data);
foreach($data as $row) {
    echo $row['surname'].' '.$row['name'].'<br/>';
}
?>
<?php

//понедельник прошлой недели
echo date("Y m d ", strtotime("last Monday")).'--понедельник прошлой недели<br/>';
//воскресенье прошлой недели
echo date("Y m d ", strtotime("last Sunday")).'--воскресенье прошлой недели<br/>';
//понедельник позапрошлой недели
echo date("Y m d H:i:s", strtotime(date("d.m.Y H:i:s")." last Monday last Monday")).'--понедельник позапрошлой недели<br/>';
//понедельник прошлой недели от заданной даты 2017-01-30
echo date("Y m d H:i:s", strtotime(date("d.m.Y H:i:s", mktime(0, 0, 0, 1, 30, 2017))." last Monday")).'--понедельник прошлой недели от заданной даты 2017-01-30<br/>';
?>
<?php
echo strtotime("now"), "\n".'<br/>';
echo strtotime("10 September 2000"), "\n\t".'<br/>';
echo strtotime("+1 day"), "\n".'<br/>';
echo strtotime("+1 week"), "\n".'<br/>';
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n".'<br/>';
echo strtotime("next Thursday"), "\n".'<br/>';
echo strtotime("last Monday"), "\n".'<br/>';
?>
<?php
echo $tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")).'$tomorrow<br/>';
echo $lastmonth = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y")).'$lastmonth<br/>';
echo $nextyear  = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1).'$nextyear<br/>';
echo date("Y m d H:i:s", mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1));
?>
