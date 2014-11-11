<html>
<head>
<style type="text/css">
.spmHandler {
   background: transparent;
   padding: 5px;
   border: 0px ;


}
</style>
<script type="text/javascript">
function checkValue(corpus,wordSize,posSize){
	var i;
	var emission=new Array();
	for (i=0;i<wordSize*(posSize-1);i=i+1)
	{
		var str="e";
		emission[i]=document.getElementById(str.concat(i.toString())).value;
		emission[i]=emission[i].replace(/ /g,"");
	}
	var transmission=new Array();
	for (i=0;i<posSize*posSize;i=i+1)
	{
		var str="t";
		transmission[i]=document.getElementById(str.concat(i.toString())).value;
		transmission[i]=transmission[i].replace(/ /g,"");
	}
	$('#fldiv').load('exp4.php?emission='+emission+'&transmission='+transmission+'&corpus='+corpus);
	return false;
}

function getAnswer(corpus,flag_emission,flag_transmission)
{
	document.getElementById("get_hide").innerHTML="<button onclick=\"hideAnswer('"+corpus+"','"+flag_emission+"','"+flag_transmission+"');\">Hide Answers</button>";
	$('#answer').load('exp4_answer.php?corpus='+corpus+'&flag_emission='+flag_emission+'&flag_transmission='+flag_transmission);
}

function hideAnswer(corpus,flag_emission,flag_transmission)
{
	document.getElementById("get_hide").innerHTML="<button onclick=\"getAnswer('"+corpus+"','"+flag_emission+"','"+flag_transmission+"');\">Get Answers</button>";
	document.getElementById("answer").innerHTML="";
}

function change()
{
	document.getElementById("right_wrong").innerHTML="";
	document.getElementById("get_hide").innerHTML="";
	document.getElementById("answer").innerHTML="";
}

</script>
</head>
<body>
<?php

function calculator($str){
	eval("\$str = $str;");
	return $str;
}

$flag_chk_emission=1;
$flag_chk_transmission=1;
$emission = explode(",", $_GET['emission']);
$transmission = explode(",", $_GET['transmission']);
$flag=1;
if($_GET['emission']=="%")
	$flag=0;
if($_GET['transmission']=="%")
	$flag=0;
$corpus=$_GET['corpus'];
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
echo "<table style=\"background-color:#FFD4A8; padding:0px; margin:0px\">
<tr>
<th>Emission Matrix</th>
</tr>
<tr>
<td align='center'>
	<table width=\"100%\" style=\"padding:0px; margin:0px\">
	<tr>
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
			$temp='e'.(string)(($cnt-1)*(sizeof($words))+$cnt1);
			echo "<td align='center'><input type='text' name='".$temp."' id='".$temp."' onclick=change(); style='width:30px";
			$prob1_f;
			$prob2_f;
			$tmp;
			if($flag==1)
			{
				$prob1=$emission[($cnt-1)*(sizeof($words))+$cnt1];
				$prob2=$emission_matrix[($cnt-1)*(sizeof($words))+$cnt1];
				try{
				$prob1_f=calculator($prob1);
				$prob2_f=calculator($prob2);
				}
				catch(Exception $e){
				echo ";background-color:#FF0000";
				$flag_chk_emission=0;}
				$prob1_f=(string)round($prob1_f,2);
				$prob2_f=(string)round($prob2_f,2);
				$temp=1;
				if (preg_match("/[^0-9\ \.\(\)\+\-\*\/]/",$prob1)==1)
					$temp=0;
				if($prob1_f!=$prob2_f or $temp==0 or strlen($prob1)==0){
					echo ";background-color:#FF0000";
					$flag_chk_emission=0;
				}
			}
			echo "' align='center' value='";
			if($flag==0)
				echo "0' /></td>";
			else
			{
				$temp=1;
				if (preg_match("/[^0-9\ \.\(\)\+\-\*\/]/",$prob1)==1)
					$temp=0;
				if ($temp==0 or strlen($prob1)==0)
					echo $prob1."'";
				else
					echo $prob1_f."'";
				echo "/></td>";
				
			}
			$cnt1=$cnt1+1;
		}
		echo "</tr>";
		$cnt=$cnt+1;
	}
	echo "</table>
