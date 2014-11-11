<html>
<head>
</head>
<body>
<?php

$corpus;
if(isset($_GET['corpus']))
	$corpus=$_GET['corpus'];

$flag_emission;
if(isset($_GET['flag_emission']))
	$flag_emission=$_GET['flag_emission'];

$flag_transmission;
if(isset($_GET['flag_transmission']))
	$flag_transmission=$_GET['flag_transmission'];

$fp=fopen("./Exp4/corpus/".$corpus,"r");
$cnt=0;
$cnt1=0;
$words=array();
$pos=array();
$emission_matrix=array();
$transmission_matrix=array();
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
		if($cnt==1)
			array_push($words,$b);
		if($cnt==2)
			array_push($pos,$b);
		if($cnt==3)
			array_push($emission_matrix,$b);
		if($cnt==4)
			array_push($transmission_matrix,$b);
	}
	if($str=="\n")
		$cnt=$cnt+1;
}


if($flag_emission==0)
{
	echo "<table width=\"100%\" style=\"background-color:#FFD4A8; padding:0px; margin:0px\">
	<tr>";
	echo "<th>Emission Matrix</th>";
	echo "</tr><tr>";
	echo "<td align='center'>";
	echo "<table width=\"100%\" style=\"padding:0px; margin:0px\">";
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
			echo "<td align='center'>".$emission_matrix[($cnt-1)*(sizeof($words))+$cnt1]."</td>";
			$cnt1=$cnt1+1;
		}
		echo "</tr>";
		$cnt=$cnt+1;
	}
	echo "</table>
	</td></tr></table>";
}
echo "<br/><br/><br/>";
if($flag_transmission==0)
{
	echo "<table width=\"100%\" style=\"background-color:#FFD4A8; padding:0px; margin:0px\">
	<tr>";
	echo "<th>Transition Matrix</th>";
	echo "</tr><tr>";
	echo "<td align='center'>";
	echo "<table width=\"100%\" style=\"padding:0px;margin:0px\">";
	echo "<tr>";
	echo "<td></td>";
	$cnt=0;
	foreach ($pos as $a)
		echo "<td align='center'><b>".$a."</b></td>";
	echo "</tr>";
	$cnt=0;
	foreach ($pos as $a)
	{
		echo "<tr>";
		$cnt1=0;
		echo "<td align='center'><b>".$a."</b></td>";
		foreach ($pos as $b)
		{
			echo "<td align='center'>".$transmission_matrix[$cnt*(sizeof($pos))+$cnt1]."</td>";
			$cnt1=$cnt1+1;
		}
		echo "</tr>";
		$cnt=$cnt+1;
	}
	echo "</table>
	</td></tr></table>";
}

?>
</body>
</html>
