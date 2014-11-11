<html>
<head>
<script type="text/javascript" src='jquery.js'></script>
<script type="text/javascript">

function selectCorpus(){
var corpus = document.getElementById("corpus");
theIndx=corpus.selectedIndex;
corpus_name=corpus.options[theIndx].value;
var cno=parseFloat(corpus_name);
$('#display').load('experiment9-0.php?fileno='+cno);
}
</script>
</head>
<body>
<?php

$dir_path = './Exp9/'; 
$d = dir($dir_path) or die("Wrong path: $dir_path");
while (false !== ($entry = $d->read())) {
if($entry != '.' && $entry != '..' && !is_dir($dir_path.$entry))
$Files[] = $entry;

}
$d->close();
sort($Files, SORT_NUMERIC); ?>

<div align="center">
<form action="javascript:selectCorpus()" target="_parent" method="post">
<select name="corpus" id="corpus">";
<?php
$count="A";
foreach ($Files as &$x)
     {
          echo "<option value=\"".$x."\">Corpus ".$count."</option>";
	  $count++;
     }
echo "</select>"; ?>
<div style="text-align:center"><br/><br/><input type="submit" value="Select Corpus" onsubmit="selectCorpus();" ></div> 
</form>
<div id="display"></div>
</div> 
</body>
</html>
