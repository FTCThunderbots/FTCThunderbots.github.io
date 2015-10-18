function w3_open() {
	document.getElementById("main").style.marginLeft = "25%";
	document.getElementsByClassName("w3-sidenav")[0].style.width = "25%";
	document.getElementsByClassName("w3-sidenav")[0].style.display = "block";
	document.getElementsByClassName("w3-opennav")[0].style.display = 'none';
}
function w3_close() {
	document.getElementById("main").style.marginLeft = "0%";
	document.getElementsByClassName("w3-sidenav")[0].style.display = "none";
	document.getElementsByClassName("w3-opennav")[0].style.display = "inline-block";
}

$(document).ready(function() {

});