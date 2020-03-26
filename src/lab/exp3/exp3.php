<html>
<head>
<script class='gtm'>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-W59SWTR');</script>

</head>
<body>

<?php 
	$root=$_GET['index'];
	$link = mysql_connect('localhost','root','iiit123')or die('Could not connect: '.mysql_error());
	mysql_select_db('vlab')or die('Could not select database');
	echo "<div align='center' style='padding-right:70px'>";
	echo "<table border='1'><tr>";
	echo "<th>Word</th>";
	echo "<th>Root</th>";
	echo "<th>Gender</th>";
	echo "<th>Number</th>";
	echo "<th>Case</th>";
	echo "</tr>";
	echo "<tr>";
	$query='SELECT distinct word FROM features where root="'.$root.'" and gender="male" and form="singular" and reference="direct"' ;
	$result = mysql_query($query) or die('Query failed: '.mysql_error());
	$line=mysql_fetch_array($result,MYSQL_ASSOC);
	$msd=$line['word'];
	echo '<td>'.$line['word'].'</td><td>'.$root.'</td><td>masculine</td><td>singular</td><td>direct</td></tr>';
	echo "<tr>";
	$query='SELECT distinct word FROM features where root="'.$root.'" and gender="male" and form="singular" and reference="oblique"' ;
	$result = mysql_query($query) or die('Query failed: '.mysql_error());
	$line=mysql_fetch_array($result,MYSQL_ASSOC);
	$mso=$line['word'];
	echo '<td>'.$line['word'].'</td><td>'.$root.'</td><td>masculine</td><td>singular</td><td>oblique</td></tr>';
	echo "<tr>";
	$query='SELECT distinct word FROM features where root="'.$root.'" and gender="male" and form="plural" and reference="direct"' ;
	$result = mysql_query($query) or die('Query failed: '.mysql_error());
	$line=mysql_fetch_array($result,MYSQL_ASSOC);
	$mpd=$line['word'];
	echo '<td>'.$line['word'].'</td><td>'.$root.'</td><td>masculine</td><td>plural</td><td>direct</td></tr>';
	echo "<tr>";
	$query='SELECT distinct word FROM features where root="'.$root.'" and gender="male" and form="plural" and reference="oblique"' ;
	$result = mysql_query($query) or die('Query failed: '.mysql_error());
	$line=mysql_fetch_array($result,MYSQL_ASSOC);
	$mpo=$line['word'];
	echo '<td>'.$line['word'].'</td><td>'.$root.'</td><td>masculine</td><td>plural</td><td>oblique</td></tr>';
	echo "<tr>";
	$query='SELECT distinct word FROM features where root="'.$root.'" and gender="female" and form="singular" and reference="direct"' ;
	$result = mysql_query($query) or die('Query failed: '.mysql_error());
	$line=mysql_fetch_array($result,MYSQL_ASSOC);
	$fsd=$line['word'];
	echo '<td>'.$line['word'].'</td><td>'.$root.'</td><td>feminine</td><td>singular</td><td>direct</td></tr>';
	echo "<tr>";
	$query='SELECT distinct word FROM features where root="'.$root.'" and gender="female" and form="singular" and reference="oblique"' ;
	$result = mysql_query($query) or die('Query failed: '.mysql_error());
	$line=mysql_fetch_array($result,MYSQL_ASSOC);
	$fso=$line['word'];
	echo '<td>'.$line['word'].'</td><td>'.$root.'</td><td>feminine</td><td>singular</td><td>oblique</td></tr>';
	echo "<tr>";
	$query='SELECT distinct word FROM features where root="'.$root.'" and gender="female" and form="plural" and reference="direct"' ;
	$result = mysql_query($query) or die('Query failed: '.mysql_error());
	$line=mysql_fetch_array($result,MYSQL_ASSOC);
	$fpd=$line['word'];
	echo '<td>'.$line['word'].'</td><td>'.$root.'</td><td>feminine</td><td>plural</td><td>direct</td></tr>';
	echo "<tr>";
	$query='SELECT distinct word FROM features where root="'.$root.'" and gender="female" and form="plural" and reference="oblique"' ;
	$result = mysql_query($query) or die('Query failed: '.mysql_error());
	$line=mysql_fetch_array($result,MYSQL_ASSOC);
	$fpo=$line['word'];
	echo '<td>'.$line['word'].'</td><td>'.$root.'</td><td>feminine</td><td>plural</td><td>oblique</td></tr>';
	echo "</table>";
	mysql_free_result($result);
	mysql_close($link);
