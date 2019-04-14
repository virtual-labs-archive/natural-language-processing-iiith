<html>
<head>
</head>
<body>
<?php
$corpus=$_GET['corpus'];
$fp=fopen("./Exp5/emission-transmission/".$corpus,"r");
$pos=array();
$viterbi_matrix=array();
$tag=array();
$sentence="";
array_push($pos,"eos");
while(!feof($fp))
{
	$str=fgets($fp);
	$token=explode("\t",$str);
	foreach ($token as $a)
	{
		$b=str_replace("\n","",$a);
		if(strlen($b)==0)
			continue;
		if($cnt==2)
			array_push($pos,$b);
		if($cnt==5)
			$sentence=$b;
		if($cnt==6)
			array_push($viterbi_matrix,(float)$b);
		if($cnt==7)
			array_push($tag,$b);
	}
	if($str=="\n")
		$cnt=$cnt+1;
}

$words=explode(" ",$sentence);

$max=array();
for($i=0;$i<sizeof($words);$i=$i+1){
	array_push($max,0);}

for($j=0;$j<sizeof($words);$j=$j+1)
	for($i=0;$i<sizeof($pos)-1;$i=$i+1)
		if($max[$j]<$viterbi_matrix[$i*(sizeof($words))+$j])
			$max[$j]=$viterbi_matrix[$i*(sizeof($words))+$j];

echo "<tr>
<td></td>";
$cnt=0;
foreach ($words as $a)
	echo "<td align='center'><b>".$a."</b></td>";
echo "</tr>";
$cnt=0;
foreach ($pos as $a)
{
	if($cnt==0)
	{
		$cnt=$cnt+1;
		continue;
	}
	echo "<tr>";
	$cnt1=0;
	echo "<td align='center'><b>".$a."</b></td>";
	foreach ($words as $b)
	{
		echo "<td align='center'";
		if($viterbi_matrix[($cnt-1)*(sizeof($words))+$cnt1]==$max[$cnt1])
			echo " > <font size='3' color='#008800'><b>".$viterbi_matrix[($cnt-1)*(sizeof($words))+$cnt1]."</b<</font>";
		else
			echo ">".$viterbi_matrix[($cnt-1)*(sizeof($words))+$cnt1];
		echo "</td>";
		$cnt1=$cnt1+1;
	}
	echo "</tr>";
	$cnt=$cnt+1;
}

#echo "<tr><td></td></tr><tr><td></td></tr>";
/*echo "<tr><td align='center'><b>POS tags</b></td>";
$cnt=0;
foreach ($words as $b)
{
	echo "<td align='center' style='color:#008000;font-size:15px'><b>".$tag[$cnt]."</b></td>";
	$cnt=$cnt+1;
}*/
echo "</tr>";
$cnt=0;
echo "POS tags for the words in the sentence are as following:";
foreach( $words as $b)
{
	echo "<p style=\"color:green;font-style:italic;\">".$b." is ".$tag[$cnt]."</p><br />";
	$cnt = $cnt + 1;
}
?>
</body>
</html>
<!-- 
Editd By harsha:
Commented from  78 - 84
added from 86 - 92
-->
