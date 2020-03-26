<html>
<head>
<script class='gtm'>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-W59SWTR');</script>

</head>
<body>
<?php

$word;
if(isset($_GET['word']))
	$word=$_GET['word'];

$fp=fopen("features.txt","r");
$wor=array();

print "<br/><table id='outputT' width=\"100%\" bgcolor=#FFD4A8 >
<tr>
<th>WORD</th>
<th>ROOT</th>
<th>CATEGORY</th>
<th>GENDER</th>
<th>NUMBER</th>
<th>PERSON</th>
<th>CASE</th>
<th>TENSE</th>
<th></th>
</tr>";

while(!feof($fp))
{
	$str=fgets($fp);
	$str=str_replace("\n","\t",$str);
	$try=explode("\t",$str);
	if($try[0]==$word)
	{
		echo "<tr>";
		echo "<td align='center' style='color:red;font-weight:bold'>".$try[0]."</td>";
		echo "<td align='center' > ".$try[1]."</td>";
		echo "<td align='center' > ".$try[2]."</td>";
		echo "<td align='center' > ".$try[3]."</td>";
		echo "<td align='center' > ".$try[4]."</td>";
		echo "<td align='center' > ".$try[6]."</td>";
		echo "<td align='center' > ".$try[5]."</td>";
		echo "<td align='center' > ".$try[9]."</td>";
		print "</tr>";
	}
}
print "</table>";

?>
</body>
</html>
