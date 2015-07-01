<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>quiz</title>
</head>

<body>
<p>
Q1. Add-one smoothing works horribly in practice because of giving too much probability mass to unseen n-grams. Prove using an example. <br/>
Q2. In Add-&delta; smoothing, we add a small value '&delta;' to the counts instead of one. Apply Add-&delta; smoothing to the below bigram count table where &delta;=0.02.<br/><br/>
<?php
$full_path='./Exp10/quiz/1.txt';
$f1 =  fopen($full_path, "r");
$buffer=fread($f1, filesize($full_path));
$parts=split("&", $buffer); 
$counts=$parts[0];      
$order=$parts[1];
$info=$parts[2];
$c=explode(",", $counts); 
$o=explode(",", $order);
$in=explode(",", $info);
$size=count($o);?>

<table cellspacing="-2" cellpadding="4" border="1" style="text-align:center;">
<tr><th></th>
<?php 
for($i=0;$i<$size;$i++)
         echo "<th>".$o[$i]."</th>";
echo '</tr>';
$i=0;
for($k=0;$k<$size;$k++) 
{  
   echo "<tr><th>".$o[$k]."</th>";
   for($j=0;$j<$size;$j++)
   {           echo "<td>".$c[$j+$k*$size]."</td>";
               $i++;
   }

   echo "</tr>"; 
} 
echo "</table><br/>";
echo "<p style=\"font-size:130%\">N = ".$in[0]."   V = ".$in[1]."</p><br/><br/>";
?>

Q3. Given S = Dickens read a book, find P(S) <br/>
	(a) using unsmoothed probability <br/>
	(b) applying Add-One smoothing. <br/>
	(c) applying Add-&delta; smoothing <br/>
</p>
</body>
</html>
