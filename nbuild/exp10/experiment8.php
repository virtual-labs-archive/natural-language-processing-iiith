<html>
<head>
<script type="text/javascript" src='jquery.js'></script>
<script type="text/javascript">
function language(lang){
	document.getElementById("train-size").innerHTML="";
	if(lang=="null")
	{
		alert("Select Language");
		return;
	}
	$('#train-size').load('exp8.php?language='+lang);
}

</script>
</head>
<body>
<?php

echo "<p style=\"color:blue; font-style:italic\">Select a language<br/>
<select name='lang' autocomplete='off' onclick='language(this.value);'>
<option value='null'>---Select Language---</option>
<option value='eng'>English</option>
<option value='hin'>Hindi</option>
</select></p>";

echo "<br/><br/><div id='train-size'></div>";

?>
</body>
</html>
