<!doctype html>
<head>
    <title>php program</title>
    </head>
<body>
    

    <!--using string functions-->

    <?php
    $s = "hello world!";
    echo strlen($s);
    ?>

// using str_word_count

<?php
$d = "jai shree ram ";
echo str_word_count($d);
?>

//str_contains
<?php
$p = "heloo bro!";
var_dump(str_contains($p,"bro"));

?>

//using str_end_with and starts_with
<?php
$nam = "This is a php";
var_dump(str_ends_with($nam,"php"));
?>
<?php
$nam = "This is a php";
echo (str_starts_with($nam,"This"));
?>

// using strtoupper()
<?php 
$s = "scrioting language";
echo strtoupper($s);
?>

// using strtolower()
<?php 
$s = "ASHWIK JAIS";
echo strtolower($s);
?>

<!--  using str_replace() -->
<?php 
$si = "scrioting php";
echo str_replace("scrioting","hiding ", $si);
?>

<!-- strin concatenation isme dot(.)ka use 
krke combine kr skte saari variables -->
<?php
$a = "bangla";
$b = "bhoot";
$c = 2;
$f = 67.55;
echo ($b." ".$a." ".$c." ".$f);
?>
</body>
</html>