<?php
$counter_file = "counter.txt";
$count = intval(file_get_contents($counter_file));
$count++;
file_put_contents($counter_file, $count);
echo $count;
?>
