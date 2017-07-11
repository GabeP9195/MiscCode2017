

document.getElementById("message").addEventListener("keyup", function() {
	charCounter = 0;
	msgLength = document.getElementById("message").value.length;
	max = document.getElementById("message").getAttribute('maxlength');
	
	
	document.getElementById("textCounter").classList.remove("hidden");
	document.getElementById("textCounter").textContent = msgLength + " characters typed. " + (max - msgLength) + " characters remaining.";

});