?>
<br><br>
<h3>Now fill the Add Delete Table !!</h3>
(Look at <a href="Exp.php?Exp=3" >theory</a> for help)<br><br>
</div>
<div align='center' style="padding-right:60px;" >
<table><tr><td>
<table border='1'>
<tr><td><b>Delete</b></td><td><b>Add&nbsp;</b></td><td><b>Gender</b></td><td><b>Number</b></td><td><b>Case</b></td></tr>
<tr><td><input type="text" style="width:30px; height:12px;"></td><td><input type="text" style="width:30px;height:12px;"></td><td>masculine</td><td>singular</td><td>direct</td></tr>
<tr> <td><input type="text" style="width:30px;height:12px;"></td><td><input type="text" style="width:30px;height:12px;"></td><td>masculine</td><td>singular</td><td>oblique</td></tr>
<tr> <td><input type="text" style="width:30px;height:12px;"></td><td><input type="text" style="width:30px;height:12px;"></td><td>masculine</td><td>plural</td><td>direct</td></tr>
<tr> <td><input type="text" style="width:30px;height:12px;"></td><td><input type="text" style="width:30px;height:12px;"></td><td>masculine</td><td>plural</td><td>direct</td></tr>
<tr> <td><input type="text" style="width:30px;height:12px;"></td><td><input type="text" style="width:30px;height:12px;"></td><td>feminine</td><td>singular</td><td>direct</td></tr>
<tr> <td><input type="text" style="width:30px;height:12px;"></td><td><input type="text" style="width:30px;height:12px;"></td><td>feminine</td><td>singular</td><td>oblique</td></tr>
<tr> <td><input type="text" style="width:30px;height:12px;"></td><td><input type="text" style="width:30px;height:12px;"></td><td>feminine</td><td>plural</td><td>direct</td></tr>
<tr> <td><input type="text" style="width:30px;height:12px;"></td><td><input type="text" style="width:30px;height:12px;"></td><td>feminine</td><td>plural</td><td>oblique</td></tr>
</table>
</td>
<td>&nbsp;&nbsp;</td>
<td>

<div id="answer" style="display:none;">
<table border='1'>
<tr><th>Delete</th><th>Add</th></tr>
<?php
	function addDelete($root,$word){
		for($i=0;$i<strlen($root);$i++){
			if($word[$i]!=$root[$i]){
				break;
			}
		}
		if($i==strlen($root)){
			return $i-1;
		}
		else return $i;
	}
	$b=addDelete($root,$msd);
	echo "<tr><td>".substr($msd,$b)."</td><td>".substr($root,$b)."</td></tr>";
	$b=addDelete($root,$mso);
	echo "<tr><td>".substr($mso,$b)."</td><td>".substr($root,$b)."</td></tr>";
	$b=addDelete($root,$mpd);
	echo "<tr><td>".substr($mpd,$b)."</td><td>".substr($root,$b)."</td></tr>";
	$b=addDelete($root,$mpo);
	echo "<tr><td>".substr($mpo,$b)."</td><td>".substr($root,$b)."</td></tr>";
	$b=addDelete($root,$fsd);
	echo "<tr><td>".substr($fsd,$b)."</td><td>".substr($root,$b)."</td></tr>";
	$b=addDelete($root,$fso);
	echo "<tr><td>".substr($fso,$b)."</td><td>".substr($root,$b)."</td></tr>";
	$b=addDelete($root,$fpd);
	echo "<tr><td>".substr($fpd,$b)."</td><td>".substr($root,$b)."</td></tr>";
	$b=addDelete($root,$fpo);
	echo "<tr><td>".substr($fpo,$b)."</td><td>".substr($root,$b)."</td></tr>";
?>
</table>
</div>

</td>
</tr></table>
</div>
<div align='center' style="padding-right:90px;" >
<input type="button" value='Check' onclick="giveAnswer();" >
</div>


</body>
</html>

