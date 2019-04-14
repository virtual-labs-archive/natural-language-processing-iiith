<html>
<head>
<script type="text/javascript" src='jquery.js'></script>
<script type="text/javascript">
function getAccuracy(accuracy){
	document.getElementById("accuracy_ans").innerHTML="<b>Accuracy is: </b>"+accuracy;
}

</script>
</head>
<body>
<?php

$language=$_GET['language'];
$token_final=$_GET['token'];
$algo_final=$_GET['algo'];
$feature_final=$_GET['feature'];
$feature_final=str_replace("_"," ",$feature_final);

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

echo "<div style=\"color:blue; font-style:italic\">Training is completed<br/><br/><br/>
Now, we have to do testing, a corpus of size ".$test_token[0]." is chosen<br/<br/><br/>
Check the accuracy<br/></div>";
echo "<button onclick=\"getAccuracy(".$accuracy[$token_final.$type_final.$algo_final.$feature_final].");\">Check Accuracy</button>";

echo "<br/><br/>
<div id=\"accuracy_ans\"></div>";


?>
</body>
</html>
