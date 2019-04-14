<html>
<head>
<script type="text/javascript" src='jquery.js'></script>
<script type="text/javascript">

function bigramTable(bigrams, order, file){
var b=bigrams.split(",");
var c=order.split(",");
$('#table').load('experiment9-1.php', {bigrams:bigrams, order:order, file:file});
}
</script>
</head>
<body>
<?php

$f=$_GET['fileno'];
$file=$f.'.txt';
$full_path='Exp9/'.$file;
$f1 =  fopen($full_path, "r");
$buffer=fread($f1, filesize($full_path));
$parts=split("&", $buffer); 
$corpus=$parts[0];      
$bigrams=$parts[1];
$order=$parts[2]; 
?>
<br/> <br/>
<?php 
echo "<p align='center'>".$corpus."<br/>";
echo "<br/><button onclick=\"bigramTable('".$bigrams."', '".$order."', '".$f."');\"> Find Bigram Probabilities</button></p>";
echo "<div id='table'></div>";
echo "<br/><div align='center' id='corpus'></div>";

?>
</body>
</html>
