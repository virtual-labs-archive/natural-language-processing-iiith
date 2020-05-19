<html>
<head>
<script class='gtm'>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-W59SWTR');</script>

<script type="text/javascript" src='jquery.js'></script>
<script type="text/javascript">
function getOption(temp){
	temp1=temp.split("_");
	text=temp1[0];
	corp=temp1[1];
	document.getElementById('corpus').innerHTML="";
	document.getElementById('fldiv').innerHTML="";
	if(text=='null' && corp=='null')
	{
		alert('Select corpus');
		return;
	}
	document.getElementById("corpus").innerHTML="<br>"+text+"<br>";
	$('#fldiv').load('exp5.php?corpus='+corp+"&viterbi=%&turn=1");
}

</script>
</head>
<body>
<?php
$file=scandir("./Exp5/emission-transmission");
echo "<table width='100%'>";
echo "<tr>";
echo "<td align='center'>";
echo '<select name="option" onchange="getOption(this.value);">';
echo "<option value='null_null'>---Select Corpus---</option>";
$count="A";
foreach ($file as $a)
	if ($a!="." and $a!=".." and $a!==".svn")
	{
		echo "<option ";
		$fp=fopen("./Exp5/emission-transmission/".$a,"r");
		$content=fgets($fp);
		$content=str_replace("\n","",$content);
		echo "value='".$content."_".$a."'>Corpus ".$count."</option>";
		fclose($fp);
		$count++;
	}
echo "</select>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<br/><div align='center' id='corpus'></div>";
echo "<br/><div align='center' id='fldiv'></div>";

?>
</body>
</html>