</td></tr></table>";
echo "<br/><br/><br/>";
echo "<table style=\"background-color:#FFD4A8; padding:0px; margin:0px\">
<tr>
<th>Transition Matrix</th>
</tr>
<tr>
<td align='center'>";
echo "<table width=\"100%\" style=\"padding:0px; margin:0px\">
	<tr>
	<td></td>";
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
			$temp="t".(string)($cnt*(sizeof($pos))+$cnt1);
			echo "<td align='center'><input type='text' name='".$temp."' id='".$temp."' onclick=change(); style='width:30px";
			if($flag==1)
			{
				$prob1=$transmission[($cnt)*(sizeof($pos))+$cnt1];
				$prob2=$transmission_matrix[($cnt)*(sizeof($pos))+$cnt1];
				$prob1_f;
				$prob2_f;
				try{
				$prob1_f=calculator($prob1);
				$prob2_f=calculator($prob2);
				}
				catch(Exception $e){
				echo ";background-color:#FF0000";
				$flag_chk_transmission=0;}
				$prob1_f=(string)round($prob1_f,2);
				$prob2_f=(string)round($prob2_f,2);
				$temp=1;
				if (preg_match("/[^0-9\ \.\(\)\+\-\*\/]/",$prob1)==1)
					$temp=0;
				if($prob1_f!=$prob2_f or $temp==0 or strlen($prob1)==0){
					echo ";background-color:#FF0000";
					$flag_chk_transmission=0;
				}
			}
			echo "' align='center' value='";
			if($flag==0)
				echo "0' /></td>";
			else
			{
				$temp=1;
				if (preg_match("/[^0-9\ \.\(\)\+\-\*\/]/",$prob1)==1)
					$temp=0;
				if ($temp==0 or strlen($prob1)==0)
					echo $prob1."'";
				else
					echo $prob1_f."'";
				echo "/></td>";
			}
			$cnt1=$cnt1+1;
		}
		echo "</tr>";
		$cnt=$cnt+1;
	}
	echo "</table>
</td>
</tr>
</table>";
echo "<br/><br/>
<button onclick=\"checkValue('".$corpus."','".sizeof($words)."','".sizeof($pos)."');\">Check</button>";

if($flag_chk_emission==1 and $flag_chk_transmission==1 and $_GET['emission']!="%" and $_GET['transmission']!="%")
{
	echo "<br/><br/><p id='right_wrong' style='text-align:center;font-size:30px;color:#008000'>Right answer!!!</p>";
}
else if($flag_chk_emission==0 and $flag_chk_transmission==0)
{
	echo "<br/><br/><p id='right_wrong' style='text-align:center;font-size:30px;color:#FF0000'>Wrong Emission and Transition Matrix!!!</p>";
	echo "<br/><br/><div id='get_hide'><button onclick=\"getAnswer('".$corpus."','0','0');\">Get Answers</button></div>";
}
else if($flag_chk_emission==0)
{
	echo "<br/><br/><p id='right_wrong' style='text-align:center;font-size:30px;color:#FF0000'>Wrong Emission Matrix!!!</p>";
	echo "<br/><br/><div id='get_hide'><button onclick=\"getAnswer('".$corpus."','0','1');\">Get Answers</button></div>";
}
else if($flag_chk_transmission==0)
{
	echo "<br/><br/><p id='right_wrong' style='text-align:center;font-size:30px;color:#FF0000'>Wrong Transition Matrix!!!</p>";
	echo "<br/><br/><div id='get_hide'><button onclick=\"getAnswer('".$corpus."','1','0');\">Get Answers</button></div>";
}
echo "<br/><br/><div align=\"center\" id='answer'></div>";

?>
</body>
</html>
