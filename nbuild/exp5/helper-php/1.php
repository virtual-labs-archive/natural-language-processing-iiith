<?php

$dir_path = '../Exp10/'; 
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
foreach ($Files as &$x)
     {
          echo "<option value=\"".$x."\">".$x."</option>";
     }
echo "</select>"; ?>
<center><br/><br/><input type="submit" value="Select Corpus" onsubmit="selectCorpus();" ></center> 
</form>
<div id="display"></div>
</div> 
