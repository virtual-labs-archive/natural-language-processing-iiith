<html>
<body>
<?php
$lang=$_GET['lang'];
$script=$_GET['script'];
$link = mysql_connect('localhost','root','iiit123')or die('Could not connect: '.mysql_error());
mysql_select_db('vlab') or die( "Unable to select database");
$query='SELECT distinct root FROM features where language="'.$lang."\" and script=\"".$script."\" and pos=\"noun\";" ;
$result = mysql_query($query) or die('Query failed: '.mysql_error());
echo "<div align='center' style='padding-right:70px'>";
echo '<select name="word" id="userWord" style="width:120px;">';

echo '<option onclick="getFiller(\'null\')" value="null">select root</option>';
while($line=mysql_fetch_array($result,MYSQL_ASSOC)){
	echo '<option onclick="getFiller(\''.$line['root'].'\');" value="'.$line['root'].'">'.$line['root'].'</option>';
}
echo '</select>';
echo "</div>";

?>
</body>
</html>
