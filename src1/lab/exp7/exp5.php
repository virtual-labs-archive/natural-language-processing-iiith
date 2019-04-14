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
function checkValue(corpus,wordSize,posSize,turn,empty){
	var i;
	var viterbi=new Array();
	for (i=0;i<posSize-1;i=i+1)
	{
		try{
		var str="v";
		viterbi[i]=document.getElementById(str.concat(i.toString())).value;
		viterbi[i]=viterbi[i].replace(/ /g,"");}
		catch(err){}
	}
	if(empty==0)
		$('#fldiv').load('exp5.php?viterbi='+viterbi+'&turn='+turn+'&corpus='+corpus);
	else
		$('#fldiv').load('exp5.php?viterbi=%&turn='+turn+'&corpus='+corpus);
	return false;
}

function showCorrect(corp){
	document.getElementById("right_wrong").innerHTML="";
	$('#viterbiDecoding').load('exp5_pos.php?corpus='+corp);
	document.getElementById("buttons").innerHTML="";
	return false;
}

function getAnswer(corpus,turn)
{
	document.getElementById("get_hide").innerHTML="<button onclick=\"hideAnswer('"+corpus+"','"+turn+"');\">Hide Answer</button>";
	$('#answer').load('exp5_answer.php?corpus='+corpus+'&turn='+turn);
}

function hideAnswer(corpus,turn)
{
	document.getElementById("get_hide").innerHTML="<button onclick=\"getAnswer('"+corpus+"','"+turn+"');\">Get Answer</button>";
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

$viterbi = explode(",", $_GET['viterbi']);
$turn=$_GET['turn'];
$flag=1;
if($_GET['viterbi']=="%")
	$flag=0;
$corpus=$_GET['corpus'];
$fp=fopen("./Exp5/emission-transmission/".$corpus,"r");
$cnt=0;
$cnt1=0;
$words=array();
$pos=array();
$emission_matrix=array();
$transmission_matrix=array();
$viterbi_matrix=array();
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
		if($cnt==1)
			array_push($words,$b);
		if($cnt==2)
			array_push($pos,$b);
		if($cnt==3)
			array_push($emission_matrix,$b);
		if($cnt==4)
			array_push($transmission_matrix,$b);
		if($cnt==5)
			$sentence=$b;
		if($cnt==6)
			array_push($viterbi_matrix,$b);
	}
	if($str=="\n")
		$cnt=$cnt+1;
}
echo "<table width=\"100%\" style=\"background-color:#FFD4A8; padding:0px; margin:0px\">
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
			echo "<td align='center'>";
			$prob2=$emission_matrix[($cnt-1)*(sizeof($words))+$cnt1];
			echo $prob2;
			echo "</td>";
			$cnt1=$cnt1+1;
		}
		echo "</tr>";
		$cnt=$cnt+1;
	}
	echo "</table>
</td></tr></table>";

echo "<br/><br/><br/>
<table width=\"100%\" style=\"background-color:#FFD4A8; padding:0px; margin:0px\">
<tr>
<th>Transition Matrix</th>
</tr>
<tr>
<td align='center'>";
echo "<table width=\"100%\" style=\"margin:0px; padding:0px\">
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
			echo "<td align='center'>";
			$prob2=$transmission_matrix[($cnt)*(sizeof($pos))+$cnt1];
			echo $prob2;
			$cnt1=$cnt1+1;
			echo "</td>";
		}
		echo "</tr>";
		$cnt=$cnt+1;
	}
	echo "</table>
</td>
</tr>
</table>";

echo "<br/><br/><br/>";

echo "<b>Viterbi Decoding</b><br/><br/>";
echo "<b>Sentence:</b> ".$sentence."</td></tr>";

