<html>
<head>
<script class='gtm'>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-W59SWTR');</script>

<script type="text/javascript" src='jquery.js'></script>
<script type="text/javascript">

function getAnswer(word)
{
	document.getElementById("get_hide").innerHTML="<button onclick=\"hideAnswer('"+word+"');\">Hide Answer</button> <br><br><p style='font-size:20px' > <b>Answer</b>: "+word+"</p>";
}

function hideAnswer(word)
{
	document.getElementById("get_hide").innerHTML="<button onclick=\"getAnswer('"+word+"');\">Get Answer</button>";
}

</script>
</head>
<body>
<?php

$word=$_GET['index'];
$root=$_GET['root'];
$category=$_GET['category'];
$gender=$_GET['gender'];
$number=$_GET['form'];
$person=$_GET['person'];
$tense=$_GET['tense'];
$case=$_GET['reference'];
$fp=fopen("features.txt","r");
$flag=0;
$myWord="%";
while(!feof($fp))
{
	$string=fgets($fp);
	$string=str_replace("\n","\t",$string);
	$try=explode("\t",$string);
	if($try[1]==$root and $try[2]==$category and $try[3]==$gender and $try[4]==$number and $try[5]==$case and $try[6]==$person and $try[9]==$tense)
		$myWord=$try[0];
	if($try[0]==$word and $try[1]==$root and $try[2]==$category and $try[3]==$gender and $try[4]==$number and $try[5]==$case and $try[6]==$person and $try[9]==$tense)
	{
		$flag=1;
		break;
	}
}
fclose($fp);


if($flag==1)
	echo "<p id='right_wrong' style='text-align:center;font-size:30px;color:#008000'>Right answer!!!</p>";
else if($flag==0 && $word=="NONE")
	echo "<p id='right_wrong' style='text-align:center;font-size:30px;color:#008000'>Right answer!!!</p>";
else
{
	echo "<p id='right_wrong' style='text-align:center;font-size:30px;color:#FF0000'>Wrong answer!!!</p>";
	if($myWord!="%")
		echo "<br/><br/><div id='get_hide'><button onclick=\"getAnswer('".$myWord."');\">Get Answer</button></div>";
	else
		echo "<br/><br/><div id='get_hide'><button onclick=\"getAnswer('Word with such features do not exist');\">Get Answer</button></div>";
}
?>
</body>
</html>
