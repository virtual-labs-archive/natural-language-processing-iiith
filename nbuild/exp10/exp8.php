<html>
<head>
<script type="text/javascript" src='jquery.js'></script>
<script type="text/javascript">
function change(lang){
	document.getElementById("algorithm").innerHTML="";
	var train=document.getElementById('train').value;
	if(train=="null")
	{
		alert("Select Size of a corpus");
		return;
	}
	train=train.replace(/ /g,"");
	document.getElementById("training-size").innerHTML="<input type='text' value='"+train+"' readonly>";
	$('#algorithm').load('exp8_1.php?language='+lang+'&token='+train);
}

</script>
</head>
<body>
<?php

$language=$_GET['language'];
$fp;
if($language=='hin')
	$fp=fopen("analyse-size-chunk/accuracies_hindi","r");

else if($language=='eng')
	$fp=fopen("analyse-size-chunk/accuracies_english","r");

$train_token=array();
$train_type=array();
$algo=array();
$test_token=array();
$test_type=array();
$feature=array();
$accuracy;
$count=0;

while(!feof($fp))
{
	$str=fgets($fp);
	$str=str_replace("\n","",$str);
	$str=str_replace("_"," ",$str);
	if(strlen($str)==0)
		continue;
	$token=explode("\t",$str);
	$temp=$token[0].$token[1].$token[2].$token[3];
	$accuracy[$temp]=$token[6];
	if(!in_array($token[0],$train_token))
		array_push($train_token,$token[0]);
	if(!in_array($token[1],$train_type))
		array_push($train_type,$token[1]);
	if(!in_array($token[2],$algo))
		array_push($algo,$token[2]);
	if(!in_array($token[3],$feature) and $token[3]!='none')
		array_push($feature,$token[3]);
	if(!in_array($token[4],$test_token))
		array_push($test_token,$token[4]);
	if(!in_array($token[5],$test_type))
		array_push($test_type,$token[5]);
	$count=$count+1;
}

echo "<div style=\"color:blue; font-style:italic\">First step is to train a corpus, select the size of a corpus<br/>
<div id=\"training-size\">
<select name='train' id='train' onchange=change('".$language."')>
<option value='null'>---Select Size of Training corpus---</option>";
$count=0;
foreach ($train_token as $a)
{
	$count=$count+1;
	echo "<option value='".$a." ".$train_type[$count-1]."'";
	echo ">".$a."</option>";
}
echo "</select></div></div>";
echo "<br/><br/><div id='algorithm'></div>";


?>
</body>
</html>