//186 line by harsha
echo "<p style=\"color:blue;font-style:oblique;\">You can answer a column only if you have completed the previous ones.(note:answer can also be upto three decimals)</p>";
echo "<table align ='center' style=\"background-color:#FFD4A8;\" border=\"0\" id='viterbiDecoding' width=\"50%\">
<tr>
<td></td>";
	$cnt=0;
	$words=explode(" ",$sentence);
	foreach ($words as $a)
		echo "<td align='center'><b>".$a."</b></td>";
	echo "</tr>";
	$cnt=0;
	$flag_col=0;
	foreach ($pos as $a)
	{
		if($cnt==0)
		{
			$cnt=$cnt+1;
			continue;
		}
		$cnt1=0;
		foreach ($words as $b)
		{
			$flag_chk=0;
			if($turn==$cnt1+1)
			{
				if($flag==1)
				{
					$prob1=$viterbi[$cnt-1];
					$prob2=$viterbi_matrix[($cnt-1)*(sizeof($words))+$cnt1];
					try{
					//$prob1_f=(float)$prob1;
					//$prob2_f=(float)$prob2;
					$prob1_f=calculator($prob1);
					$prob2_f=calculator($prob2);
					}
					catch(Exception $e){
					$flag_chk=1;}
					$prob1_f=(string)round($prob1_f,3);
					$prob2_f=(string)round($prob2_f,3);
					$temp=1;
					if (preg_match("/[^0-9\ \.\(\)\+\-\*\/]/",$prob1)==1)
						$temp=0;
					//if($prob1_f!=$prob2_f or ctype_alpha($prob1) or strlen($prob1)==0)
					if($prob1_f!=$prob2_f or $temp==0 or strlen($prob1)==0)
						$flag_chk=1;
				}
				else
					$flag_col=1;
				if($flag_chk==1)
					$flag_col=1;
			}
			$cnt1=$cnt1+1;
		}
		$cnt=$cnt+1;
	}
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
		if($flag_col==0)
		{
			foreach ($words as $b)
			{
				$temp='v'.(string)($cnt-1);
				if($turn>=$cnt1+1)
				{
					echo "<td align='center'>";
					echo $viterbi_matrix[($cnt-1)*(sizeof($words))+$cnt1];
					echo "</td>";
				}
				else
					echo "<td align='center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
				$cnt1=$cnt1+1;
			}
		}
		else
		{
			foreach ($words as $b)
			{
				$prob1;
				$prob2;
				$prob1_f;
				$prob2_f;
				$tmp;
				$flag_chk=0;
				$temp='v'.(string)($cnt-1);
				if($turn>$cnt1+1)
				{
					echo "<td align='center'>";
					echo $viterbi_matrix[($cnt-1)*(sizeof($words))+$cnt1];
					echo "</td>";
					$cnt1=$cnt1+1;
				}
				else if($turn==$cnt1+1)
				{
					if($flag==1)
					{
						$prob1=$viterbi[$cnt-1];
						$prob2=$viterbi_matrix[($cnt-1)*(sizeof($words))+$cnt1];
						try{
						//$prob1_f=(float)$prob1;
						//$prob2_f=(float)$prob2;
						$prob1_f=calculator($prob1);
						$prob2_f=calculator($prob2);
						}
						catch(Exception $e){
						$flag_chk=1;}
						$prob1_f=(string)round($prob1_f,3);
						$prob2_f=(string)round($prob2_f,3);
						$tmp=1;
						if (preg_match("/[^0-9\ \.\(\)\+\-\*\/]/",$prob1)==1)
							$tmp=0;
						//if($prob1_f!=$prob2_f or ctype_alpha($prob1) or strlen($prob1)==0)
						if($prob1_f!=$prob2_f or $tmp==0 or strlen($prob1)==0)
							$flag_chk=1;
					}
					if($flag==0)
					{
						echo "<td align='center'><input type='text' name='".$temp."' id='".$temp."' onclick=change(); style='width:30px";
						echo "' align='center' value='";
						echo "0' /></td>";
					}
					else
					{
						if($flag_chk==1)
						{
							echo "<td align='center'><input type='text' name='".$temp."' id='".$temp."' onclick=change(); style='width:30px;background-color:#FF0000";
							echo "' align='center' value='";
							if ($tmp==0 or strlen($prob1)==0)
								echo $prob1."'";
							else
								echo $prob1_f."'";
							//echo $viterbi[$cnt-1]."'";
							echo "/></td>";
						}
						else
						{
							echo "<td align='center'><input type='text' name='".$temp."' id='".$temp."' onclick=change(); style='width:30px";
							echo "' align='center' value='";
							echo $viterbi_matrix[($cnt-1)*(sizeof($words))+$cnt1]."'";
							echo "/></td>";
						}
					}
					$cnt1=$cnt1+1;
				}
				else
				{
					echo "<td align='center'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
					$cnt1=$cnt1+1;
				}
			}
		}
		echo "</tr>";
		$cnt=$cnt+1;
	}
echo "</table>";

if($flag_col==1 || $flag==0)
{
	echo "<br/><br/><button onclick=\"checkValue('".$corpus."','".sizeof($words)."','".sizeof($pos)."','".$turn."','0');\">Check</button>";
	if($flag!=0)
	{
		echo "<br/><br/><p style='color:#FF0000;font-size:30px' id='right_wrong'>Wrong Answer!!!</p>";
		echo "<br/><br/><div id='get_hide'><button onclick=\"getAnswer('".$corpus."','".$turn."');\">Get Answer</button></div>";
	}	
}
else if($flag_col==0)
{
	$turn=$turn+1;
	if($turn<=sizeof($words))
	{
		echo "<br/><br/><button onclick=\"checkValue('".$corpus."','".sizeof($words)."','".sizeof($pos)."','".$turn."','1');\">Go to Next Step</button>";
		echo "<br/><br/><p style='color:#008000;font-size:30px' id='right_wrong'>Right Answer!!!</p>";
	}
	else if($turn==sizeof($words)+1)
	{
		echo "<div id='buttons'><br/><br/><button onclick=\"showCorrect('".$corpus."');\">Check Part of Speech</button></div>";
		echo "<br/><br/><p style='color:#008000;font-size:30px' id='right_wrong'>Right Answer!!!</p>";
	}
}

echo "<br/><br/><div align=\"center\" id='answer'></div>";

?>
</body>
</html>
