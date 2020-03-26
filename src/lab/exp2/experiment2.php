<html>
<head>
<script class='gtm'>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-W59SWTR');</script>

<script type="text/javascript" src='jquery.js'></script>
<script type="text/javascript">
var index;

function getdata(lang,scr){
	$('#fldiv').load('exp2.php?root=%&category=%&gender=%&form=%&person=%&tense=%&reference=%&lang='+lang+'&scr='+scr);
}

function getOption(temp){
	temp1=temp.split("_");
	lang=temp1[0];
	scr=temp1[1];
	document.getElementById("option").innerHTML="";
	document.getElementById("fldiv").innerHTML="";
	if(scr=="null")
	{
		alert("Select language");
		return;
	}
	getdata(lang,scr);
}

</script>
</head>
<body>
<table width="100%">
<tr>
<td align="center">
<select name="lang" autocomplete='off' onchange="getOption(this.value);">
<option value="null_null" selected="selected"'>---Select language---</option>
<option value="en_roman">English</option>
<option value="hi_devanagiri">Hindi</option>
</select>
</td>
</tr>
</table>
<br/><div align="center" id='fldiv'></div>
<br/><div align="center" id='option'></div>
</body>
</html>
