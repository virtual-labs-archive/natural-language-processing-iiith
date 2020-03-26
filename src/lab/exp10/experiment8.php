<html>
<head>
<script class='gtm'>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-W59SWTR');</script>

<script type="text/javascript" src='jquery.js'></script>
<script type="text/javascript">
function language(lang){
	document.getElementById("train-size").innerHTML="";
	if(lang=="null")
	{
		// alert("Select Language");
		// return;
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
