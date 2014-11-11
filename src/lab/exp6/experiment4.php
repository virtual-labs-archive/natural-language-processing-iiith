<html>
<head>
<script type="text/javascript" src='jquery.js'></script>
<script type="text/javascript">
function getOption(temp){
	temp1=temp.split("_");
	text=temp1[0];
	corp=temp1[1];
	document.getElementById("corpus").innerHTML="";
	document.getElementById("fldiv").innerHTML="";
	if(text=='null' && corp=='null')
	{
		alert('Select corpus');
		return;
	}
	document.getElementById("corpus").innerHTML="<br>"+text+"<br>";
	$('#fldiv').load('exp4.php?corpus='+corp+"&emission=%&transmission=%");
}

</script>
</head>
<body>
<?php
$file=scandir("./Exp4/corpus");
echo '<select name="options" autocomplete="off" onchange="getOption(this.value);">';
echo "<option selected='selected' value='null_null'>---Select Corpus---</option>";
$count="A";
foreach ($file as $a)
	if ($a!="." and $a!=".." and $a!==".svn")
	{
		echo "<option ";
		$fp=fopen("./Exp4/corpus/".$a,"r");
		$content=fgets($fp);
		$content=str_replace("\n","",$content);
		$temp=explode(" ",$content);
		$content="";
		foreach ($temp as $b)
		{
			$temp1=explode("/",$b);
			if ($temp1[0]=="EOS")
				$content=$content.$temp1[0]."/".$temp1[1]." ";
			else
				$content=$content."<b>".$temp1[0]."</b>/".$temp1[1]." ";
		}
		//echo $content."\n";
		echo "value='".$content."_".$a."'>Corpus ".$count."</option>";
		fclose($fp);
		$count++;
	}
echo "</select>";
echo "<br/><div align='center' id='corpus'></div>";
echo "<br/><div align='center' id='fldiv'></div>";
?>
</body>
</html>
