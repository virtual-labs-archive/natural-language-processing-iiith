<html>
<body>
<?php
$lang=$_GET['lang'];
$script=$_GET['script'];



$fp=fopen("features.txt","r");

$word=array();
while(!feof($fp))
{
	
	$str=fgets($fp);
	$str=str_replace("\n","\t",$str);
	$try=explode("\t",$str);
	if(in_array($try[0],$word)==false and $try[7]==$lang and $try[8]==$script)
		array_push($word,$try[0]);
}



echo "<p style=\"font-style:italic;color:blue;\">Select a word from the below dropbox and do a morphological analysis on that word</p><br />";
echo '<table width=100% bgcolor=#FFD4A8><tr><td align="center">';

echo '<select name="word" id="userWord" onchange="getSelectedValue();">';


echo '<option value="null" selected="selected">---Select Word---</option>';
foreach($word as $i)
	echo '<option value="'.$i.'">'.$i.'</option>';
echo '</select></td></tr></table>';

fclose($fp);
?>
</body>
</html>
<!--
Edited By Harsha:
Added Line 19
-->
