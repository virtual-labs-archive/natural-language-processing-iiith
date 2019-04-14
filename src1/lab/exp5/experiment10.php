<html>
<head>
<script type="text/javascript" src='jquery.js'></script>
<script type="text/javascript">

function selectCorpus(){
var corp = document.getElementById("corp_opt");
theIndx=corp.selectedIndex;
corp_id=corp.options[theIndx].value;
if(corp_id=="-1")
	{
		alert("Select a corpus");
		return;
	}
var cno=parseFloat(corp_id);

$('#display').load('experiment10-0.php?fileno='+cno);
}
</script>
</head>
<body>
<div id="mainContainer" align="center">
<?php

$dir_path = './Exp10/'; 
$d = dir($dir_path) or die("Wrong path: $dir_path");
$files = glob($dir_path . "*.txt");?>

<form name = "selector" action="javascript:selectCorpus()" target="_parent" method="post">
<select name="corp_opt" id="corp_opt" autocomplete="off" onchange="selectCorpus(this.value);">";
     <option value="-1" select="selected">---Select a corpus---</option>";

<?php
$file_id=1;
$count="A";
//print each file name
foreach($files as $file)
{
 
      $file=explode("/", $file);
      $file=explode(".",$file[2]);
      echo "<option value=\"".$file_id."\">Corpus ".$count."</option>";
      $file_id++;
	$count++;
 }
echo "</select>"; ?>
</form>
<div id="display"></div>
</div> 
</body>
</html>

