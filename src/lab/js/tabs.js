function newTabs () {
	var links = document.getElementsByClassName('lab-list-row-div')
	for ( i = 0 ; i < links.length ; i ++ ) {
		anchors = links[i].getElementsByTagName('a')
		for ( j = 0 ; j < anchors.length ; j ++ ) {
			anchors[j].setAttribute('target', '_blank')
		}
 	}
 	var footer = document.getElementsByClassName('border-right-green-dotted')
 	for ( i = 0 ; i < footer.length ; i ++ ) {
 		footerLinks = footer[i].getElementsByTagName('a')
 		for ( j = 0 ; j < footerLinks.length ; j ++ ) {
 			footerLinks[j].setAttribute('target', '_blank')
 		}
 	}
}

window.onload = function(){ newTabs() }