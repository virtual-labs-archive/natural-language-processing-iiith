<html>
<head>
<script class='gtm'>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-W59SWTR');</script>

</head>
<body>
<?php

$turn=$_GET['turn'];
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

echo "<table align ='center' style=\"background-color:#FFD4A8\" id='viterbiDecoding_ans' width=\"50%\">
<tr>
<td></td>";
	$cnt=0;
	$words=explode(" ",$sentence);
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
		echo "</tr>";
		$cnt=$cnt+1;
	}
echo "</table>";

?>
</body>
</html>
